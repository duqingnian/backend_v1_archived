<?php

namespace FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

class OrderController extends \AppBundle\Controller\BaseController 
{
	private $order_status = [];
	
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
		
		//查询出订单状态列表
		$StatusMeta = new \AppBundle\Utils\StatusMeta();
		$_order_status = $StatusMeta->GetAll();
		
		$this->order_status[] = ['key'=>'ALL','text'=>'全部'];
		foreach($_order_status as $k=>$v)
		{
			$this->order_status[] = ['key'=>$k,'text'=>$v.'('.$k.')'];
		}
		
		return $this->{$method}($request);
    }
	
	//详情
	private function _detail($request)
	{
		$request_token = $request->request->get('request_token','');
		$order_id = $request->request->get('order_id',0);
		$order_bundle = $request->request->get('order_bundle','');
		$order = $this->db('PAYIN' == $order_bundle ? 'PayinOrder' : 'PayoutOrder')->find($order_id);
		if(!$order)
		{
			$this->e('order not exist.id:'.$order_id);
		}
		
		//订单状态
		$StatusMeta = new \AppBundle\Utils\StatusMeta();
		$statusMap = $StatusMeta->GetAll();
		$order_status = $statusMap[$order->getOrderStatus()];

		$sh_fee = '('.$order->getAmount().'×'.($order->getShPct()).'%)+'.$order->getShSigleFee().'= '.(($order->getAmount() * ($order->getShPct()/100)) .'+' . $order->getShSigleFee()).'= '.$order->getShFee();
			
		$channel_fee = '('.$order->getAmount().'×'.($order->getChannelPct()).'%)+'.$order->getChannelSigleFee().'= '.(($order->getAmount() * ($order->getChannelPct()/100)).'+'.$order->getChannelSigleFee()).'= '.$order->getChannelFee();
		
		//商户是不是测试账号
		$sh = $this->db('shanghu')->find($order->getShanghuId());
		
		//平台给商户的回调记录
		$sh_notify_log = [];
		$plantform_order_no = $order->getPlantformOrderNo();
		
		$notify_datas = $this->db('PAYIN' == $order_bundle ? 'ShNotifyData' : 'ShNotifyData2')->findBy(['order_id'=>$order->getId()]);
		foreach($notify_datas as $notify_data)
		{
			$sh_notify_log[] = [
				'id'=>$notify_data->getId(),
				'time_pip'=>$notify_data->getTimePip(),
				'notify_url'=>$notify_data->getNotifyUrl(),
				'notify_data'=>$notify_data->getNotifyData(),
				'result_http_code'=>$notify_data->getResultHttpCode(),
				'result_data'=>$notify_data->getResultData(),
				'created_at'=>$notify_data->getCreatedAt(),
				'pip_time'=>date('Y-m-d H:i:s',$notify_data->getPipTime()),
				'send_time'=>date('Y-m-d H:i:s',$notify_data->getSendTime()),
				'status'=>$notify_data->getStatus(),
				'time_left'=>$notify_data->getSendTime() - $notify_data->getPipTime(),
			];
		}
		
		$jump_url  = '';
		$qrcode_src  = '';
		if('PAYIN' == $order_bundle)
		{
			$qrcode_src = $order->getQrcodeSrc();
			$jump_url = $order->getJumpUrl();
		}
		
		//1.商户发来的数据
		$sh_request = $this->db('Data')->findOneBy(['sh_id'=>$sh->getId(),'bundle'=>'SH_REQUEST','plant_order_no'=>$plantform_order_no]);
		$data1 = ['title'=>'1.商户发来的数据','time'=>'','data'=>''];
		if($sh_request)
		{
			$data1['time'] = date('Y-m-d H:i:s',$sh_request->getCreatedAt());
			$data1['data'] = $sh_request->getData();
		}
		
		//2.平台提交给通道的数据
		$sh_request = $this->db('Data')->findOneBy(['sh_id'=>$sh->getId(),'bundle'=>'PLANT_REQUEST','plant_order_no'=>$plantform_order_no]);
		$data2 = ['title'=>'2.平台提交给通道的数据','time'=>'','data'=>''];
		if($sh_request)
		{
			$data2['time'] = date('Y-m-d H:i:s',$sh_request->getCreatedAt());
			$data2['data'] = $sh_request->getData();
		}
		
		//3.通道返回的数据
		$sh_request = $this->db('Data')->findOneBy(['sh_id'=>$sh->getId(),'bundle'=>'CHANNEL_RESPONSE','plant_order_no'=>$plantform_order_no]);
		$data3 = ['title'=>'3.通道返回的数据','time'=>'','data'=>''];
		if($sh_request)
		{
			$data3['time'] = date('Y-m-d H:i:s',$sh_request->getCreatedAt());
			$data3['data'] = $sh_request->getData();
		}
		
		//4.平台发给商户的数据
		$sh_request = $this->db('Data')->findOneBy(['sh_id'=>$sh->getId(),'bundle'=>'PLANT_DISPATCH','plant_order_no'=>$plantform_order_no]);
		$data4 = ['title'=>'4.平台发给商户的数据','time'=>'','data'=>''];
		if($sh_request)
		{
			$data4['time'] = date('Y-m-d H:i:s',$sh_request->getCreatedAt());
			$data4['data'] = $sh_request->getData();
		}
		
		//5.通道回调的数据
		$notify_data = $this->db('PAYIN' == $order_bundle ? 'ChannelNotifyData' : 'ChannelNotifyData2')->findOneBy(['sh_id'=>$sh->getId(),'bundle'=>$order_bundle,'order_id'=>$order->getId()]);
		$data5 = ['title'=>'5.通道回调的数据','time'=>'','data'=>''];
		if($sh_request)
		{
			$data5['time'] = date('Y-m-d H:i:s',$notify_data->getCreatedAt());
			$data5['data'] = $notify_data->getReciveData();
		}
		
		$data = [$data1,$data2,$data3,$data4,$data5];
		
		$detail = [
			'amount'=>$order->getAmount(),
			'channel_order_no'=>$order->getChannelOrderNo(),
			'shanghu_order_no'=>$order->getShanghuOrderNo(),
			'plantform_order_no'=>$plantform_order_no,
			'order_status'=>$order_status,
			'sh_fee'=>$sh_fee,
			'channel_fee'=>$channel_fee,
			'qrcode_src'=>$qrcode_src,
			'shanghu_notify_url'=>$order->getShanghuNotifyUrl(),
			'jump_url'=>$jump_url,
			'created_time'=>date('Y-m-d H:i:s',$order->getCreatedAt()),
			'data'=>$data,
			'sh'=>[
				'is_test'=>$sh->getIsTest(),
			],
			'sh_notify_log'=>$sh_notify_log,
		];
		
		echo json_encode(['code'=>0,'msg'=>'OK','detail'=>$detail]);
		exit();
	}
	
	public function _load_payout($request)
	{
		$prepage = $request->request->get('prepage',10);
		$access_token = $request->request->get('access_token','');
		if('' == $access_token)
		{
			$this->e('access_token is missing.');
		}
		$uid = $this->GetId($access_token);
		if(!is_numeric($uid))
		{
			$this->e('uid err!');
		}

		$where = 'a.id>0';
		
		$filter_order_no = $request->request->get('filter_order_no',''); //订单号
		$filter_channel  = $request->request->get('filter_channel',''); //通道
		$filter_sh       = $request->request->get('filter_sh',''); //商户
		$filter_status   = $request->request->get('filter_status',''); //状态
		
		if('' != $filter_order_no)
		{
			$where .= " and a.plantform_order_no like '%".$filter_order_no."%' or a.shanghu_order_no like '%".$filter_order_no."%'";
		}
		if('' != $filter_channel && 'ALL' != $filter_channel)
		{
			$where .= ' and a.channel_id in ('.$filter_channel.')';
		}
		if('' != $filter_sh  && 'ALL' != $filter_sh)
		{
			$where .= ' and a.shanghu_id in ('.$filter_sh.')';
		}
		if('' != $filter_status  && 'ALL' != $filter_status)
		{
			$filter_status = explode(',',$filter_status);
			$status = implode("','",$filter_status);
			$where .= " and a.order_status in ('".$status."')";
		}
		//echo $where;die();
		$order = 'a.id desc';
		
		$StatusMeta = new \AppBundle\Utils\StatusMeta();
		$statusMap = $StatusMeta->GetAll();

		$pager = $this->pager($request,'PayoutOrder',$where,$order,'',$prepage,'',true);
		foreach($pager['data'] as &$order)
		{
			$order['request_token'] = $this->authcode('ID'.$order['id']);
			$plantform_order_no = $order['plantform_order_no'];
			
			//完成时间
			$order['payed_time'] = '-';
			
			$status = $order['order_status'];
			if('' != $status && array_key_exists($status,$statusMap))
			{
				$status = $statusMap[$order['order_status']];
			}
			
			//查询通道
			$order['channel'] = '-';
			$channel = $this->db('channel')->find($order['channel_id']);
			if($channel)
			{
				$order['channel'] = $channel->getName();
			}
			else
			{
				$order['channel'] = '?'.$order->getChannelId().'?';
			}
			
			//查询商户
			$order['shanghu'] = '-';
			$shanghu = $this->db('shanghu')->find($order['shanghu_id']);
			if($shanghu)
			{
				$order['shanghu'] = $shanghu->getName();
			}
			else
			{
				$order['shanghu'] = '?'.$order->getShanghuId();
			}
			
			//回调状态 - 通道是不是回调了
			$order['channel_notified'] = 'N';
			$channel_notify = $this->db("ChannelNotifyData2")->findOneBy(['plantform_order_no'=>$plantform_order_no],['id'=>'desc']);
			if($channel_notify)
			{
				$order['channel_notified'] = 'Y';
				$order['payed_time'] = date('Y-m-d H:i:s',$channel_notify->getCreatedAt());
			}
			
			//回调状态 - 商户是不是回调了
			$order['sh_notified'] = 'N';
			$sh_notify = $this->db("ShNotifyData2")->findOneBy(['order_id'=>$order['id']],['id'=>'desc']);
			if($sh_notify)
			{
				$order['sh_notified'] = 'FAIL';
				if('SUCC' == $sh_notify->getStatus())
				{
					$order['sh_notified'] = 'SUCC';
				}
			}
			
			$order['key'] = 'payout_order_'.$order['id'];
			$order['created_time'] = date('Y-m-d H:i:s',$order['created_at']);
			
			$order['status_label'] = $status;
			$order['bundle'] = 'PAYOUT';
			
			$order['detail'] = [
				'qrcode_src'=>'',
			];
			
			//付款人信息
			//平台提交给通道的数据
			$sh_request = $this->db('Data')->findOneBy(['sh_id'=>$shanghu->getId(),'bundle'=>'PLANT_REQUEST','plant_order_no'=>$plantform_order_no]);
			$order['payer'] = ['bank_code'=>'','account_name'=>'','account_no'=>''];
			if($sh_request)
			{
				$arr = json_decode($sh_request->getData(),true);
				if(array_key_exists('bank_code',$arr)) $order['payer']['bank_code'] = $arr['bank_code'];
				if(array_key_exists('account_name',$arr)) $order['payer']['account_name'] = $arr['account_name'];
				if(array_key_exists('account_no',$arr)) $order['payer']['account_no'] = $arr['account_no'];
			}
			
		}
		//所有的渠道
		$channel_list = [['key'=>'ALL','text'=>'全部']];
		$_channels = $this->db('channel')->findAll();
		foreach($_channels as $_channel)
		{
			$channel_list[] = ['key'=>$_channel->getId(),'text'=>$_channel->getName()];
		}
		
		//所有的商户
		$sh_list = [['key'=>'ALL','text'=>'全部']];
		$_sh_list = $this->db('shanghu')->findAll();
		foreach($_sh_list as $_sh)
		{
			$sh_list[] = ['key'=>$_sh->getId(),'text'=>$_sh->getName()];
		}
		
		echo json_encode(['pager'=>$pager,'order_status'=>$this->order_status,'channel_list'=>$channel_list,'sh_list'=>$sh_list]);
		exit();
	}
	
	public function _load_payin($request)
	{
		$prepage = $request->request->get('prepage',10);
		$access_token = $request->request->get('access_token','');
		if('' == $access_token)
		{
			$this->e('access_token is missing.');
		}
		$uid = $this->GetId($access_token);
		if(!is_numeric($uid))
		{
			$this->e('uid err!');
		}

		$where = 'a.id>0';
		
		$filter_order_no = $request->request->get('filter_order_no',''); //订单号
		$filter_channel  = $request->request->get('filter_channel',''); //通道
		$filter_sh       = $request->request->get('filter_sh',''); //商户
		$filter_status   = $request->request->get('filter_status',''); //状态
		
		if('' != $filter_order_no)
		{
			$where .= " and a.plantform_order_no like '%".$filter_order_no."%' or a.shanghu_order_no like '%".$filter_order_no."%'";
		}
		if('' != $filter_channel && 'ALL' != $filter_channel)
		{
			$where .= ' and a.channel_id in ('.$filter_channel.')';
		}
		if('' != $filter_sh  && 'ALL' != $filter_sh)
		{
			$where .= ' and a.shanghu_id in ('.$filter_sh.')';
		}
		if('' != $filter_status  && 'ALL' != $filter_status)
		{
			$filter_status = explode(',',$filter_status);
			$status = implode("','",$filter_status);
			$where .= " and a.order_status in ('".$status."')";
		}
		//echo $where;die();
		$order = 'a.id desc';
		
		$StatusMeta = new \AppBundle\Utils\StatusMeta();
		$statusMap = $StatusMeta->GetAll();

		$pager = $this->pager($request,'PayinOrder',$where,$order,'',$prepage,'',true);
		foreach($pager['data'] as &$order)
		{
			$order['request_token'] = $this->authcode('ID'.$order['id']);
			$plantform_order_no = $order['plantform_order_no'];
			
			//完成时间
			$order['payed_time'] = '-';
			
			$status = $order['order_status'];
			if('' != $status && array_key_exists($status,$statusMap))
			{
				$status = $statusMap[$order['order_status']];
			}
			
			//查询通道
			$order['channel'] = '-';
			$channel = $this->db('channel')->find($order['channel_id']);
			if($channel)
			{
				$order['channel'] = $channel->getName();
			}
			else
			{
				$order['channel'] = '?'.$order->getChannelId().'?';
			}
			
			//查询商户
			$order['shanghu'] = '-';
			$shanghu = $this->db('shanghu')->find($order['shanghu_id']);
			if($shanghu)
			{
				$order['shanghu'] = $shanghu->getName();
			}
			else
			{
				$order['shanghu'] = '?'.$order->getShanghuId();
			}
			
			//回调状态 - 通道是不是回调了
			$order['channel_notified'] = 'N';
			$channel_notify = $this->db("ChannelNotifyData")->findOneBy(['plantform_order_no'=>$plantform_order_no],['id'=>'desc']);
			if($channel_notify)
			{
				$order['channel_notified'] = 'Y';
				$order['payed_time'] = date('Y-m-d H:i:s',$channel_notify->getCreatedAt());
			}
			
			//回调状态 - 商户是不是回调了
			$order['sh_notified'] = 'N';
			$sh_notify = $this->db("ShNotifyData")->findOneBy(['order_id'=>$order['id']],['id'=>'desc']);
			if($sh_notify)
			{
				$order['sh_notified'] = 'FAIL';
				if('SUCC' == $sh_notify->getStatus())
				{
					$order['sh_notified'] = 'SUCC';
				}
			}
			
			$order['key'] = 'payin_order_'.$order['id'];
			$order['created_time'] = date('Y-m-d H:i:s',$order['created_at']);
			
			$order['status_label'] = $status;
			$order['bundle'] = 'PAYIN';
			
			$order['detail'] = [
				'qrcode_src'=>'',
			];
		}
		//所有的渠道
		$channel_list = [['key'=>'ALL','text'=>'全部']];
		$_channels = $this->db('channel')->findAll();
		foreach($_channels as $_channel)
		{
			$channel_list[] = ['key'=>$_channel->getId(),'text'=>$_channel->getName()];
		}
		
		//所有的商户
		$sh_list = [['key'=>'ALL','text'=>'全部']];
		$_sh_list = $this->db('shanghu')->findAll();
		foreach($_sh_list as $_sh)
		{
			$sh_list[] = ['key'=>$_sh->getId(),'text'=>$_sh->getName()];
		}
		
		echo json_encode(['pager'=>$pager,'order_status'=>$this->order_status,'channel_list'=>$channel_list,'sh_list'=>$sh_list]);
		exit();
	}
	
	//删除正式商户的回调数据后重发
	private function _resend_sh_notify($request)
	{
		$order_bundle = $request->request->get('order_bundle','');
		if(!in_array($order_bundle,['PAYIN','PAYOUT']))
		{
			$this->e('invalidate order_bundle');
		}
		
		$order_id = $this->GetId($request->request->get('orderid'));
		if(is_numeric($order_id) && $order_id > 0)
		{
			$order = $this->db('PAYIN' == $order_bundle ? 'PayinOrder' : 'PayoutOrder')->find($order_id);
			if(!$order)
			{
				$this->e('['.$order_bundle.']['.$order_id.']order not exist!');
			}
			
			$notify_datas = $this->db('PAYIN' == $order_bundle ? 'ShNotifyData' : 'ShNotifyData2')->findBy(['order_id'=>$order->getId()]);
			foreach($notify_datas as $notify_data)
			{
				if('5s' == $notify_data->getTimePip())
				{
					$notify_data->setResultHttpCode(-1);
					$notify_data->setResultData('');
					$notify_data->setSendTime(0);
					$notify_data->setStatus('');
				}
				else
				{
					$this->em()->remove($notify_data);
				}
			}
			$this->update();
			
			$this->succ('操作成功');
		}
		else
		{
			$this->e('orderid error!');
		}
	}

	//同步操作
	private function _sync_order($request)
	{
		$order_bundle = $request->request->get('order_bundle','');
		if(!in_array($order_bundle,['PAYIN','PAYOUT']))
		{
			$this->e('invalidate order_bundle');
		}
		
		$order_id = $this->GetId($request->request->get('order_id'));
		if(is_numeric($order_id) && $order_id > 0)
		{
			$order = $this->db('PAYIN' == $order_bundle ? 'PayinOrder' : 'PayoutOrder')->find($order_id);
			if(!$order)
			{
				$this->e('['.$order_bundle.']['.$order_id.']order not exist!');
			}
			$plantform_order_no = $order->getPlantformOrderNo();
			$shanghu = $this->db('Shanghu')->find($order->getShanghuId());
			if(!$shanghu)
			{
				$this->e('账户账号未创建，无法创建代收订单,sh_id='.$order->getShanghuId());
			}
			$config = $this->db('ShanghuConfig')->findOneBy(['master_id'=>$shanghu->getId()]);
			if(!$config)
			{
				$this->e('商户未初始化配置信息，无法回调');
			}
			$_secret = 'PAYIN' == $order_bundle ? $config->getPayinSecret() : $config->getPayoutSecret();
			
			$__action = $request->request->get('__action','');
			
			if('' == $__action)
			{
				$this->e('操作丢失');
			}
			else
			{
				if(in_array($__action,['notify_curr_status','moni_succ','moni_fail']))
				{
					$__status = '';
					if('notify_curr_status' == $__action) //回调当前状态
					{
						$__status = $order->getOrderStatus();
					}
					else if('moni_succ' == $__action)
					{
						if(0 == $shanghu->getIsTest())
						{
							$this->e('非测试商户无法执行此操作');
						}
						else
						{
							$__status = 'SUCCESS';
						}
					}
					else if('moni_fail' == $__action)
					{
						if(0 == $shanghu->getIsTest())
						{
							$this->e('非测试商户无法执行此操作');
						}
						else
						{
							$__status = 'FAIL';
						}
					}
					else
					{}
					
					$data = [
						'amount'=>$order->getAmount(),
						'fee'=>$order->getShFee(),
						'order_status'=>$__status,
						'plantform_order_no'=>$plantform_order_no,
						'shanghu_order_no'=>$order->getShanghuOrderNo(),
						'time'=>time(),
					];
				
					$str = $this->__ascii_params($data);
					$str = $str.'&key='.$_secret;
					$sign = md5($str);
					
					$data['sign'] = $sign;
					$data = json_encode($data);
					
					$shanghu_notify_url = $order->getShanghuNotifyUrl();
					$ret = $this->http_post_json($shanghu_notify_url,$data);
					if(strlen($ret['1']) > 1000)
					{
						$ret['1'] = substr($ret['1'],0,1000);
					}
					
					$msg = '操作已完成!';
					$msg .= '回调状态码:'.$ret[0];
					$msg .= ',回调返回值:'.$ret[1];
					$msg .= ',回调地址为:'.$shanghu_notify_url;
					$this->succ($msg);
				}
				else
				{
					if('sync_channel_status' == $__action)
					{
						$channel_notify_data = $this->db('PAYIN' == $order_bundle ? 'ChannelNotifyData' : 'ChannelNotifyData2')->findOneBy(['plantform_order_no'=>$plantform_order_no]);
						if(!$channel_notify_data)
						{
							$this->e('没有收到商户的回调数据:plantform_order_no='.$plantform_order_no);
						}
						if(is_numeric($channel_notify_data->getOrderId()) && $channel_notify_data->getOrderId() > 0)
						{
							$this->e('order_id不为0，无法执行当前操作:plantform_order_no='.$plantform_order_no);
						}
						if(-1 == $channel_notify_data->getOrderId())
						{
							$channel_notify_data->setOrderId(0);
							$this->update();
							
							$this->update('已完成');
						}
					}
					else
					{
						$this->e('异常操作!Exception:60501');
					}
				}
			}
			
		}
		else
		{
			$this->e('orderid error!');
		}
	}
	
	private function __ascii_params($params = array())
	{
		if (!empty($params)) {
			$p = ksort($params);
			if ($p) {
				$str = '';
				foreach ($params as $k => $val) {$str .= $k . '=' . $val . '&';}
				$strs = rtrim($str, '&');
				return $strs;
			}
		}
		return '';
	}

}

