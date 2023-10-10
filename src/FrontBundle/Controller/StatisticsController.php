<?php

namespace FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

class StatisticsController extends \AppBundle\Controller\BaseController 
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

	public function _load($request)
	{
		//接收参数
		$date1 = $request->request->get('date1','');if('' == $date1){$date1 = date('Y-m-d');}
		$date2 = $request->request->get('date2','');if('' == $date2){$date2 = date('Y-m-d');}
		
		//处理参数
		$start_time = strtotime($date1.' 0:0:0');
		$end_time = strtotime($date2.' 23:59:59');
		
		if($end_time < $start_time)
		{
			$this->e('结束时间不能小于开始时间');
		}
		
		////////////////////////
		// 处理订单
		////////////////////////
		$payin_orders = [];
		$payout_orders = [];
		
		$_payin_orders = $this->em()->createQuery("select ".$this->columns('PayinOrder').' from AppBundle:PayinOrder a where a.created_at >= '.$start_time.' and a.created_at <= '.$end_time)->setFirstResult(0)->setMaxResults(999999)->getResult();
		foreach($_payin_orders as $pio)
		{
			$payin_orders[$pio['shanghu_id']][] = $pio;
		}
		
		$_payout_orders = $this->em()->createQuery("select ".$this->columns('PayoutOrder').' from AppBundle:PayoutOrder a where a.created_at >= '.$start_time.' and a.created_at <= '.$end_time)->setFirstResult(0)->setMaxResults(999999)->getResult();
		foreach($_payout_orders as $poo)
		{
			$payout_orders[$poo['shanghu_id']][] = $poo;
		}

		//拼装需要返回的数据
		$table_rows = [];
		$shanghu_list = $this->db('Shanghu')->findAll();
		foreach($shanghu_list as $sh)
		{
			//初始化变量
			$sh_id = $sh->getId();
			
			//处理变量  入款就是充值
			/*
				<td>商户</td>
				<td>请求数</td>
				<td>请求失败数</td>
				<td>请求总额</td>
				<td>入账数</td>
				<td>入账总额</td>
				<td>出款总额</td>
				<td>代付数</td>
				<td>代付总额</td>
				<td>等待代付</td>
				<td>内充总额</td>
				<td>下发总额</td>
				<td>手续费</td>
				<td>上游手续费</td>
				<td>成功率(%)</td>
			*/
			/*
				内冲总额是上分，也就是充值
				入账总额是代收
				出款是代付。。。不是提现
				提现是下发总额
				入账和出款就是今天到实时为止的实际出入账情况，没有完成的订单不计算之内的
			*/
			$request_num               = 0; //请求数
			$request_fail_num          = 0; //请求失败数
			$request_total_amount      = 0; //请求总额
			$ruzhang_count             = 0; //入账数
			$ruzhang_total_amount      = 0; //入账总额
			$chukuan_total_amount      = 0; //出款总额
			$payout_num                = 0; //代付数
			$payout_total_amount       = 0; //代付总额
			$wait_payout_num           = 0; //等待代付
			$chongzhi_total            = '-'; //充值总额
			$xiafa_total               = '-'; //下发总额
			$fee                       = '-'; //手续费
			$channel_fee               = '-'; //上游手续费
			$succ_pct                  = '-'; //成功率
			
			//代收
			if(array_key_exists($sh_id,$payin_orders))
			{
				//print_r($payin_orders[$sh_id]);
				foreach($payin_orders[$sh_id] as $order)
				{
					//请求数量
					$request_num++;
					//总金额
					if(array_key_exists('amount',$order))
					{
						$request_total_amount += $order['amount'];
					}
					if('SUCCESS' == strtoupper($order['order_status']))
					{
						$ruzhang_count++; //入账数
						$ruzhang_total_amount += $order['amount'];
					}
					if(in_array(strtoupper($order['order_status']),['FAIL','INVALID','OTHER','ABNORMAL']))
					{
						$request_fail_num++;
					}
				}
			}
			//代付
			if(array_key_exists($sh_id,$payout_orders))
			{
				foreach($payout_orders[$sh_id] as $out)
				{
					$payout_num++;
					if(array_key_exists('amount',$out))
					{
						$payout_total_amount += $out['amount'];
					}
					if('SUCCESS' == strtoupper($out['order_status']))
					{
						$chukuan_total_amount += $out['amount'];
					}
					if(in_array(strtoupper($out['order_status']),['FAIL','INVALID','OTHER','ABNORMAL']))
					{
						//
					}
					if(in_array(strtoupper($out['order_status']),['TRADE_ING']))
					{
						$wait_payout_num++;
					}
				}
			}
			
			//组装数组
			$row = [
				'key'=>$this->authcode('ID',$sh_id),
				'sh_id'=>$sh_id,
				'sh_name'=>$sh->getName(),
				'request_num'=>$request_num,
				'request_fail_num'=>$request_fail_num,
				'request_total_amount'=>$request_total_amount,
				'ruzhang_count'=>$ruzhang_count,
				'ruzhang_total_amount'=>$ruzhang_total_amount,
				'chukuan_total_amount'=>$chukuan_total_amount,
				'payout_num'=>$payout_num,
				'payout_total_amount'=>$payout_total_amount,
				'wait_payout_num'=>$wait_payout_num,
				'chongzhi_total'=>$chongzhi_total,
				'xiafa_total'=>$xiafa_total,
				'channel_fee'=>$channel_fee,
				'fee'=>$fee,
				'succ_pct'=>$succ_pct,
			];
			
			$table_rows[] = $row;
		}
		echo json_encode(['code'=>0,'msg'=>'OK','table_rows'=>$table_rows]);
		exit();
	}
}

