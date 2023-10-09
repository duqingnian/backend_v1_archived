<?php

namespace FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

class ChannelController extends \AppBundle\Controller\BaseController 
{
    public function indexAction(Request $request)
    {
        $action = $request->request->get("action",'detail');
        $method = '_'.$action;
        if(!method_exists($this,$method))
        {
            echo json_encode(['code'=>-1,'msg'=>'method:'.$action.' not exist!']);
            exit();
        }
		return $this->{$method}($request);
    }
	private function _sync_column($request)
	{
		$request_token = $request->request->get("request_token","");
		$name = $request->request->get("name","");
		$value = $request->request->get("value","");
		$column_id = $this->GetId($request_token);
		
		$column = $this->db('ChannelColumn')->find($column_id);
		if(!$column)
		{
			$this->e('字段不存在');
		}
		if('is_require' == $name){$column->setIsRequire($value);}
		else if('is_join_encryp' == $name){$column->setIsJoinEncryp($value);}
		else{}
		
		$this->update();
		$this->succ("已更新");
	}
	public function _create($request)
    {
		$name = $request->request->get('name','');
		$country = $request->request->get('country','');
		$is_active = $request->request->get('is_active','false') == 'true' ? 1 : 0;
		if('' == $name)
		{
			$this->e('名称不能为空');
		}
		if('' == $country)
		{
			$this->e('国家不能为空');
		}
		
		$channel = $this->db('Channel')->findOneBy(['name'=>$name]);
		if($channel)
		{
			$this->e("名称存在:".$name);
		}
		$channel = new \AppBundle\Entity\Channel();
		$channel->setName($name);
		$channel->setCountry($country);
		$channel->setPayinAppid('');
		$channel->setPayinSecret('');
		$channel->setPayoutAppid('');
		$channel->setPayoutSecret('');
		$channel->setPayinPct(0.00);
		$channel->setPayinSigleFee(0.00);
		$channel->setPayoutPct(0.00);
		$channel->setPayoutSigleFee(0.00);
		
		$channel->setIsActive($is_active);
		$channel->setCreatedAt(time());
		$this->save($channel);
		
		if($channel->getId() > 0)
		{
			$this->add_column($channel->getId(),'PAYIN','REQUEST','TYPE','','',1);
			$this->add_column($channel->getId(),'PAYIN','REQUEST','HEADER','','',1);
			$this->add_column($channel->getId(),'PAYIN','REQUEST','URL','','',1);
			$this->succ('添加成功');
		}
		else
		{
			$this->e('添加失败,错误码:6045');
		}
	}
	
	private function _load($request)
	{
		$json = ['code'=>0,'msg'=>'OK','channels'=>[]];
		
		$countries = $this->get_countries();
		
		$channels = $this->db('Channel')->findAll();
		foreach($channels as $channel)
		{
			$country = $countries[$channel->getCountry()]['name'];
			$json['channels'][] = ['id'=>$channel->getId(),'name'=>$channel->getName(),'country'=>$country,'is_active'=>$channel->getIsActive(),'request_token'=>$this->authcode('ID'.$channel->getId())];
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
		
		$json['const'] = ['PAYIN'=>['REQUEST'=>[],'RESULT'=>[],'NOTIFY'=>[]],];

		$payin_request_consts = $this->get_payin_consts('REQUEST');
		$payin_result_consts = $this->get_payin_consts('RESULT');
		$payin_notify_consts = $this->get_payin_consts('NOTIFY');
		foreach($payin_request_consts as $key=>$text){$json['const']['PAYIN']['REQUEST'][] = ['key'=>$key,'text'=>$text.'('.$key.')'];}
		foreach($payin_result_consts as $key=>$text){$json['const']['PAYIN']['RESULT'][] = ['key'=>$key,'text'=>$text.'('.$key.')'];}
		foreach($payin_notify_consts as $key=>$text){$json['const']['PAYIN']['NOTIFY'][] = ['key'=>$key,'text'=>$text.'('.$key.')'];}
		
		echo json_encode($json);exit();
	}

	private function _update($request)
	{
		$request_token = $request->request->get('request_token','');
		$id = $this->GetId($request_token);
		
		$name = $request->request->get('name','');
		$country = $request->request->get('country','');
		$is_active = $request->request->get('is_active',0);
		
		//appid
		$payin_appid = $request->request->get('payin_appid','');
		$payin_secret = $request->request->get('payin_secret','');
		$payout_appid = $request->request->get('payout_appid','');
		$payout_secret = $request->request->get('payout_secret','');
		
		//费用
		$payin_pct = $request->request->get('payin_pct',0);
		$payin_sigle_fee = $request->request->get('payin_sigle_fee',0);
		$payout_pct = $request->request->get('payout_pct',0);
		$payout_sigle_fee = $request->request->get('payout_sigle_fee',0);
		
		//请求类型、头、url
		$payin_request_type = $request->request->get('payin_request_type','');
		$payin_request_header = $request->request->get('payin_request_header','');
		$payin_request_url = $request->request->get('payin_request_url','');
		
		//签名方式
		$payin_sign_method = $request->request->get('payin_sign_method','');
		$payout_sign_method = $request->request->get('payout_sign_method','');
		
		$channel = $this->db('Channel')->find($id);
		if(!$channel)
		{
			$this->e('通道不存在，无法更新');
		}
		$channel->setName($name);
		$channel->setIsActive($is_active);
		$channel->setCountry($country);
		
		//appid
		$channel->setPayinAppid($payin_appid);
		$channel->setPayinSecret($payin_secret);
		$channel->setPayoutAppid($payout_appid);
		$channel->setPayoutSecret($payout_secret);
		
		//费用
		$channel->setPayinPct($payin_pct);
		$channel->setPayinSigleFee($payin_sigle_fee);
		$channel->setPayoutPct($payout_pct);
		$channel->setPayoutSigleFee($payout_sigle_fee);
		
		//签名方式
		$channel->setPayinSignMethod($payin_sign_method);
		$channel->setPayoutSignMethod($payout_sign_method);
		$this->update();
		
		//更新请求头信息
		//$this->update_column($channel->getId(),'PAYIN','REQUEST','TYPE','',$payin_request_type,1,0);
		//$this->update_column($channel->getId(),'PAYIN','REQUEST','HEADER','',$payin_request_header,1,0);
		//$this->update_column($channel->getId(),'PAYIN','REQUEST','URL','',$payin_request_url,1,0);
		
		$this->succ("已更新");
	}
	
	private function _detail($request)
	{
		$request_token = $request->request->get('request_token','');
		$id = $this->GetId($request_token);

		$_channel = $this->db('Channel')->find($id);
		
		if(!$_channel)
		{
			$this->e('通道不存在');
		}

		$countries = $this->get_countries();
		
		$detail = [
			'master_id'=>$_channel->getId(),
			'name'=>$_channel->getName(),
			'country'=>$_channel->getCountry(),
			'currency'=>$countries[$_channel->getCountry()]['currency'],
			'is_active'=>$_channel->getIsActive(),
			
			//appid
			'payin_appid'=>$_channel->getPayinAppid(),
			'payin_secret'=>$_channel->getPayinSecret(),
			'payout_appid'=>$_channel->getPayoutAppid(),
			'payout_secret'=>$_channel->getPayoutSecret(),
			
			//费用
			'payin_pct'=>$_channel->getPayinPct(),
			'payin_sigle_fee'=>$_channel->getPayinSigleFee(),
			'payout_pct'=>$_channel->getPayoutPct(),
			'payout_sigle_fee'=>$_channel->getPayoutSigleFee(),
			
			//签名方式
			'payin_sign_method'=>$_channel->getPayinSignMethod(),
			'payout_sign_method'=>$_channel->getPayoutSignMethod(),
			
			'request_token'=>$this->authcode('ID'.$_channel->getId()),
		];

		$channel = ['id'=>$_channel->getId(),'name'=>$_channel->getName(),'country'=>$_channel->getCountry(),'is_active'=>$_channel->getIsActive()];

		//字段
		$stand_columns = [
			'PAYIN'=>['REQUEST'=>[],'RESULT'=>[],'NOTIFY'=>[]],
			'PAYOUT'=>['REQUEST'=>[],'RESULT'=>[],'NOTIFY'=>[]],
		];

		$columns = [
			'PAYIN'=>['REQUEST'=>[],'RESULT'=>[],'NOTIFY'=>[]],
			'PAYOUT'=>['REQUEST'=>[],'RESULT'=>[],'NOTIFY'=>[]],
		];
		$map = [];
		foreach($columns as $atype=>$__column)
		{
			foreach($__column as $bundle=>$_)
			{
				$request_consts = $this->get_pay_consts($atype,$bundle);
				foreach($request_consts as $key=>$text)
				{
					$stand_columns[$atype][$bundle][] = ['key'=>$key,'text'=>$text.'('.$key.')','type'=>$atype,'bundle'=>$bundle];
					$map[$atype][$bundle][$key] = $text;
				}
			}
		}

		//状态
		$status = [
			'PAYIN'=>['CREATE'=>[],'QUERY'=>[],'NOTIFY'=>[]],
			'PAYOUT'=>['CREATE'=>[],'QUERY'=>[],'NOTIFY'=>[]],
		];
		$StatusMeta = new \AppBundle\Utils\StatusMeta();
		$status_map = [];
		$status_map_list = $StatusMeta->GetAll();
		foreach($status as $atype=>$__column)
		{
			foreach($__column as $bundle=>$_)
			{
				foreach($status_map_list as $key=>$status)
				{
					$status_map[$atype][$bundle][] = ['key'=>$key,'text'=>$status.'('.$key.')','type'=>$atype,'bundle'=>$bundle];
				}
			}
		}
		
		//状态
		$status_list = [];
		$pay_status  = $this->db('ChannelStatusMap')->findBy(['channel_id'=>$_channel->getId()]);
		if(count($pay_status) > 0)
		{
			foreach($pay_status as $status)
			{
				$status_list[$status->getAtype()][$status->getBundle()][] = [
					'id'=>$status->getId(),
					'request_token'=>$this->authcode('ID'.$status->getId()),
					'const_display_name'=>$status_map_list[$status->getConstName()],
					'type'=>$status->getAtype(),
					'bundle'=>$status->getBundle(),
					'const_name'=>$status->getConstName(),
					'channel_column_value'=>$status->getChannelVar(),
				];
			}
		}
		$detail['status_list'] = $status_list;

		//字段
		$columns = [];
		$pay_columns  = $this->db('ChannelColumn')->findBy(['channel_id'=>$_channel->getId()]);
		if(count($pay_columns) > 0)
		{
			foreach($pay_columns as $column)
			{
				$columns[$column->getAtype()][$column->getBundle()][] = [
					'id'=>$column->getId(),
					'request_token'=>$this->authcode('ID'.$column->getId()),
					'const_display_name'=>$map[$column->getAtype()][$column->getBundle()][$column->getConstName()],
					'type'=>$column->getAtype(),
					'bundle'=>$column->getBundle(),
					'const_name'=>$column->getConstName(),
					'channel_column_name'=>'['.$column->getId().']'.$column->getChannelColumnName(),
					'channel_column_value'=>$column->getChannelColumnValue(),
					'is_join_encryp'=>$column->getIsJoinEncryp(),
					'is_require'=>$column->getIsRequire(),
				];
			}
		}
		$detail['columns'] = $columns;
		$detail['stand_columns'] = $stand_columns;
		$detail['status_map'] = $status_map;

		echo json_encode(['code'=>0,'msg'=>'OK','channel'=>$channel,'detail'=>$detail]);exit();
	}
	
	//删除状态
	private function _delete_status($request)
	{
		$request_token = $request->request->get("request_token","");
		$column_id = $this->GetId($request_token);
		
		$column = $this->db('ChannelStatusMap')->find($column_id);
		$this->em()->remove($column);
		$this->update();
		
		$this->succ("已删除");
	}
	
	//删除字段
	private function _delete_column($request)
	{
		$request_token = $request->request->get("request_token","");
		$column_id = $this->GetId($request_token);
		
		$column = $this->db('ChannelColumn')->find($column_id);
		$this->em()->remove($column);
		$this->update();
		
		$this->succ("已删除");
	}
	
	private function _add_status_row($request)
	{
		$atype = $request->request->get('atype','');
		$bundle = $request->request->get('bundle','');
		$const = $request->request->get('const','');
		$channel_column_value = $request->request->get('channel_column_value','');
		$channel_id = $request->request->get('channel_id','');
		
		//前置处理
		$atype = strtoupper($atype);
		$bundle = strtoupper($bundle);
		$const = strtoupper($const);

		//前置检查
		if('' == $const){$this->e('标准字段不能为空');}
		if('' == $channel_column_value){$this->e('接口字段不能为空');}
		
		//是不是已经存在
		$app_channel_column = $this->db('ChannelStatusMap')->findOneBy(['channel_id'=>$channel_id,'atype'=>$atype,'bundle'=>$bundle,'const_name'=>$const]);
		if($app_channel_column)
		{
			//$this->e('已经存在:'.$const);
		}
		
		//入库
		$column = new \AppBundle\Entity\ChannelStatusMap();
		$column->setChannelId($channel_id);
		$column->setAtype($atype);
		$column->setBundle($bundle);
		$column->setConstName($const);
		$column->setChannelVar($channel_column_value);
		$this->save($column);
		
		$this->succ('已添加');
	}
	
	private function _add_column_row($request)
	{
		$atype = $request->request->get('atype','');
		$bundle = $request->request->get('bundle','');
		$const = $request->request->get('const','');
		$channel_column = $request->request->get('channel_column','');
		$channel_column_value = $request->request->get('channel_column_value','');
		$is_require = $request->request->get('is_require','');
		$channel_id = $request->request->get('channel_id','');
		
		//前置处理
		$atype = strtoupper($atype);
		$bundle = strtoupper($bundle);
		$const = strtoupper($const);
		$is_require = 'true' == $is_require ? 1 : 0;
		
		//前置检查
		if('' == $const){$this->e('标准字段不能为空');}
		if('' == $channel_column){$this->e('接口字段不能为空');}
		
		//是不是已经存在
		$app_channel_column = $this->db('ChannelColumn')->findOneBy(['channel_id'=>$channel_id,'atype'=>$atype,'bundle'=>$bundle,'const_name'=>$const]);
		if($app_channel_column)
		{
			$this->e('已经存在:'.$const);
		}
		
		//入库
		$this->add_column($channel_id,$atype,$bundle,$const,$channel_column,$channel_column_value,$is_require);
		
		$this->succ('已添加');
	}
	
	private function add_column($channel_id,$atype,$bundle,$const,$channel_column,$channel_column_value,$is_require,$is_show=1)
	{
		$column = new \AppBundle\Entity\ChannelColumn();
		$column->setChannelId($channel_id);
		$column->setAtype($atype);
		$column->setBundle($bundle);
		$column->setConstName($const);
		$column->setChannelColumnName($channel_column);
		$column->setChannelColumnValue($channel_column_value);
		$column->setIsRequire($is_require);
		$column->setIsShow($is_show);
		$this->save($column);
	}
	
	private function update_column($channel_id,$atype,$bundle,$const,$channel_column='',$channel_column_value,$is_require='',$is_show=1)
	{
		$column = $this->db('ChannelColumn')->findOneBy(['channel_id'=>$channel_id,'atype'=>$atype,'bundle'=>$bundle,'const_name'=>$const]);
		if($column)
		{
			//$column->setChannelColumnName('');
			$column->setChannelColumnValue($channel_column_value);
			$column->setIsRequire($is_require);
			$column->setIsShow($is_show);
			$this->update();
		}
	}
}
