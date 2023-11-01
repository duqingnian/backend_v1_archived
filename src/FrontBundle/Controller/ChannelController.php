<?php

namespace FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

class ChannelController extends \AppBundle\Controller\BaseController 
{
    public function indexAction(Request $request)
    {
		$csrf = $request->request->get("scrf",'');
		if($this->get('security.csrf.token_manager')->getToken('authenticate')->getValue() != $csrf)
		{
			$this->e('Bad request! csrf is not correct!');
		}
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
		$uid = $this->GetId($request->request->get('access_token',''));
		
		$category = $request->request->get('category','');		
		$name = $request->request->get('name','');
		$slug = $request->request->get('slug','');
		$telegram_group_id = $request->request->get('telegram_group_id','');
		$country = $request->request->get('country','');
		$is_active = $request->request->get('is_active','false') == 'true' ? 1 : 0;
		if('' == $name)
		{
			$this->e('名称不能为空');
		}
		else if('' == $category)
		{
			$this->e('类别不能为空');
		}
		else if('' == $slug)
		{
			//$this->e('slug别名不能为空，影响代付');
		}
		else if('' == $country)
		{
			$this->e('国家不能为空');
		}
		
		$channel = $this->db('Channel')->findOneBy(['name'=>$name]);
		if($channel)
		{
			$this->e("名称存在:".$name);
		}
		$channel = $this->db('Channel')->findOneBy(['slug'=>$slug]);
		if($channel)
		{
			$this->e("slug存在:".$slug);
		}
		$channel = new \AppBundle\Entity\Channel();
		$channel->setName($name);
		$channel->setDisplayName("");
		$channel->setCategory($category);
		$channel->setSlug($slug);
		$channel->setCountry($country);
		$channel->setTelegramGroupId($telegram_group_id);
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
		
		$filter_name = $request->request->get('filter_name','');
		$filter_category = $request->request->get('filter_category','');
		$filter_country = $request->request->get('filter_country','');
		$prepage = $request->request->get('prepage',10);
		$countries = $this->get_countries();
		
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
		
		$pager = $this->pager($request,'Channel',$where,'a.id desc','',$prepage,'',true);
		
		foreach($pager['data'] as $channel)
		{
			$country = $countries[$channel['country']]['name'];
			$payin_pct = $channel['payin_pct'];
			$payin_sigle_fee = $channel['payin_sigle_fee'];
			
			$payout_pct = $channel['payout_pct'];
			$payout_sigle_fee = $channel['payout_sigle_fee'];
			
			$payin_sign_method = $channel['payin_sign_method'];
			$payout_sign_method = $channel['payout_sign_method'];
			
			//银行数量
			$bank_count = $this->count('ChannelBankCode','a.channel_id='.$channel['id']);
			
			$json['channels'][] = [
				'id'=>$channel['id'],
				'category'=>$channel['category'],
				'name'=>$channel['name'],
				'country'=>$country,
				'telegram_group_id'=>$channel['telegram_group_id'],
				'bank_count'=>$bank_count,
				
				'payin_pct'=>$payin_pct,
				'payin_sigle_fee'=>$payin_sigle_fee,
				'payout_pct'=>$payout_pct,
				'payout_sigle_fee'=>$payout_sigle_fee,
				
				'payin_sign_method'=>$payin_sign_method,
				'payout_sign_method'=>$payout_sign_method,
				
				'created_time'=>date('Y-m-d H:i:s',$channel['created_at']),
				'is_active'=>$channel['is_active'],
				'request_token'=>$this->authcode('ID'.$channel['id'])
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
		
		$json['const'] = ['PAYIN'=>['REQUEST'=>[],'RESULT'=>[],'NOTIFY'=>[]],];

		$payin_request_consts = $this->get_payin_consts('REQUEST');
		$payin_result_consts = $this->get_payin_consts('RESULT');
		$payin_notify_consts = $this->get_payin_consts('NOTIFY');
		foreach($payin_request_consts as $key=>$text){$json['const']['PAYIN']['REQUEST'][] = ['key'=>$key,'text'=>$text.'('.$key.')'];}
		foreach($payin_result_consts as $key=>$text){$json['const']['PAYIN']['RESULT'][] = ['key'=>$key,'text'=>$text.'('.$key.')'];}
		foreach($payin_notify_consts as $key=>$text){$json['const']['PAYIN']['NOTIFY'][] = ['key'=>$key,'text'=>$text.'('.$key.')'];}
		
		unset($pager['data']);
		$json['pager'] = $pager;
		
		echo json_encode($json);exit();
	}

	private function _update($request)
	{
		$uid = $this->GetId($request->request->get('access_token',''));
		$id = $this->GetId($request->request->get('request_token',''));
		
		$timezone = $request->request->get('timezone','');
		$note = $request->request->get('note','');
		$name = $request->request->get('name','');
		$display_name = $request->request->get('display_name','');
		$category = $request->request->get('category','');
		$slug = $request->request->get('slug','');
		$telegram_group_id = $request->request->get('telegram_group_id','');
		$country = $request->request->get('country','');
		$merchant_id = $request->request->get('merchant_id','');
		$is_active = $request->request->get('is_active',0);
		
		//appid
		$payin_appid = $request->request->get('payin_appid','');
		$payin_secret = $request->request->get('payin_secret','');
		$payout_appid = $request->request->get('payout_appid','');
		$payout_secret = $request->request->get('payout_secret','');
		
		//金额上下限
		$payin_min = $request->request->get('payin_min','');
		$payin_max = $request->request->get('payin_max','');
		$payout_min = $request->request->get('payout_min','');
		$payout_max = $request->request->get('payout_max','');
		
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
		
		$payin_sign_col_name = $request->request->get('payin_sign_col_name','');
		$payout_sign_col_name = $request->request->get('payout_sign_col_name','');
		
		//代付检查银行代码
		$payout_check_bankcode = $request->request->get('payout_check_bankcode',0);
		
		$channel = $this->db('Channel')->find($id);
		if(!$channel)
		{
			$this->e('通道不存在，无法更新');
		}
		$channel_check = $this->db('Channel')->findOneBy(['name'=>$name]);
		if($channel_check && $channel_check->getId() != $id)
		{
			$this->e("名称存在:".$name);
		}
		$channel_check = $this->db('Channel')->findOneBy(['slug'=>$slug]);
		if($channel_check && $channel_check->getId() != $id)
		{
			$this->e("slug存在:".$slug);
		}
		$channel->setName($name);
		$channel->setDisplayName($display_name);
		$channel->setCategory($category);
		$channel->setSlug($slug);
		$channel->setTelegramGroupId($telegram_group_id);
		$channel->setIsActive($is_active);
		$channel->setCountry($country);
		$channel->setNote($note);
		$channel->setTimezone($timezone);
		$channel->setMerchantId($merchant_id);
		
		//appid
		$channel->setPayinAppid($payin_appid);
		$channel->setPayinSecret($payin_secret);
		$channel->setPayoutAppid($payout_appid);
		$channel->setPayoutSecret($payout_secret);
		
		//金额上下限
		$channel->setPayinMin($payin_min);
		$channel->setPayinMax($payin_max);
		$channel->setPayoutMin($payout_min);
		$channel->setPayoutMax($payout_max);
		
		//费用
		$channel->setPayinPct($payin_pct);
		$channel->setPayinSigleFee($payin_sigle_fee);
		$channel->setPayoutPct($payout_pct);
		$channel->setPayoutSigleFee($payout_sigle_fee);
		
		//签名方式
		$channel->setPayinSignMethod($payin_sign_method);
		$channel->setPayoutSignMethod($payout_sign_method);
		
		//签名字段
		$channel->setPayinSignColName($payin_sign_col_name);
		$channel->setPayoutSignColName($payout_sign_col_name);
		
		//代付是不是需要检查银行代码
		$channel->setPayoutCheckBankcode($payout_check_bankcode);
		
		$this->update();
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
		
		$bank_list = [];
		$_bank_list = $this->db('ChannelBankCode')->findBy(['channel_id'=>$_channel->getId()],['id'=>'desc']);
		foreach($_bank_list as $bank)
		{
			$bank_list[] = ['request_token'=>$this->authcode('ID'.$bank->getId()),'name'=>$bank->getOriginalName(),'code'=>$bank->getOriginalCode(),'const_code'=>$bank->getConstCode()];
		}
		
		$detail = [
			'master_id'=>$_channel->getId(),
			'name'=>$_channel->getName(),
			'display_name'=>$_channel->getDisplayName(),
			'category'=>$_channel->getCategory(),
			'slug'=>$_channel->getSlug(),
			'telegram_group_id'=>$_channel->getTelegramGroupId(),
			'country'=>$_channel->getCountry(),
			'currency'=>$countries[$_channel->getCountry()]['currency'],
			'is_active'=>$_channel->getIsActive(),
			'note'=>$_channel->getNote(),
			'timezone'=>$_channel->getTimezone(),
			'merchant_id'=>$_channel->getMerchantId(),
			
			//appid
			'payin_appid'=>$_channel->getPayinAppid(),
			'payin_secret'=>$_channel->getPayinSecret(),
			'payout_appid'=>$_channel->getPayoutAppid(),
			'payout_secret'=>$_channel->getPayoutSecret(),
			
			//金额上下限
			'payin_min'=>$_channel->getPayinMin(),
			'payin_max'=>$_channel->getPayinMax(),
			'payout_min'=>$_channel->getPayoutMin(),
			'payout_max'=>$_channel->getPayoutMax(),
			
			//费用
			'payin_pct'=>$_channel->getPayinPct(),
			'payin_sigle_fee'=>$_channel->getPayinSigleFee(),
			'payout_pct'=>$_channel->getPayoutPct(),
			'payout_sigle_fee'=>$_channel->getPayoutSigleFee(),
			
			//签名方式
			'payin_sign_method'=>$_channel->getPayinSignMethod(),
			'payout_sign_method'=>$_channel->getPayoutSignMethod(),
			
			//签名字段
			'payin_sign_col_name'=>$_channel->getPayinSignColName(),
			'payout_sign_col_name'=>$_channel->getPayoutSignColName(),
			
			'request_token'=>$this->authcode('ID'.$_channel->getId()),
			
			//代付是不是需要检查银行代码
			'payout_check_bankcode'=>$_channel->getPayoutCheckBankcode(),
			'bank_list'=>$bank_list,
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
					'const_display_name'=>'['.$column->getId().']'.($map[$column->getAtype()][$column->getBundle()][$column->getConstName()]),
					'type'=>$column->getAtype(),
					'bundle'=>$column->getBundle(),
					'const_name'=>$column->getConstName(),
					'channel_column_name'=>$column->getChannelColumnName(),
					'channel_column_value'=>$column->getChannelColumnValue(),
					'is_join_encryp'=>$column->getIsJoinEncryp(),
					'is_require'=>$column->getIsRequire(),
					'data_source'=>$column->getDataSource(),
					'display_type'=>$column->getDisplayType(),
					'default_value'=>$column->getDefaultValue(),
					'label'=>$column->getLabel(),
					'idx'=>$column->getIdx(),
				];
			}
		}
		$detail['columns'] = $columns;
		$detail['stand_columns'] = $stand_columns;
		$detail['status_map'] = $status_map;

		echo json_encode(['code'=>0,'msg'=>'OK','channel'=>$channel,'detail'=>$detail]);exit();
	}
	
	//一键导入银行
	private function _import_bank_row($request)
	{
		$channel_id = $this->GetId($request->request->get('channel',''));
		$content = trim($request->request->get('content',''));
		$bank_import_header = $request->request->get('bank_import_header','');
		$bank_import_splite_type = $request->request->get('bank_import_splite_type','');
		$bank_import_header = explode(',',$bank_import_header);
		
		if('' == $content)
		{
			$this->e('导入内容不能为空');
		}
		
		$channel = $this->db('channel')->find($channel_id);
		if(!$channel)
		{
			$this->e("通道不存在");
		}
		$country = $channel->getCountry();
		
		$err = 0;
		$succ = 0;
		$total = 0;
		$error_list = [];
		
		$content = str_replace("\t",' ',$content);
		$lines = explode("\n", $content);
		foreach($lines as $line)
		{
			$total++;
			
			$line = trim($line);
			if('' == $line)
			{
				continue;
			}
			
			//开始分割每条记录
			$row_data_0 = '';
			$row_data_1 = '';
			$row_data_2 = '';
			$row_data_3 = '';
			if('space1' == $bank_import_splite_type)
			{
				$first_space = strpos($line," ");
				$row_data_0 = substr($line,0,$first_space);
				$row_data_1 = trim(substr($line,$first_space+1));
			}
			else if('|' == $bank_import_splite_type)
			{
				$row_datas = explode('|',$line);
				$row_data_0 = $row_datas[0];
				$row_data_1 = $row_datas[1];
				$row_data_2 = $row_datas[2];
				$row_data_3 = $row_datas[3];
			}
			else
			{}
			
			$original_code = '';
			if('code' == $bank_import_header[0]){$original_code = $row_data_0;}
			if('code' == $bank_import_header[1]){$original_code = $row_data_1;}
			if('code' == $bank_import_header[2]){$original_code = $row_data_2;}
			if('code' == $bank_import_header[3]){$original_code = $row_data_3;}
			
			$original_name = '';
			if('name' == $bank_import_header[0]){$original_name = $row_data_0;}
			if('name' == $bank_import_header[1]){$original_name = $row_data_1;}
			if('name' == $bank_import_header[2]){$original_name = $row_data_2;}
			if('name' == $bank_import_header[3]){$original_name = $row_data_3;}
			
			if('' == $original_name)
			{
				$err++;
				$error_list[] = '银行名称为空';
				continue;
			}
			if('' == $original_code)
			{
				$err++;
				$error_list[] = '银行代码为空';
				continue;
			}
			
			//开始导入
			$name = trim($original_name);
			$code = trim($original_code);
			$const_name = $this->_get_const_bank_name($name);
			
			//判断是不是存在，并且添加纪录
			$bank_check = $this->db('BankCode')->findOneBy(['country'=>$country,'const_name'=>$const_name]);
			
			//银行名称是不是存在
			$channel_bank_check = $this->db('ChannelBankCode')->findOneBy(['channel_id'=>$channel->getId(),'const_name'=>$const_name]);
			if($channel_bank_check)
			{
				$err++;
				$error_list[] = '银行名称已经存在！名称:'.$name.',银行代码:'.$code;
				continue;
			}
			
			//银行代码是不是存在
			$channel_bank_check = $this->db('ChannelBankCode')->findOneBy(['channel_id'=>$channel->getId(),'original_code'=>$code]);
			if($channel_bank_check)
			{
				$err++;
				$error_list[] = '银行代码已经存在！名称:'.$name.',银行代码:'.$code;
				continue;
			}
			
			$const_code = 'B0000';
			$bank_count = $this->count('BankCode','a.id > 0');
			$const_code = "B".str_pad($bank_count + 1, 4, "0", STR_PAD_LEFT);
			
			//开始添加
			$bank_code = new \AppBundle\Entity\BankCode();
			$bank_code->setCountry($country);
			$bank_code->setBankName($name);
			$bank_code->setConstName($const_name);
			$bank_code->setConstCode($const_code);
			$this->save($bank_code);
			
			$channel_bank_code = new \AppBundle\Entity\ChannelBankCode();
			$channel_bank_code->setCountry($country);
			$channel_bank_code->setChannelId($channel->getId());
			$channel_bank_code->setOriginalName($name);
			$channel_bank_code->setOriginalCode($code);
			$channel_bank_code->setConstName($const_name);
			$channel_bank_code->setConstCode($const_code);
			$this->save($channel_bank_code);
			
			if($channel_bank_code->getId() > 0)
			{
				$succ++;
			}
			else
			{
				$error_list[] = '保存失败！名称:'.$name.',银行代码:'.$code;
				$err++;
			}
		}
	
		echo json_encode([
			'code'=>0,
			'msg'=>'导入完成！一共：'.$total.'条记录，成功:'.$succ.'条，失败:'.$err.'条',
			'error_list'=>$error_list,
		]);
		die();
	}
	
	//删除银行
	private function _delete_bank($request)
	{
		$bank_id = $this->GetId($request->request->get('request_token'));
		$bank = $this->db('ChannelBankCode')->find($bank_id);
		if(!$bank)
		{
			$this->e('数据不存在');
		}
		$this->em()->remove($bank);
		$this->update();
		
		$this->succ("已删除");
	}
	
	//保存银行
	private function _save_bank_row($request)
	{
		$name = trim($request->request->get('name',''));
		$code = trim($request->request->get('code',''));
		$channel_id = $this->GetId($request->request->get('channel',''));
		
		if('' == $name)
		{
			$this->e('银行名称不能为空');
		}
		if('' == $code)
		{
			$this->e('银行代码不能为空');
		}
		
		$channel = $this->db('channel')->find($channel_id);
		if(!$channel)
		{
			$this->e("通道不存在");
		}
		$country = $channel->getCountry();
		
		$name = trim($name);
		$code = trim($code);
		$const_name = $this->_get_const_bank_name($name);
		
		//判断是不是存在，并且添加纪录
		$bank_check = $this->db('BankCode')->findOneBy(['country'=>$country,'const_name'=>$const_name]);
		
		//银行名称是不是存在
		$channel_bank_check = $this->db('ChannelBankCode')->findOneBy(['channel_id'=>$channel->getId(),'const_name'=>$const_name]);
		if($channel_bank_check)
		{
			$this->e('银行名称已经存在！名称:'.$name.',银行代码:'.$code);
		}
		
		//银行代码是不是存在
		$channel_bank_check = $this->db('ChannelBankCode')->findOneBy(['channel_id'=>$channel->getId(),'original_code'=>$code]);
		if($channel_bank_check)
		{
			$this->e('银行代码已经存在！名称:'.$name.',银行代码:'.$code);
		}
		
		$const_code = 'B0000';
		$bank_count = $this->count('BankCode','a.id > 0');
		$const_code = "B".str_pad($bank_count + 1, 4, "0", STR_PAD_LEFT);
		
		//开始添加
		$bank_code = new \AppBundle\Entity\BankCode();
		$bank_code->setCountry($country);
		$bank_code->setBankName($name);
		$bank_code->setConstName($const_name);
		$bank_code->setConstCode($const_code);
		$this->save($bank_code);
		
		$channel_bank_code = new \AppBundle\Entity\ChannelBankCode();
		$channel_bank_code->setCountry($country);
		$channel_bank_code->setChannelId($channel->getId());
		$channel_bank_code->setOriginalName($name);
		$channel_bank_code->setOriginalCode($code);
		$channel_bank_code->setConstName($const_name);
		$channel_bank_code->setConstCode($const_code);
		$this->save($channel_bank_code);
		
		if($channel_bank_code->getId() > 0)
		{
			$this->succ('已添加');
		}
		else
		{
			$this->e('添加失败，save fail！');
		}
	}
	
	//根据银行名称，返回清洗过后的银行别名
	private function _get_const_bank_name($bank_name)
	{
		$const_name = trim($bank_name);
		$const_name = str_replace(' ','_',$const_name);
		$const_name = str_replace('.','',$const_name);
		$const_name = str_replace('。','',$const_name);
		$const_name = str_replace('(','',$const_name);
		$const_name = str_replace(')','',$const_name);
		$const_name = str_replace('（','',$const_name);
		$const_name = str_replace('）','',$const_name);
		$const_name = strtoupper($const_name);
		
		return $const_name;
	}
	
	private function _fetch_column_detail($request)
	{
		$this->GetId($request->request->get("access_token",""));
		$column_id = $request->request->get('id');
		
		$column = $this->db('ChannelColumn')->find($column_id);
		if(!$column)
		{
			$this->e('column not exists');
		}
		else
		{
			echo json_encode([
				'atype'=>$column->getAtype(),
				'bundle'=>$column->getBundle(),
				'channel_column_name'=>$column->getChannelColumnName(),
				'channel_column_value'=>$column->getChannelColumnValue(),
				'data_source'=>$column->getDataSource(),
				'display_type'=>$column->getDisplayType(),
				'default_value'=>$column->getDefaultValue(),
				'label'=>$column->getLabel(),
				'idx'=>$column->getIdx(),
			]);
			exit();
		}
	}
	
	//删除状态
	private function _delete_status($request)
	{
		$this->GetId($request->request->get("access_token",""));
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
		$this->GetId($request->request->get("access_token",""));
		$request_token = $request->request->get("request_token","");
		$column_id = $this->GetId($request_token);
		
		$column = $this->db('ChannelColumn')->find($column_id);
		$this->em()->remove($column);
		$this->update();
		
		$this->succ("已删除");
	}
	
	private function _add_status_row($request)
	{
		$this->GetId($request->request->get("access_token",""));  
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
		//if('' == $channel_column_value){$this->e('接口字段不能为空');}
		
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
		$this->GetId($request->request->get("access_token",""));
		$atype = $request->request->get('atype','');
		$bundle = $request->request->get('bundle','');
		$const = $request->request->get('const','');
		$channel_column = $request->request->get('channel_column','');
		$channel_column_value = $request->request->get('channel_column_value','');
		$data_source = $request->request->get('data_source','');
		$display_type = $request->request->get('display_type','');
		$default_value = $request->request->get('default_value','');
		$label = $request->request->get('label','');
		$idx = $request->request->get('idx',0);
		$is_require = $request->request->get('is_require','');
		$channel_id = $request->request->get('channel_id','');
		
		//前置处理
		$atype = strtoupper($atype);
		$bundle = strtoupper($bundle);
		$const = strtoupper($const);
		$is_require = 'true' == $is_require ? 1 : 0;
		
		//前置检查
		//if('' == $const){$this->e('标准字段不能为空');}
		if('' == $channel_column){$this->e('接口字段不能为空');}
		
		if('' != $const)
		{
			//是不是已经存在
			$app_channel_column = $this->db('ChannelColumn')->findOneBy(['channel_id'=>$channel_id,'atype'=>$atype,'bundle'=>$bundle,'const_name'=>$const]);
			if($app_channel_column)
			{
				//$this->e('已经存在:'.$const);
			}
		}
		
		//接口字段不能重复
		$app_channel_column = $this->db('ChannelColumn')->findOneBy(['channel_id'=>$channel_id,'atype'=>$atype,'bundle'=>$bundle,'channel_column_name'=>$channel_column]);
		if($app_channel_column)
		{
			//$this->e('接口字段['.$channel_column.']已经存在');
		}
		
		//入库
		$this->add_column($channel_id,$atype,$bundle,$const,$channel_column,$channel_column_value,$is_require,1,$data_source,$display_type,$default_value,$label,$idx);
		
		$this->succ('已添加');
	}
	
	private function _update_column($request)
	{
		$this->GetId($request->request->get("access_token",""));
		
		$id = $request->request->get('id',0);
		if(!is_numeric($id))
		{
			$this->e('id is missing');
		}
		$column = $this->db('ChannelColumn')->find($id);
		if(!$column)
		{
			$this->e('column is not exists');
		}
		
		$name = $request->request->get('name','');
		$value = $request->request->get('value','');
		$data_source = $request->request->get('data_source','');
		$display_type = $request->request->get('display_type','');
		$default_value = $request->request->get('default_value','');
		$label = $request->request->get('label','');
		$idx = $request->request->get('idx','');
		
		if('' == $name)
		{
			$this->e('name is empty');
		}
		if('' == $value)
		{
			//$this->e('value is empty');
		}
		$column->setChannelColumnName($name);
		$column->setChannelColumnValue($value);
		$column->setDataSource($data_source);
		$column->setDisplayType($display_type);
		$column->setDefaultValue($default_value);
		$column->setLabel($label);
		$column->setIdx($idx);
		
		$this->update();
		
		$channel = $this->db('channel')->find($column->getChannelId());
		$request_token = $this->authcode('ID'.$channel->getId());
		
		echo json_encode(['code'=>0,'msg'=>'已更新','request_token'=>$request_token]);
		exit();
	}
	
	private function add_column($channel_id,$atype,$bundle,$const,$channel_column,$channel_column_value,$is_require,$is_show=1,$data_source="",$display_type="",$default_value="",$label="",$idx=0)
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
		$column->setDataSource($data_source);
		$column->setDisplayType($display_type);
		$column->setDefaultValue($default_value);
		$column->setLabel($label);
		$column->setIdx($idx);
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
	
	private function _loadByCountry($request)
	{
		$_country = $request->request->get('country','');
		
		$country = $this->db('country')->findOneBy(['slug'=>$_country]);
		
		$channels = [];
		$_channels = $this->db('Channel')->findBy(['country'=>$_country]);
		foreach($_channels as $channel)
		{
			$channels[] = ['key'=>'channel'.$channel->getId(),'text'=>$channel->getName()];
		}
		
		echo json_encode(['code'=>0,'msg'=>'OK','country'=>['name'=>$country->getName()],'list'=>$channels]);
		die();
	}
}
