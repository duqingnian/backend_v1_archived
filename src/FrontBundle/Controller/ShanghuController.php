<?php

namespace FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

class ShanghuController extends \AppBundle\Controller\BaseController 
{
	
	private $channel_categories = ['','一类','二类','三类'];
	
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
	
	private function _delete($request)
	{
		$this->e('请联系管理员手工删除');
	}
	
	
	private function _change_test_account($request)
	{
		$request_token = $request->request->get('request_token','');
		$sh_id = $this->GetId($request_token);
		
		if(is_numeric($sh_id) && $sh_id > 0)
		{
			$sh = $this->db('shanghu')->find($sh_id);
			if(!$sh)
			{
				$this->e('商户不存在');
			}
			//是不是测试商户
			if(1 != $sh->getIsTest())
			{
				$this->e('非测试商户，操作终止');
			}
			
			//删除payin订单
			$payin_orders = $this->db('PayinOrder')->findBy(['shanghu_id'=>$sh->getId()]);
			foreach($payin_orders as $payin_order)
			{
				$this->em()->remove($payin_order);
			}
			
			//删除payout订单
			$payout_orders = $this->db('PayoutOrder')->findBy(['shanghu_id'=>$sh->getId()]);
			foreach($payout_orders as $payout_order)
			{
				$this->em()->remove($payout_order);
			}
			
			//更新is_test字段
			$sh->setIsTest(0);
			
			//清除余额 代付金额
			$sh->setBalance(0);
			$sh->setDfPool(0);
			$sh->setFreezePool(0);
			
			$this->update();
			
			$this->succ('操作已完成');
		}
		else
		{
			$this->e('商户id错误');
		}
	}
	
	private function _create($request)
    {
		$name = $request->request->get('name','');
		$account = $request->request->get('account','');
		$password = $request->request->get('password','');
		$category = $request->request->get('category','');
		$country = $request->request->get('country','');
		$is_active = $request->request->get('is_active',0);
		$is_test = $request->request->get('is_test',0);
		$is_test = 'true' == $is_test ? 1 : 0;
		
		if(true == $is_active)
		{
			$is_active = 1;
		}
		else
		{
			$is_active = 0;
		}
		
		if('' == $name)
		{
			$this->e('名称不能为空');
		}
		if('' == $category)
		{
			$this->e('分类不能为空');
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
		$shanghu->setCategory($category);
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
			$config->setPayinSignMethod('hmacsha1');
			$config->setPayoutSignMethod('ShPayOutMd5');
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
		
		$filter_name = $request->request->get('filter_name','');
		$filter_account = $request->request->get('filter_account','');
		$filter_category = $request->request->get('filter_category','');
		$filter_country = $request->request->get('filter_country','');
		$prepage = $request->request->get('prepage',10);
		$countries = $this->get_countries();
		
		//分页查找商户
		$where = 'a.id > 0';
		if('' != $filter_category)
		{
			$where .= ' and a.category='.$filter_category;
		}
		if('' != $filter_name)
		{
			$where .= " and a.name like '%".$filter_name."%'";
		}
		if('' != $filter_country)
		{
			$where .= " and a.country = '".$filter_country."'";
		}

		$pager = $this->pager($request,'shanghu',$where,'a.id desc','',$prepage,'',true);
		foreach($pager['data'] as $shanghu)
		{
			$payin_channel_name = '-';
			$payout_channel_name = '-';
			$country = $countries[$shanghu['country']]['name'];
			$currency = $countries[$shanghu['country']]['currency'];	
			$country = $country.'('.$currency.')';
			
			$sh_conf = $this->db('shanghuConfig')->findOneBy(['master_id'=>$shanghu['id']]);
			$payin_fee = $sh_conf->getPayinPct().'% + '.$sh_conf->getPayinSigleFee();
			$payout_fee = $sh_conf->getPayoutPct().' + '.$sh_conf->getPayoutSigleFee();
			
			$sh = $this->db('shanghu')->find($sh_conf->getMasterId());
			$payin_min = '-';
			$payin_max = '-';
			$payout_min = '-';
			$payout_max = '-';
			
			$payin_channel_id = $sh_conf->getPayinChannelId();
			$payout_channel_id = $sh_conf->getPayoutChannelId();
			if(0 != $payin_channel_id)
			{
				$payin_channel = $this->db('channel')->find($payin_channel_id);
				$payin_channel_name = '??';
				if($payin_channel)
				{
					$payin_channel_name = $payin_channel->getName();
					if(-1 == $sh->getPayinMin()){$payin_min = $payin_channel->getPayinMin();;}else{$payin_min = $sh->getPayinMin();}
					if(-1 == $sh->getPayinMax()){$payin_max = $payin_channel->getPayinMax();;}else{$payin_max = $sh->getPayinMax();}
				}
			}
			if(0 != $payout_channel_id)
			{
				$payout_channel_name = '??';
				$payout_channel = $this->db('channel')->find($payout_channel_id);
				if($payout_channel)
				{
					$payout_channel_name = $payout_channel->getName();
					if(-1 == $sh->getPayoutMin()){$payout_min = $payout_channel->getPayoutMin();}else{$payout_min = $sh->getPayoutMin();}
					if(-1 == $sh->getPayoutMax()){$payout_max = $payout_channel->getPayoutMax();}else{$payout_max = $sh->getPayoutMax();}
				}
			}
			
			$uid = $shanghu['uid'];
			$user = $this->db('user')->find($uid);
			
			$json['shanghus'][] = [
				'name'=>$shanghu['name'],
				'category'=>$shanghu['category'],
				'currency'=>$currency,
				
				'payin_channel_name'=>$payin_channel_name,
				'payout_channel_name'=>$payout_channel_name,
				'payin_fee'=>$payin_fee,
				'payout_fee'=>$payout_fee,
				
				'payin_min'=>$payin_min,
				'payin_max'=>$payin_max,
				'payout_min'=>$payout_min,
				'payout_max'=>$payout_max,
				
				'country'=>$country,
				'balance'=>$shanghu['balance'],
				'df_pool'=>$shanghu['df_pool'],
				'freeze_pool'=>$shanghu['freeze_pool'],
				'is_test'=>$shanghu['is_test'],
				'is_active'=>$shanghu['is_active'],
				'account'=>$user->getUsername(),
				'request_token'=>$this->authcode('ID'.$shanghu['id']),
	            'google_bind'=>$user->getGoogleAuthBind(),
			];
		}
		
		//国家货币
		$json['countries'] = [];
		$json['countries'][] = ['key'=>'','text'=>'全部'];
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
			$text = $channel->getName();
			if(is_numeric($channel->getCategory()) && in_array($channel->getCategory(),[1,2,3]))
			{
				$text = $channel->getName().'('.$this->channel_categories[$channel->getCategory()].')';
			}
			$json['channels'][] = ['key'=>'channel'.$channel->getId(),'text'=>$text,'category'=>$channel->getCategory()];
		}
		
		
		//多少个测试商户
		$json['test_sh_count'] = $this->count('shanghu','a.is_test=1');
		
		
		unset($pager['data']);
		$json['pager'] = $pager;
		
		echo json_encode($json);exit();
	}

	private function _update($request) 
	{
		$request_token = $request->request->get('request_token','');
		$id = $this->GetId($request_token);
		
		$name = $request->request->get('name','');
		$account = $request->request->get('account','');
		$category = $request->request->get('category','');
		$country = $request->request->get('country','');
		$is_test = $request->request->get('is_test',0);
		$is_active = $request->request->get('is_active',0);
		
		$payin_min = $request->request->get('payin_min',0);
		$payin_max = $request->request->get('payin_max',0);
		$payout_min = $request->request->get('payout_min',0);
		$payout_max = $request->request->get('payout_max',0);
		
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
		
		if('' == $name)
		{
			$this->e('名称不能为空');
		}
		if('' == $category)
		{
			$this->e('分类不能为空');
		}
		if('' == $country)
		{
			$this->e('国家不能为空');
		}
		
		if(is_numeric($id) && $id > 0)
		{
			//do nothing
		}
		else
		{
			$this->e('商户id错误');
		}
		
		$shanghu = $this->db('Shanghu')->find($id);
		if(!$shanghu)
		{
			$this->e('商户不存在，无法更新');
		}
		$config = $this->db('ShanghuConfig')->findOneBy(['master_id'=>$id]);
		
		if(is_numeric($payin_channel_id) && $payin_channel_id > 0)
		{
			$payin_channel = $this->db('channel')->find($payin_channel_id);
			if($payin_channel)
			{
				//
			}
			else
			{
				$this->e("通道不存在,id:".$payin_channel_id);
			}
		}
		
		if(is_numeric($payout_channel_id) && $payout_channel_id > 0)
		{
			$payout_channel = $this->db('channel')->find($payout_channel_id);
			if($payout_channel)
			{
				//
			}
			else
			{
				$this->e("通道不存在,id:".$payout_channel_id);
			}
		}
		
		$shanghu->setName($name);
		$shanghu->setIsTest($is_test);
		$shanghu->setIsActive($is_active);
		$shanghu->setCategory($category);
		$shanghu->setCountry($country);
		$shanghu->setPayinMin($payin_min);
		$shanghu->setPayinMax($payin_max);
		$shanghu->setPayoutMin($payout_min);
		$shanghu->setPayoutMax($payout_max);

		$config->setPayinPct($payin_pct);
		$config->setPayinSigleFee($payin_sigle_fee);
		$config->setPayoutPct($payout_pct);
		$config->setPayoutSigleFee($payout_sigle_fee);
		
		$config->setPayinChannelId($payin_channel_id);
		$config->setPayoutChannelId($payout_channel_id);
		
		//签名
		//$config->setPayinSignMethod($payin_sign_method);
		//$config->setPayoutSignMethod($payout_sign_method);
		
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
		
		$_ip_whitelist = explode(',',$config->getIpWhitelist());
		$ip_whitelist = [];
		foreach($_ip_whitelist as $ip)
		{
			if('' != $ip)
			{
				$ip_whitelist[] = ['request_token'=>$this->authcode('IP'.$ip),'ip'=>$ip,];
			}
		}
		
		$shanghu = [
			'account'=>$user->getUsername(),
			'name'=>$_shanghu->getName(),
			'category'=>$_shanghu->getCategory(),
			'country'=>$_shanghu->getCountry(),
			'is_test'=>$_shanghu->getIsTest(),
			'is_active'=>$_shanghu->getIsActive(),
			'google_bind'=>$user->getGoogleAuthBind(),		 
			'request_token'=>$this->authcode('ID'.$_shanghu->getId()),
		];
		$detail = [
			'master_id'=>$_shanghu->getId(),
			'name'=>$_shanghu->getName(),
			'balance'=>$_shanghu->getBalance(),
			'df_pool'=>$_shanghu->getDfPool(),
			'freeze_pool'=>$_shanghu->getFreezePool(),
			
			'account'=>$user->getUsername(),
			'is_test'=>$_shanghu->getIsTest(),
			'category'=>$_shanghu->getCategory(),
			'country'=>$_shanghu->getCountry(),
			'currency'=>$countries[$_shanghu->getCountry()]['currency'],
			'is_active'=>$_shanghu->getIsActive(),
			'request_token'=>$this->authcode('ID'.$_shanghu->getId()),
			
			'payin_min'=>$_shanghu->getPayinMin(),
			'payin_max'=>$_shanghu->getPayinMax(),
			'payout_min'=>$_shanghu->getPayoutMin(),
			'payout_max'=>$_shanghu->getPayoutMax(),
			
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
			
			'ip_whitelist'=>$ip_whitelist,
			'google_bind'=>$user->getGoogleAuthBind(),
			'country_name'=>'',
			'channels'=>[],
		];
		
		$data = ['code'=>0,'msg'=>'OK','shanghu'=>$shanghu,'detail'=>$detail];
		
		//根据商户国家选择 所属的通道
		$country = $_shanghu->getCountry();
		if('' != $country)
		{
			$countryObject = $this->db('country')->findOneBy(['slug'=>$country]);
			if($countryObject)
			{
				$data['detail']['country_name'] = $countryObject->getName();
			}
			
			$_channels = $this->db('channel')->findBy(['country'=>$country]);
			foreach($_channels as $channel)
			{
				$text = $channel->getName();
				if(is_numeric($channel->getCategory()) && in_array($channel->getCategory(),[1,2,3]))
				{
					$text = $channel->getName().'('.$this->channel_categories[$channel->getCategory()].')';
				}
				$data['detail']['channels'][] = [
					'key'=>'channel'.$channel->getId(),
					'text'=>$text,
				];
			}
		}
		
		echo json_encode($data);exit();
	}
	
	private function _remove_ip($request)
	{
		$uid   = $this->GetId($request->request->get('access_token',''));
		$ip_request_token = $request->request->get('ip_request_token','');
		$sh_request_token = $request->request->get('sh_request_token','');
		$ip = $this->authcode($ip_request_token,'DECODE');
		if('IP' == substr($ip,0,2))
		{
			$ip = substr($ip,2);
		}
		
		$sh_id = $this->GetId($sh_request_token);
		$sh = $this->db('shanghu')->find($sh_id);
		if(!$sh)
		{
			$this->e('shanghu not exists');
		}
		$sh_conf = $this->db('ShanghuConfig')->findOneBy(['master_id'=>$sh->getId()]);
		
		$_ip_whitelist = explode(',',$sh_conf->getIpWhitelist());
		$new_ip_list = [];
		foreach($_ip_whitelist as $_ip)
		{
			if($ip != $_ip)
			{
				$new_ip_list[] = $_ip;
			}
		}

		$sh_conf->setIpWhitelist(implode(',',$new_ip_list));
		$this->update();
		
		$this->succ("已删除");
	}
	
	private function _add_ip_whitelist($request)
	{
		$uid   = $this->GetId($request->request->get('access_token',''));
		$sh_id = $this->GetId($request->request->get('request_token',''));
		$ip    = $request->request->get('ip','');
		
		if(!is_numeric($sh_id) || $sh_id <= 0)
		{
			$this->e("商户id错误");
		}
		
		/*$valid = ip2long($ip) !== false;
		if(!$valid)
		{
			$this->e('invalidate ip address!');
		}
		else
		
		{
			if(in_array($ip,['127.0.0.1','0.0.0.0','255.255.255.255','192.168.0.1']))
			{
				$this->e("ip地址:".$ip."不允许被添加");
			}
		}
		$__ip = explode('.',$ip);
		if(!is_array($__ip) || 4 != count($__ip))
		{
			$this->e('ip format error');
		}
		foreach($__ip as $_ip)
		{
			if(!is_numeric($_ip))
			{
				$this->e('ip address not a number!');
			}
		}
		if($__ip[0] == $__ip[1] && $__ip[0] == $__ip[2] && $__ip[0] == $__ip[3])
		{
			$this->e('不允许全部一样');
		}
		*/
		$sh = $this->db('shanghu')->find($sh_id);
		if(!$sh)
		{
			$this->e('商户不存在');
		}
		
		$sh_conf = $this->db('ShanghuConfig')->findOneBy(['master_id'=>$sh->getId()]);
		$ip_whitelist = $sh_conf->getIpWhitelist();
		
		if("" == $ip_whitelist)
		{
			$ip_whitelist = $ip;
		}
		else
		{
			$ip_arr = explode(',',$ip_whitelist);
			if(count($ip_arr) >= 3)
			{
				$this->e('白名单ip最多3个');
			}
			if(in_array($ip,$ip_arr))
			{
				$this->e('Ip：'.$ip.'地址已经存在');
			}
			$ip_whitelist .= ','.$ip;
		}
		
		$sh_conf->setIpWhitelist($ip_whitelist);
		$this->update();
		
		echo json_encode(['code'=>0,'msg'=>'已添加','ip'=>$ip,'request_token'=>$this->authcode('IP'.$ip)]);
		exit();
	}
}
