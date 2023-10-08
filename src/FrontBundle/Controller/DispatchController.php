<?php

namespace FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

class DispatchController extends \AppBundle\Controller\BaseController 
{
    public function indexAction(Request $request)
    {
        $action = $request->request->get("action",'index');
        $method = '_'.$action;
        if(!method_exists($this,$method))
        {
            echo json_encode(['code'=>-1,'msg'=>'method:'.$action.' not exist!']);
            exit();
        }
		return $this->{$method}($request);
    }

	public function _list($request)
	{
		$bundle = $request->request->get('bundle','');
		if('' == $bundle || !in_array($bundle,['TOPUP','WITHRAWAL']))
		{
			$this->e('WT参数错误');
		}
		
		$where = "a.bundle='".$bundle."'";
		$prepage=25;
		$pager = $this->pager($request,'dispatch',$where,'a.id desc','',$prepage,'',true);
		foreach($pager['data'] as &$dispatch)
		{
			$dispatch['user'] = '??';
			$user = $this->db('user')->find($dispatch['uid']);
			if($user)
			{
				$dispatch['user'] = $user->getUsername();
			}
			
			$dispatch['shanghu'] = '??';
			$shanghu = $this->db('shanghu')->find($dispatch['shanghu_id']);
			if($shanghu)
			{
				$dispatch['shanghu'] = $shanghu->getName();
			}
			
			$dispatch['created_time'] = date('Y-m-d H:i:s',$dispatch['created_at']);
		}
		
		echo json_encode(['code'=>0,'msg'=>'OK','pager'=>$pager]);
		exit();
	}
	
	//发起提现或者充值
	public function _create($request)
	{
		$token = $request->request->get('token','');
		$rand = $request->request->get('rand','');
		$access_token = $request->request->get('access_token','');
		$shanghu = $request->request->get('shanghu','');
		$money = $request->request->get('money','');
		$M = $request->request->get('M','');
		$bundle = $request->request->get('bundle','');
		$note = $request->request->get('note','');
		
		$uid = $this->GetId($access_token);
		$bundle = strtoupper($bundle);
		
		if(md5('0000-2046-'.$money) != $M)
		{
			$this->e('金额异常，无法完成操作');
		}
		
		$_token = md5("DUQINGNIAN-" . $access_token . "-" . date('Y-m-d') . "-" . $rand);
		if($_token != $token)
		{
			$this->e('token not match');
		}
		
		if('' == $shanghu)
		{
			$this->e('商户参数未传递');
		}
		$shanghu_id = str_replace('sh-','',$shanghu);
		if('' == $shanghu_id || !is_numeric($shanghu_id) || $shanghu_id <= 0)
		{
			$this->e('商户id异常');
		}

		if(!is_numeric($uid) || $uid <= 0)
		{
			$this->e('账户id异常！');
		}
		$user = $this->db('user')->find($uid);
		if(!$user)
		{
			$this->e('账号不存在，无法执行此操作');
		}
		
		if('' == $money || !is_numeric($money) || $money <= 0 || $money >= 99999)
		{
			$this->e('金额异常');
		}
		
		$sh = $this->db('Shanghu')->find($shanghu_id);
		if(!$sh)
		{
			$this->e('商户不存在');
		}
		
		$balance = $sh->getBalance();
		if('WITHRAWAL' == $bundle)
		{
			if($money > $balance)
			{
				$this->e('操作失败,提现金额:'.$money.'大于余额:'.$balance);
			}
		}
		
		//创建记录
		$model = new \AppBundle\Entity\Dispatch();
		$model->setBundle($bundle);
		$model->setOldMoney($balance);
		$model->setMoney($money);
		$model->setUid($uid);
		$model->setShanghuId($shanghu_id);
		$model->setNote($note);
		$model->setStatus('-');
		$model->setCreatedAt(time());
		$this->save($model);
		
		//创建日志
		if($model->getId() > 0)
		{
			$new_money = '??';
			if('TOPUP' == $bundle)
			{
				$new_money = $balance + (float)$money;
			}
			if('WITHRAWAL' == $bundle)
			{
				$new_money = $balance - (float)$money;
			}
			$model->setNewMoney($new_money);
			$sh->setBalance($new_money);
			$data = json_encode(['uid'=>$uid,'shanghu_id'=>$shanghu_id,'old_money'=>$balance,'money'=>$money,'new_money'=>$new_money,'note'=>$note,'dispatch_id'=>$model->getId()]);
			
			$log = new \AppBundle\Entity\Alog(); 
			$log->setUid($uid);
			$log->setBundle($bundle);
			$log->setData($data);
			$log->setCreatedAt(time());
			$log->setOrderId(0);
			$this->save($log);
		}
		else
		{
			$this->e('操作失败');
		}
		
		$this->succ('操作成功');
	}
}

