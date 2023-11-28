<?php

namespace FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

class HomeController extends \AppBundle\Controller\BaseController 
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
	
	private function _load($request)
	{
		$uid = $this->GetId($request->request->get('access_token',''));
		$category = $request->request->get('category','');
		$currency = $request->request->get('currency','');
		
		//国家map
		$country_map = [];
		$countries = $this->db('country')->findAll();
		foreach($countries as $_country)
		{
			$country_map[$_country->getSlug()] = ['name'=>$_country->getName(),'currency'=>$_country->getCurrency()];
		}
		
		$countrys = [];
		//商户 group by 国家
		$where = '';
		if('' != $category && is_numeric($category) && $category > 0)
		{
			$where = ' where a.category='.$category;
		}
		$sql = "SELECT a.id,a.name,a.country from AppBundle:Shanghu a ".$where." group by a.country order by a.id";
		$sh_list_by_group = $this->em()->createQuery($sql)->setFirstResult(0)->setMaxResults(1000)->getResult();

		foreach($sh_list_by_group as $sh)
		{
			$countrys[$sh['country']] = [
				'country_slug'=>$sh['country'],
				'country_name'=>$country_map[$sh['country']]['name'],
				'currency'=>$country_map[$sh['country']]['currency'],
				'collapsible'=>1,
				'sh_list'=>[],
				'payin_succ_count'=>0,
				'payin_succ_amount'=>0.00,
				'payin_request_count'=>0,
				'payin_request_amount'=>0.00,
				'pct_total'=>0.00,
				
				//代付
				'payout_succ_count'=>0,
				'payout_succ_amount'=>0.00,
				
				//计算国家代收成功平均值
				'payin_succ_pct'=>0,
				
				//代付队列数量
				'payout_queue'=>0,
				
				//冻结、充值、提现
				'freeze'=>0,
				'topop'=>0,
				'withrawal'=>0,
				
				//手续费
				'channel_fee'=>0,
				'proxy_fee'=>0,
				'sh_fee'=>0,
			];
		}
		
		$date1 = $request->request->get('date1','');
		$date2 = $request->request->get('date2','');
		
		$time_start = strtotime(date('Y-m-d').' 0:0:0');
		$time_end = strtotime(date('Y-m-d').' 23:59:59');
		if('' != $date1)
		{
			$time_start = strtotime($date1.' 0:0:0');
		}
		if('' != $date2)
		{
			$time_end = strtotime($date2.' 23:59:59');
		}

		if('' == $category)
		{
			$sh_list = $this->db('shanghu')->findAll();
		}
		else
		{
			$sh_list = $this->db('shanghu')->findBy(['category'=>(int)$category]);
		}
		
		foreach($sh_list as $sh)
		{
			$payin_succ_count = 0;
			$payin_succ_amount = 0.00;
			$payin_request_count = 0;
			$payin_request_amount = 0.00;
			
			//代付
			$payout_succ_count = 0;
			$payout_succ_amount = 0.00;
			$payout_request_count = 0;
			$payout_request_amount = 0.00;
			
			//通道手续费
			$channel_fee = 0;
			$sh_fee = 0;
			
			//查询代收订单
			$sql = "SELECT a.id,a.shanghu_id,a.sh_fee,a.amount,a.order_status,a.channel_fee from AppBundle:PayinOrder a where a.shanghu_id=".$sh->getId()." and a.created_at > ".$time_start.' and a.created_at < '.$time_end;
			
			$payin_orders = $this->em()->createQuery($sql)->getResult();
			foreach($payin_orders as $payin_order)
			{
				if('SUCCESS' == strtoupper($payin_order['order_status']))
				{
					$payin_succ_count++;
					$payin_succ_amount += $payin_order['amount'];
					
					$countrys[$sh->getCountry()]['payin_succ_count']++;
					$countrys[$sh->getCountry()]['payin_succ_amount'] += $payin_order['amount'];
					
					$channel_fee += $payin_order['channel_fee'];
					$sh_fee += $payin_order['sh_fee'];
				}
				
				$payin_request_count++;
				$payin_request_amount += $payin_order['amount'];
				
				$countrys[$sh->getCountry()]['payin_request_count']++;
				$countrys[$sh->getCountry()]['payin_request_amount'] += $payin_order['amount'];
			}
			
			//查询代付订单
			$sql = "SELECT a.id,a.shanghu_id,a.sh_fee,a.amount,a.order_status,a.channel_fee from AppBundle:PayoutOrder a where a.shanghu_id=".$sh->getId()." and a.created_at > ".$time_start.' and a.created_at < '.$time_end;
			$payout_orders = $this->em()->createQuery($sql)->getResult();
			foreach($payout_orders as $payout_order)
			{
				if('SUCCESS' == strtoupper($payout_order['order_status']))
				{
					$payout_succ_count++;
					$payout_succ_amount += $payout_order['amount'];
					
					$countrys[$sh->getCountry()]['payout_succ_count']++;
					$countrys[$sh->getCountry()]['payout_succ_amount'] += $payout_order['amount'];
					
					$channel_fee += $payout_order['channel_fee'];
					$sh_fee += $payout_order['sh_fee'];
				}
			}
			
			//等待代付
			$payout_queue = $this->count('ChannelNotifyData',"a.bundle='PAYOUT' and a.sh_id=".$sh->getId()." and a.created_at > ".$time_start.' and a.created_at < '.$time_end);
			
			//冻结金额
			$_freeze = $this->sum('dispatch','money',"a.bundle='FREEZE' and a.shanghu_id=".$sh->getId()." and a.created_at > ".$time_start.' and a.created_at < '.$time_end);
			$_unfreeze = $this->sum('dispatch','money',"a.bundle='UNFREEZE' and a.shanghu_id=".$sh->getId()." and a.created_at > ".$time_start.' and a.created_at < '.$time_end);
			$freeze = $_freeze - $_unfreeze;
			
			//充值
			$topop = $this->sum('dispatch','money',"a.bundle='TOPOP' and a.shanghu_id=".$sh->getId()." and a.created_at > ".$time_start.' and a.created_at < '.$time_end);
			
			//提现
			$withrawal = $this->sum('dispatch','money',"a.bundle='WITHRAWAL' and a.shanghu_id=".$sh->getId()." and a.created_at > ".$time_start.' and a.created_at < '.$time_end);
			
			$row = [
				'id'=>$sh->getId(),
				'name'=>$sh->getName(),
				'category'=>$sh->getCategory(),
				'payin_succ_count'=>$payin_succ_count,
				'payin_succ_amount'=>$payin_succ_amount,
				'payin_request_count'=>$payin_request_count,
				'payin_request_amount'=>$payin_request_amount,
				'payin_succ_pct'=>$payin_request_count > 0 ? ($payin_succ_count/$payin_request_count)*100 : 0,
				
				//代付
				'payout_succ_count'=>$payout_succ_count,
				'payout_succ_amount'=>$payout_succ_amount,
				'payout_request_count'=>$payout_request_count,
				'payout_request_amount'=>$payout_request_amount,
				
				//代付队列数量
				'payout_queue'=>$payout_queue,
				'freeze'=>$freeze,
				'topop'=>$topop,
				'withrawal'=>$withrawal,
				
				//手续费
				'channel_fee'=>$channel_fee,
				'sh_fee'=>$sh_fee,
			];
			
			$countrys[$sh->getCountry()]['sh_list'][] = $row;
			$countrys[$sh->getCountry()]['payout_queue'] += $payout_queue;
			$countrys[$sh->getCountry()]['freeze'] += $freeze;
			$countrys[$sh->getCountry()]['topop'] += $topop;
			$countrys[$sh->getCountry()]['withrawal'] += $withrawal;
			$countrys[$sh->getCountry()]['channel_fee'] += $channel_fee;
			$countrys[$sh->getCountry()]['sh_fee'] += $sh_fee;
		}

		$country_list = [];
		foreach($countrys as $country)
		{
			//计算成功率
			$country['payin_succ_pct'] = 0;
			$tmp_count = 0;
			if(count($country['sh_list']) > 0)
			{
				foreach($country['sh_list'] as $row)
				{
					if($row['payin_succ_pct'] > 0)
					{
						$tmp_count++;
						$country['payin_succ_pct'] += $row['payin_succ_pct'];
					}
				}
				if($tmp_count > 0)
				{
					$country['payin_succ_pct'] = $country['payin_succ_pct']/$tmp_count;
				}
			}
			
			$country_list[] = $country;
		}
		
		echo json_encode(['country_list'=>$country_list]);
		die();
	}
}