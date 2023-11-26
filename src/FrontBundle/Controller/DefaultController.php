<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Yaml\Yaml;

class DefaultController extends \AppBundle\Controller\BaseController 
{
    public function indexAction(Request $request)
    {
		$data = [
			'uid'=>$this->getUser()->getId(),
			'access_token'=>$this->authcode('ID'.$this->getUser()->getId()),
			'title'=>$this->title,
			'http_url'=>$this->http_url,
			'csrf'=>$this->get('security.csrf.token_manager')->getToken('authenticate')->getValue(),
		];
		
		$user_permissions = [];
		$_user_permissions = $this->db('UserPermission')->findBy(['user_id'=>$this->getUser()->getId()]);
		foreach($_user_permissions as $_user_permission)
		{
			$permission = $this->db('Permission')->find($_user_permission->getPermissionId());
			if($permission){
				$user_permissions[] = $permission->getSlug();
			}
		}
		$data['user_permissions'] = implode("','",$user_permissions);
		
        return $this->render('FrontBundle:Default:index.html.twig',$data);
    }
	
	public function debugAction(Request $request)
	{
		
		//$bundles = ['SUB_BALANCE'=>'减余额-','ADD_BALANCE'=>'加余额+','ADD_DF_POOL'=>'加代付+','SUB_DF_POOL'=>'减代付-'];
		$bundles = ['ADD_DF_POOL'=>'加代付+','SUB_DF_POOL'=>'减代付-'];
		
		$logs = $this->db('Alog')->findBy(['sh_id'=>4]);
		echo '<table border="1">';
		echo '<tr>';
		echo '<td>ID</td><td>操作</td><td>类型</td><td>订单</td><td>金额</td><td>手续费</td><td>旧</td><td>新</td><td>时间</td>';
		echo '</tr>';
		foreach($logs as $log)
		{
			if(array_key_exists($log->getBundle(),$bundles))
			{
				$opt = $bundles[$log->getBundle()];
				$data = json_decode($log->getData(),true);
				//{"type":"PAYOUT","is_test":0,"amount":"1596","shanghu_id":4,"channel_id":1,"old_df_pool":"0.00","new_df_pool":1596,"sh_fee":29.728}
				//{"type":"PAYOUT","is_test":0,"amount":"1360","sh_id":4,"channel_id":1,"sh_fee":25.48,"old_balance":"8374.27","new_balance":6988.79}
				
				$old = '';
				$new = '';
				if(false !== strstr($log->getBundle(),'BALANCE'))
				{
					$old = $data['old_balance'];
					$new = $data['new_balance'];
				}
				if(false !== strstr($log->getBundle(),'DF_POOL'))
				{
					$old = $data['old_df_pool'];
					$new = $data['new_df_pool'];
				}
				$bgcolor = 'ADD_DF_POOL' == $log->getBundle() ? 'green' : 'red';
				echo '<tr style="background:'.$bgcolor.'">';
				echo '<td>'.$log->getId().'</td><td>'.$opt.'</td><td>'.$data['type'].'</td><td>'.$log->getOrderId().'</td><td>金额：'.$data['amount'].'</td><td>手续费：'.$data['sh_fee'].'</td><td>旧：'.$old.'</td><td>新：'.$new.'</td><td>新：'.date('Y-m-d H:i:s',$log->getCreatedAt()).'</td>';
				echo '</tr>';
			}
		}
		echo '</table>';
		die();
	}
	
	public function debug111Action(Request $request)
	{
		//die();
		$debug = $this->getParameter('kernel.debug');
        //echo $debug ? 'Enabled' : 'Disabled';
		
		$sh_id = $_GET['id'];
		//一共发起的代收总额
		$payin_total = $this->sum('PayinOrder','amount','a.shanghu_id='.$sh_id);
		$payin_succ = $this->sum('PayinOrder','amount','a.shanghu_id='.$sh_id." and a.order_status='SUCCESS'");
		$payin_sh_fee = $this->sum('PayinOrder','sh_fee','a.shanghu_id='.$sh_id." and a.order_status='SUCCESS'");
		
		//代付
		$payout_total = $this->sum('PayoutOrder','amount','a.shanghu_id='.$sh_id);
		$payout_succ = $this->sum('PayoutOrder','amount','a.shanghu_id='.$sh_id." and a.order_status='SUCCESS'");
		$payout_fail = $this->sum('PayoutOrder','amount','a.shanghu_id='.$sh_id." and a.order_status='FAIL'");
		
		$payout_sh_fee = $this->sum('PayoutOrder','sh_fee','a.shanghu_id='.$sh_id." and a.order_status='SUCCESS'");
		$payout_sh_fee2 = $this->sum('PayoutOrder','sh_fee','a.shanghu_id='.$sh_id." and a.order_status='FAIL'");
		
		//发起中的代付
		echo '发起中的代付:'.($payout_total - $payout_succ).'<br /><br />';
		
		echo '代收:<br/>一共发起金额:'.$payin_total.'<br />成功金额:'.$payin_succ.'<br />成功手续费:'.$payin_sh_fee;
		echo '<br /><br /><br />';
		echo '代付:<br/>一共发起金额:'.$payout_total.'<br />成功金额:'.$payout_succ.'<br />成功手续费:'.$payout_sh_fee.'<br /><br />失败金额:'.$payout_fail.'<br />失败手续费:'.$payout_sh_fee2;
		echo '<br /><br /><br />';
		
		//下发充值
		$dispatch_total = $this->sum('Dispatch','money','a.shanghu_id='.$sh_id);
		echo '下发充值:'.$dispatch_total.'<br /><br />';
		
		
		echo '当前余额：'.($payin_succ - $payin_sh_fee - $payout_succ - $payout_sh_fee + $dispatch_total);
		
		exit();
    }
}
