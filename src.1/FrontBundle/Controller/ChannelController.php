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
		$channel->setIsActive($is_active);
		$channel->setCreatedAt(time());
		$this->save($channel);
		
		if($channel->getId() > 0)
		{
			$config = new \AppBundle\Entity\ChannelConfig();
			$config->setMasterId($channel->getId());
			$config->setPayinAppid('');
			$config->setPayinSecret('');
			$config->setPayoutAppid('');
			$config->setPayoutSecret('');
			$this->save($config);
			
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
		$json['sign_types'] = [];
		$sign_types = $this->get_sign_types();
		foreach($sign_types as $sign_type)
		{
			$json['sign_types'][] = ['key'=>$sign_type,'text'=>$sign_type];
		}
		
		echo json_encode($json);exit();
	}

	private function _update($request)
	{
		$request_token = $request->request->get('request_token','');
		$id = $this->GetId($request_token);
		
		$name = $request->request->get('name','');
		$country = $request->request->get('country','');
		$is_active = $request->request->get('is_active',0);
		$in_pct = $request->request->get('in_pct',0);
		$in_sigle_fee = $request->request->get('in_sigle_fee',0);
		$out_pct = $request->request->get('out_pct',0);
		$out_sigle_fee = $request->request->get('out_sigle_fee',0);
		$curl_in_type = $request->request->get('curl_in_type','POST');
		$curl_in_header = $request->request->get('curl_in_header','');
		$curl_in_url = $request->request->get('curl_in_url','');
		$in_succ_column = $request->request->get('in_succ_column','');
		$in_succ_column_value = $request->request->get('in_succ_column_value','');
		$in_sign_type = $request->request->get('in_sign_type','');
		$curl_out_type = $request->request->get('curl_out_type','');
		$curl_out_header = $request->request->get('curl_out_header','');
		$curl_out_url = $request->request->get('curl_out_url','');
		$out_succ_column = $request->request->get('out_succ_column','');
		$out_succ_column_value = $request->request->get('out_succ_column_value','');
		$out_sign_type = $request->request->get('out_sign_type','');
		$out_succ_notify_column = $request->request->get('out_succ_notify_column','');
		$out_succ_notify_column_value = $request->request->get('out_succ_notify_column_value','');
		$in_succ_notify_column = $request->request->get('in_succ_notify_column','');
		$in_succ_notify_column_value = $request->request->get('in_succ_notify_column_value','');
		$in_fail_column = $request->request->get('in_fail_column','');
		$out_fail_column = $request->request->get('out_fail_column','');
		
		$channel = $this->db('Channel')->find($id);
		if(!$channel)
		{
			$this->e('通道不存在，无法更新');
		}
		$channel->setName($name);
		$channel->setIsActive($is_active);
		$channel->setCountry($country);
		
		$config = $this->db('ChannelConfig')->findOneBy(['master_id'=>$id]);

		$config->setInPct($in_pct);
		$config->setInSigleFee($in_sigle_fee);
		$config->setOutPct($out_pct);
		$config->setOutSigleFee($out_sigle_fee);
		$config->setCurlInType($curl_in_type);
		$config->setCurlInHeader($curl_in_header);
		$config->setCurlInUrl($curl_in_url);
		$config->setInSuccColumn($in_succ_column);
		$config->setInSuccColumnValue($in_succ_column_value);
		$config->setInSignType($in_sign_type);
		$config->setCurlOutType($curl_out_type);
		$config->setCurlOutHeader($curl_out_header);
		$config->setCurlOutUrl($curl_out_url);
		$config->setOutSuccColumn($out_succ_column);
		$config->setOutSuccColumnValue($out_succ_column_value);
		$config->setOutSignType($out_sign_type);
		$config->setOutSuccNotifyColumn($out_succ_notify_column);
		$config->setOutSuccNotifyColumnValue($out_succ_notify_column_value);
		$config->setInSuccNotifyColumn($in_succ_notify_column);
		$config->setInSuccNotifyColumnValue($in_succ_notify_column_value);
		$config->setInFailColumn($in_fail_column);
		$config->setOutFailColumn($out_fail_column);
		
		$this->update();
		
		$this->succ("已更新");
	}
	
	private function GetId($request_token)
	{
		if(strlen($request_token) < 10)
		{
			$this->e('request_token is missing');
		}
		$id = $this->authcode($request_token,'DECODE');
		if('ID' != substr($id,0,2))
		{
			$this->e('bad request_token!');
		}
		$id = substr($id,2);
		if(!is_numeric($id))
		{
			$this->e('request_token err!'.$id);
		}
		return $id;
	}

	private function _add_column($request)
	{
		$request_token = $request->request->get('request_token','');
		$id = $this->GetId($request_token);
		$bundle = $request->request->get('bundle','');
		$column = $request->request->get('column','');
		$note = $request->request->get('note','');
		$is_require = $request->request->get('is_require',0);
		
		if('IN' != $bundle && 'OUT' != $bundle)
		{
			$this->e('bundle err');
		}
		
		$ChannelRequestColumn = $this->db('ChannelRequestColumn')->findOneBy(['master_id'=>$id,'bundle'=>$bundle,'request_column'=>$column]);
		if($ChannelRequestColumn)
		{
			$this->e($column.'已经存在');
		}
		
		$ChannelRequestColumn = new \AppBundle\Entity\ChannelRequestColumn();
		$ChannelRequestColumn->setMasterId($id);
		$ChannelRequestColumn->setBundle($bundle);
		$ChannelRequestColumn->setRequestColumn($column);
		$ChannelRequestColumn->setNote($note);
		$ChannelRequestColumn->setIsRequire($is_require);
		
		$this->save($ChannelRequestColumn);
		$this->succ('已添加');
	}
	
	private function _detail($request)
	{
		$request_token = $request->request->get('request_token','');
		$id = $this->GetId($request_token);

		$_channel = $this->db('Channel')->find($id);
		$config = $this->db('ChannelConfig')->findOneBy(['master_id'=>$id]);
		
		$countries = $this->get_countries();
		
		$detail = [
			'master_id'=>$_channel->getId(),
			'name'=>$_channel->getName(),
			'country'=>$_channel->getCountry(),
			'currency'=>$countries[$_channel->getCountry()]['currency'],
			'is_active'=>$_channel->getIsActive(),
			'payin_appid'=>$config->getPayinAppid(),
			'payin_secret'=>$config->getPayinSecret(),
			'payout_appid'=>$config->getPayoutAppid(),
			'payout_secret'=>$config->getPayoutSecret(),
			
			'in_pct'=>$config->getInPct(),
			'in_sigle_fee'=>$config->getInSigleFee(),
			'out_pct'=>$config->getOutPct(),
			'out_sigle_fee'=>$config->getOutSigleFee(),
			'curl_in_type'=>$config->getCurlInType(),
			'curl_in_header'=>$config->getCurlInHeader(),
			'curl_in_url'=>$config->getCurlInUrl(),
			'in_succ_column'=>$config->getInSuccColumn(),
			'in_succ_column_value'=>$config->getInSuccColumnValue(),
			'in_sign_type'=>$config->getInSignType(),
			'curl_out_type'=>$config->getCurlOutType(),
			'curl_out_header'=>$config->getCurlOutHeader(),
			'curl_out_url'=>$config->getCurlOutUrl(),
			'out_succ_column'=>$config->getOutSuccColumn(),
			'out_succ_column_value'=>$config->getOutSuccColumnValue(),
			'out_sign_type'=>$config->getOutSignType(),
			'out_succ_notify_column'=>$config->getOutSuccNotifyColumn(),
			'out_succ_notify_column_value'=>$config->getOutSuccNotifyColumnValue(),
			'in_succ_notify_column'=>$config->getInSuccNotifyColumn(),
			'in_succ_notify_column_value'=>$config->getInSuccNotifyColumnValue(),
			'in_fail_column'=>$config->getInFailColumn(),
			'out_fail_column'=>$config->getOutFailColumn(),
			'in_columns'=>[],
			'out_columns'=>[],
			'request_token'=>$this->authcode('ID'.$_channel->getId()),
		];
		
		$channel = ['id'=>$_channel->getId(),'name'=>$_channel->getName(),'country'=>$_channel->getCountry(),'is_active'=>$_channel->getIsActive()];
		
		$in_columns  = $this->db('ChannelRequestColumn')->findBy(['master_id'=>$_channel->getId(),'bundle'=>'IN']);
		$out_columns = $this->db('ChannelRequestColumn')->findBy(['master_id'=>$_channel->getId(),'bundle'=>'OUT']);
		
		foreach($in_columns as $ic)
		{
			$detail['in_columns'][] = ['request_token'=>$this->authcode('ID'.$ic->getId()),'id'=>$ic->getId(),'bundle'=>$ic->getBundle(),'request_column'=>$ic->getRequestColumn(),'note'=>$ic->getNote(),'is_require'=>$ic->getIsRequire()];
		}
		foreach($out_columns as $oc)
		{
			$detail['out_columns'][] = ['request_token'=>$this->authcode('ID'.$oc->getId()),'id'=>$oc->getId(),'bundle'=>$oc->getBundle(),'request_column'=>$oc->getRequestColumn(),'note'=>$oc->getNote(),'is_require'=>$oc->getIsRequire()];
		}
		
		$data = ['code'=>0,'msg'=>'OK','channel'=>$channel,'detail'=>$detail];
		
		echo json_encode($data);exit();
	}
	
	private function _delete_column($request)
	{
		$request_token = $request->request->get("request_token","");
		$column_id = $this->GetId($request);
		
		$column = $this->db('ChannelRequestColumn')->find($column_id);
		$this->em()->remove($column);
		$this->update();
		
		$this->succ("已删除");
	}
}
