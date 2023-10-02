<?php

namespace FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

class ShanghuController extends \AppBundle\Controller\BaseController 
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
	
	public function _create($request)
    {
		$name = $request->request->get('name','');
		$account = $request->request->get('account','');
		$password = $request->request->get('password','');
		$country = $request->request->get('country','');
		$is_active = $request->request->get('is_active',0);
		$is_test = $request->request->get('is_test',0);
		$is_test = 'true' == $is_test ? 1 : 0;
		if('' == $name)
		{
			$this->e('名称不能为空');
		}
		if('' == $country)
		{
			$this->e('国家不能为空');
		}
		
		$shanghu = $this->db('Shanghu')->findOneBy(['name'=>$name]);
		if($shanghu)
		{
			$this->e("名称存在:".$name);
		}
		
		$user = $this->db('user')->findOneBy(['username'=>$account,'acc_type'=>'SH']);
		if($user)
		{
			$this->e("账号存在:".$account);
		}
		
		$shanghu = new \AppBundle\Entity\Shanghu();
		$shanghu->setName($name);
		$shanghu->setCountry($country);
		$shanghu->setIsActive($is_active);
		$shanghu->setIsTest($is_test);
		$shanghu->setCreatedAt(time());
		$this->save($shanghu);
		
		if($shanghu->getId() > 0)
		{
			//代收appid
			$payin_appid  = md5('DQ'.date('YmdHis').$shanghu->getId().md5(microtime()).rand(123456,999999));
			$payin_secret = strtoupper(substr($this->authcode('APPID-'.$payin_appid.'-'.date('YmdHis')),0,64));
			
			//代付appid
			$payout_appid  = md5('XL'.date('YmdHis').$shanghu->getId().md5(microtime()).rand(123456,999999).$payin_appid);
			$payout_secret = strtoupper(substr($this->authcode('APPID-'.$payout_appid.'-'.date('YmdHis')),0,64));
			
			$config = new \AppBundle\Entity\ShanghuConfig();
			$config->setMasterId($shanghu->getId());
			$config->setPayinAppid($payin_appid);
			$config->setPayinSecret($payin_secret);
			$config->setPayoutAppid($payout_appid);
			$config->setPayoutSecret($payout_secret);
			$this->save($config);
			
			//账号
			$email = md5($account.$password.time());
			$email = substr($email,0,8).'@auto.gen';

			$userManager = $this->get('fos_user.user_manager');
			$user = $userManager->createUser();
			$user->setUsername($account);
			$user->setEmail($email);
			$user->setPlainPassword($password);
			$user->setAccType('SH');
			$user->setCreatedAt(time());
			$user->setEnabled(true);
			$user->setRoles(["ROLE_USER","ROLE_MERCHANT"]);
			$userManager->updateUser($user);
			
			if($user->getId() > 0)
			{
				$shanghu->setUid($user->getId());
				$this->update();
				
				$this->succ('添加成功');
			}
			else
			{
				$this->em()->remove($config);
				$this->em()->remove($shanghu);
				$this->update();
				
				$this->e("添加失败");
			}
			
		}
		else
		{
			$this->e('添加失败,错误码:6045');
		}
	}
	
	private function _load($request)
	{
		$json = ['code'=>0,'msg'=>'OK','shanghus'=>[]];
		
		$countries = $this->get_countries();
		
		$shanghus = $this->db('Shanghu')->findAll();
		foreach($shanghus as $shanghu)
		{
			$country = $countries[$shanghu->getCountry()]['name'];
			
			$uid = $shanghu->getUid();
			$user = $this->db('user')->find($uid);
			
			$json['shanghus'][] = [
				'id'=>$shanghu->getId(),
				'name'=>$shanghu->getName(),
				'country'=>$country,
				'is_test'=>$shanghu->getIsTest(),
				'is_active'=>$shanghu->getIsActive(),
				'account'=>$user->getUsername(),
				'request_token'=>$this->authcode('ID'.$shanghu->getId())
			];
		}
		
		//国家货币
		$json['countries'] = [];
		$countries = $this->get_countries();
		foreach($countries as $key=>$county)
		{
			$json['countries'][] = ['key'=>$key,'text'=>$county['name']];
		}
		
		//签名算法
		$json['sign_types'] = $this->get_sign_types();
		
		//通道
		$channels = $this->db('Channel')->findAll();
		foreach($channels as $channel)
		{
			$country = $countries[$channel->getCountry()]['name'];
			$json['channels'][] = ['key'=>'channel'.$channel->getId(),'text'=>$channel->getName()];
		}
		
		echo json_encode($json);exit();
	}

	private function _update($request) 
	{
		$request_token = $request->request->get('request_token','');
		$id = $this->GetId($request_token);
		
		$name = $request->request->get('name','');
		$account = $request->request->get('account','');
		$country = $request->request->get('country','');
		$is_test = $request->request->get('is_test',0);
		$is_active = $request->request->get('is_active',0);
		
		$payin_pct = $request->request->get('payin_pct',0);
		$payin_sigle_fee = $request->request->get('payin_sigle_fee',0);
		$payout_pct = $request->request->get('payout_pct',0);
		$payout_sigle_fee = $request->request->get('payout_sigle_fee',0);
		
		//签名类型
		$payin_sign_method = $request->request->get('payin_sign_method','');
		$payout_sign_method = $request->request->get('payout_sign_method','');
		
		$payin_channel_id = $request->request->get('payin_channel_id',0);
		$payout_channel_id = $request->request->get('payout_channel_id',0);
		$payin_channel_id = str_replace('channel','',$payin_channel_id);
		$payout_channel_id = str_replace('channel','',$payout_channel_id);
		
		$shanghu = $this->db('Shanghu')->find($id);
		if(!$shanghu)
		{
			$this->e('通道不存在，无法更新');
		}
		$shanghu->setName($name);
		$shanghu->setIsTest($is_test);
		$shanghu->setIsActive($is_active);
		$shanghu->setCountry($country);
		
		$config = $this->db('ShanghuConfig')->findOneBy(['master_id'=>$id]);

		$config->setPayinPct($payin_pct);
		$config->setPayinSigleFee($payin_sigle_fee);
		$config->setPayoutPct($payout_pct);
		$config->setPayoutSigleFee($payout_sigle_fee);
		
		$config->setPayinChannelId($payin_channel_id);
		$config->setPayoutChannelId($payout_channel_id);
		
		//签名
		$config->setPayinSignMethod($payin_sign_method);
		$config->setPayoutSignMethod($payout_sign_method);
		
		$user = $this->db('user')->find($shanghu->getUid());
		$user->setUsername($account);
		
		$password = $request->request->get('password','');
		if('' != $password)
		{
			
			$encoder = $this->get('security.password_encoder');
			$encoded = $encoder->encodePassword($user, $password);
			$user->setPassword($encoded);
		}
		$this->update();
		$this->succ("已更新");
	}
	
	private function _detail($request)
	{
		$request_token = $request->request->get('request_token','');
		$id = $this->GetId($request_token);

		$_shanghu = $this->db('Shanghu')->find($id);
		$config = $this->db('ShanghuConfig')->findOneBy(['master_id'=>$id]);
		
		$countries = $this->get_countries();
		
		$uid = $_shanghu->getUid();
		$user = $this->db('user')->find($uid);
		
		$shanghu = [
			'id'=>$_shanghu->getId(),
			'account'=>$user->getUsername(),
			'name'=>$_shanghu->getName(),
			'country'=>$_shanghu->getCountry(),
			'is_test'=>$_shanghu->getIsTest(),
			'is_active'=>$_shanghu->getIsActive(),
			'request_token'=>$this->authcode('ID'.$_shanghu->getId()),
		];
		$detail = [
			'master_id'=>$_shanghu->getId(),
			'name'=>$_shanghu->getName(),
			'account'=>$user->getUsername(),
			'is_test'=>$_shanghu->getIsTest(),
			'country'=>$_shanghu->getCountry(),
			'currency'=>$countries[$_shanghu->getCountry()]['currency'],
			'is_active'=>$_shanghu->getIsActive(),
			'request_token'=>$this->authcode('ID'.$_shanghu->getId()),
			'payin_appid'=>$config->getPayinAppid(),
			'payout_appid'=>$config->getPayoutAppid(),
			'payin_secret'=>$config->getPayinSecret(),
			'payout_secret'=>$config->getPayoutSecret(),
			'payin_pct'=>"".$config->getPayinPct(),
			'payout_pct'=>"".$config->getPayoutPct(),
			'payin_sigle_fee'=>"".$config->getPayinSigleFee(),
			'payout_sigle_fee'=>"".$config->getPayoutSigleFee(),
			'payin_channel_id'=>"channel".$config->getPayinChannelId(),
			'payout_channel_id'=>"channel".$config->getPayoutChannelId(),
			'payin_sign_method'=>$config->getPayinSignMethod(),
			'payout_sign_method'=>$config->getPayoutSignMethod(),
		];
		
		$data = ['code'=>0,'msg'=>'OK','shanghu'=>$shanghu,'detail'=>$detail];
		
		echo json_encode($data);exit();
	}

}
