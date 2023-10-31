<?php

namespace FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

class OrderController extends \AppBundle\Controller\BaseController 
{
	private $order_status = [];
	
    public function indexAction(Request $request)
    {
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
		
		$sh_fee = $order->getShFee().'=('.$order->getAmount().'×'.($order->getShPct()).'%='.($order->getAmount() * ($order->getShPct()/100)).')+'.$order->getShSigleFee();
		
		$channel_fee = $order->getChannelFee().'=('.$order->getAmount().'×'.($order->getChannelPct()).'%='.($order->getAmount() * ($order->getChannelPct()/100)).')+'.$order->getChannelSigleFee();
		
		$qrcode = '';
		$jump_url = '';
		if('PAYIN' == $order_bundle)
		{
			$qrcode = $order->getQrcodeSrc();
			$jump_url = $order->getJumpUrl();
		}
		
		$detail = [
			'amount'=>$order->getAmount(),
			'shanghu_order_no'=>$order->getShanghuOrderNo(),
			'plantform_order_no'=>$order->getPlantformOrderNo(),
			'order_status'=>$order_status,
			'sh_fee'=>$sh_fee,
			'channel_fee'=>$channel_fee,
			'qrcode_src'=>$qrcode,
			'jump_url'=>$jump_url,
			'created_time'=>date('Y-m-d H:i:s',$order->getCreatedAt()),
		];
		
		echo json_encode(['code'=>0,'msg'=>'OK','detail'=>$detail]);
		exit();
	}
	
	public function _load_payout($request)
	{
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
		
		$filter_order_no = $request->request->get('filter_order_no','');
		if('' != $filter_order_no)
		{
			$where .= " and a.plantform_order_no like '%".$filter_order_no."%' or a.shanghu_order_no like '%".$filter_order_no."%'";
		}
		
		$order = 'a.id desc';
		$prepage = $request->request->get('prepage',10);
		
		$StatusMeta = new \AppBundle\Utils\StatusMeta();
		$statusMap = $StatusMeta->GetAll();

		$pager = $this->pager($request,'PayoutOrder',$where,$order,'',$prepage,'',true);
		foreach($pager['data'] as &$order)
		{
			$status = $order['order_status'];
			if('' != $status && array_key_exists($status,$statusMap))
			{
				$status = $statusMap[$order['order_status']];
			}
			
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
			
			$order['key'] = 'payout_order_'.$order['id'];
			$order['created_time'] = date('Y-m-d H:i:s',$order['created_at']);
			$order['payed_time'] = '-';
			$order['status_label'] = $status;
			$order['bundle'] = 'PAYOUT';
			
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
	
	public function _load_payin($request)
	{
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
		
		$filter_order_no = $request->request->get('filter_order_no','');
																				  
		
		if('' != $filter_order_no)
		{
			$where .= " and a.plantform_order_no like '%".$filter_order_no."%' or a.shanghu_order_no like '%".$filter_order_no."%'";
		}
		
		$order = 'a.id desc';
		$prepage = $request->request->get('prepage',10);
		
		$StatusMeta = new \AppBundle\Utils\StatusMeta();
		$statusMap = $StatusMeta->GetAll();

		$pager = $this->pager($request,'PayinOrder',$where,$order,'',$prepage,'',true);
		foreach($pager['data'] as &$order)
		{
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
			
			$order['key'] = 'payin_order_'.$order['id'];
			$order['created_time'] = date('Y-m-d H:i:s',$order['created_at']);
			$order['payed_time'] = '-';
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
	
	//模拟成功和失败
	public function _simulation($request)
	{
		$status = $request->request->get('status','');
		$bundle = $request->request->get('bundle','');
		$order_id = $request->request->get('orderid');
		
		if('success' != $status && 'fail' != $status)
		{
			$this->e('状态值错误');
		}
		
		//是不是测试账号
		$request_token = $request->request->get('request_token','');
		$uid = $this->GetId($request_token);
		$user = $this->db('user')->find($uid);
		$shanghu = $this->db('Shanghu')->findOneBy(['uid'=>$uid]);
		if(!$shanghu)
		{
			$this->e('账户账号未创建，无法创建代收订单,uid='.$uid);
		}
		if(1 != $shanghu->getIsTest())
		{
			$this->e('非测试账号无法使用此功能');
		}
		
		//开始模拟
		$order = $this->db('PAYIN' == $bundle ? 'PayinOrder' : 'PayoutOrder')->find($order_id);
		if(!$order)
		{
			$this->e('订单不存在，order_id='.$order_id);
		}
		if($order->getShanghuId() != $shanghu->getId())
		{
			$this->e('商户号不一致，无法操作此订单');
		}
		if('TRADE_ING' != $order->getOrderStatus())
		{
			$this->e('非 交易中 订单，无法模拟状态');
		}
		
		//开始正式修改订单模拟状态
		$config = $this->db('ShanghuConfig')->findOneBy(['master_id'=>$shanghu->getId()]);
		if(!$config)
		{
			$this->e('商户未初始化配置信息，无法模拟状态');
		}
		//计算
		$amount = $order->getAmount();

		$payin_pct       = 'PAYIN' == $bundle ? $config->getPayinPct() : $config->getPayoutPct();
		$payin_sigle_fee = 'PAYIN' == $bundle ? $config->getPayinSigleFee() : $config->getPayoutPct() ;
		
		$pct_fee = 0;
		if(is_numeric($payin_pct) && $payin_pct > 0)
		{
			$pct_fee = $amount * ($payin_pct/100);
		}
		
		$channel = $this->db('Channel')->find($order->getChannelId());
		//更新余额 - 只有模拟成功才加钱
		if('SUCCESS' == strtoupper($status))
		{
			$fee = $pct_fee + $payin_sigle_fee;
			$old_balance = $shanghu->getBalance();
			if('PAYIN' == $bundle)
			{
				$new_balance = $shanghu->getBalance() + ($amount - $fee);
			}
			else
			{
				//
			}	
			
			$shanghu->setBalance($new_balance);
			$this->update();
			
			//日志 - 记录订单创建事件
			$by = 'PAYIN' == $bundle ? '模拟代收' : '模拟代付';
			$data = [
				'by'=>$by,
				'order_id'=>$order->getId(),
				'is_test'=>$shanghu->getIsTest(),
				'type'=>'hand',
				'amount'=>$amount,
				'pct'=>$payin_pct,
				'sigle_fee'=>$payin_sigle_fee,
				'fee'=>$fee,
				'old_balance'=>$old_balance,
				'new_balance'=>$new_balance,
				'shanghu_id'=>$shanghu->getId(),
				'channel_id'=>$channel->getId(),
				'add'=>($amount - $fee),
			];
			$data = json_encode($data);
		
			$log = new \AppBundle\Entity\MoNiLog();
			$log->setUid($shanghu->getUid());
			$log->setOrderId($order->getId());
			$log->setBundle('ADD_BALANCE');
			$log->setData($data);
			$log->setCreatedAt(time());
			$this->save($log);
		}
		$order->setOrderStatus(strtoupper($status));
		$this->update();
		
		if(is_numeric($order->getChannelId()) && $order->getChannelId() > 0)
		{
			//do nothing
		}
		else
		{
			$this->e('未配置通道');
		}
		
		//回调
		$shanghu_notify_url = $order->getShanghuNotifyUrl();
		if('' != $shanghu_notify_url && 'http' == substr($shanghu_notify_url,0,4))
		{
			$sh_country = $shanghu->getCountry();
			$countries = $this->get_countries();
			$currency = '?';
			if(array_key_exists($sh_country,$countries))
			{
				$currency = $countries[$sh_country]['currency'];
			}
			$data = [
				'order_status'=>$order->getOrderStatus(),
				'shanghu_order_no'=>$order->getShanghuOrderNo(),
				'currency'=>$currency,
				'amount'=>$order->getAmount(),
				'createtime'=>date('Y-m-d H:i:s',$order->getCreatedAt()),
				'updatetime'=>date('Y-m-d H:i:s',$order->getCreatedAt()),
				'error_msg'=>'模拟状态',//正常返回：NONE
				'attach_data'=>strtoupper($bundle),
			];
			//获取签名生成方式
			{
				$payin_sign_method = $config->getPayinSignMethod();
				//生成签名
				if('md5' == $payin_sign_method)
				{
					$SignGenerator = new \AppBundle\Utils\SignGeneratorMd5();
				}
				else if('sha256' == $payin_sign_method)
				{
					$SignGenerator = new \AppBundle\Utils\SignGeneratorSha256();
				}
				else
				{
					$this->e("未配置代收签名生成方式，无法生成代收订单");
				}
				$sign = $SignGenerator->generate($post_parameters,$payin_secret);
			}
			$data['sign'] = $sign;
			$ret = $this->http($shanghu_notify_url,$data);
			if(strlen($ret) > 100)
			{
				$ret = substr($ret,0,100);
			}
			$this->succ('操作已完成,回调返回值:'.$ret);
		}
		else
		{
			$this->e('没有回调地址');
		}
		
	}
}

