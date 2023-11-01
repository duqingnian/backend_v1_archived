<?php

namespace FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

class PayoutController extends \AppBundle\Controller\BaseController 
{
    public function indexAction(Request $request)
    {
		$csrf = $request->request->get("scrf",'');
		if($this->get('security.csrf.token_manager')->getToken('authenticate')->getValue() != $csrf)
		{
			$this->e('Bad request! csrf is not correct!');
		}
        $action = $request->request->get("action",'index');
        $method = '_'.$action;
        if(!method_exists($this,$method))
        {
            echo json_encode(['code'=>-1,'msg'=>'method:'.$action.' not exist!']);
            exit();
        }
		return $this->{$method}($request);
    }
	
	public function _pre($request)
	{
		$json = ['code'=>0,'msg'=>'OK','pre'=>[]];
		
		//账号类型 
		$account_types = ['EMAIL','PHONE','CPF','CNPJ','RANDOM'];
		$json['pre']['account_types'] = [];
		foreach($account_types as $at)
		{
			$json['pre']['account_types'][] = ['key'=>$at,'text'=>$at];
		}
		
		echo json_encode($json);
		exit();
	}
	
	public function _create($request)
	{
		$request_token = $request->request->get('request_token','');
		$amount = $request->request->get('amount',0);
		$ACC_TYPE = $request->request->get('ACC_TYPE','');
		$ACCOUNT = $request->request->get('ACCOUNT','');
		$ACC_OWNER_NAME = $request->request->get('ACC_OWNER_NAME','');
		$EMAIL = $request->request->get('EMAIL','');
		$PHONE = $request->request->get('PHONE','');
		$CPF_NO = $request->request->get('CPF_NO','');
		
		//前置检查
		if('' == $request_token)
		{
			$this->e('request_token is missing.');
		}
		$uid = $this->GetId($request_token);
		
		if($amount < 1 || $amount > 99999)
		{
			$this->e('金额不能小于1，不能大于99,999');
		}
		if('' == $ACC_TYPE)
		{
			$this->e('账号类型不能为空');
		}
		//查询代付参数
		$shanghu = $this->db('Shanghu')->findOneBy(['uid'=>$uid]);
		if(!$shanghu)
		{
			$this->e('账户账号未创建，无法创建代付订单,uid='.$uid);
		}
		$config = $this->db('ShanghuConfig')->findOneBy(['master_id'=>$shanghu->getId()]);
		if(!$config)
		{
			$this->e('商户未初始化配置信息，无法创建订单');
		}
		
		$payout_appid  = $config->getPayoutAppid();
		$payout_secret = $config->getPayoutSecret();
		if('' == $payout_appid){$this->e('代付appid为空，无法创建');}
		if('' == $payout_secret){$this->e('代付密钥为空，无法创建');}
		
		//拼装参数递交给支付接口
		$order_no = $this->generate_order_no($payout_appid,$payout_secret);
		$notify_url = $this->http_url.'/pip/payout.notify/'.$order_no;
		if(1 == $shanghu->getIsTest())
		{
			$notify_url = $this->http_url.'/test/payout.notify/'.$order_no;
		}
		
		$post_parameters = [
			'appid'=>$payout_appid,
			'amount'=>$amount,
			'order_no'=>$order_no,
			'notify_url'=>$notify_url,
			'acc_type'=>$ACC_TYPE,
			'account'=>$ACCOUNT,
			'acc_owner_name'=>$ACC_OWNER_NAME,
			'email'=>$EMAIL,
			'phone'=>$PHONE,
			'cpf_no'=>$CPF_NO,
			'type'=>'HAND',
		];
		
		//获取签名生成方式
		$payout_sign_method = $config->getPayoutSignMethod();
		
		//生成签名
		if('md5' == $payout_sign_method)
		{
			$SignGenerator = new \AppBundle\Utils\SignGeneratorMd5();
		}
		else if('sha256' == $payout_sign_method)
		{
			$SignGenerator = new \AppBundle\Utils\SignGeneratorSha256();
		}
		else
		{
			$this->e("未配置代付签名生成方式，无法生成代付订单");
		}

		$sign = $SignGenerator->generate($post_parameters,$payout_secret);
		$post_parameters['sign'] = $sign;
		
		$ret = $this->http('https://pay.baishipay.com/api/payout/order/create',$post_parameters);
		
		if('' == $ret)
		{
			$this->e('An error occurred, empty payment result!');
		}
		
		$data = json_decode($ret,true);
		if(count($data) < 2 || !array_key_exists('code',$data))
		{
			echo json_encode(['code'=>-1,'msg'=>'An error occurred, invalidate result dataArray!','ret'=>$ret]);
			exit();
		}
		if(0 != $data['code'])
		{
			$this->e($data['msg']);
		}
		
		
		if(!array_key_exists('shanghu_order_no',$data))
		{
			$this->e('An error occurred, shanghu_order_no not in dataArray!');
		}
		
		$order = $this->db('PayoutOrder')->findOneBy(['shanghu_order_no'=>$data['shanghu_order_no']]);
		if(!$order)
		{
			$this->e('An error occurred while reading the payout order:'.$data['shanghu_order_no']);
		}
		echo json_encode($data);
		exit();
	}
	
	private function generate_order_no($payout_appid,$payout_secret)
	{
		return date('Ymd').md5($payout_appid.$payout_secret.time());
	}

}


