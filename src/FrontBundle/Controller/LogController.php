<?php

namespace FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

class LogController extends \AppBundle\Controller\BaseController 
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
	
	//日志的类型
	private function _types($request)
	{
		return [
			'ALL'=>'全部',
			'LOGIN'=>'登录',
			'CREATE_PAYIN_ORDER'=>'创建代收订单',
			'CREATE_PAYOUT_ORDER'=>'创建代付订单',
			'ADD_DF_POOL'=>'增加代付金额',
			'SUB_DF_POOL'=>'减少代付金额',
			'ADD_BALANCE'=>'增加余额',
			'TOPUP'=>'充值',
			'WITHRAWAL'=>'提现',
			'LOGOUT'=>'退出',
		];
	}
	
	private function _load_showing_types($request)
	{
		$types = $this->_types($request);
		
		$showing_types = [];
		foreach($types as $key=>$type)
		{
			$showing_types[] = ['key'=>$key,'type'=>$type,'is_checked'=>true];
		}
		
		echo json_encode(['code'=>0,'msg'=>'OK','showing_types'=>$showing_types]);
		exit();
	}
	
	private function _load($request)
	{
		$show_types = $request->request->get("show_types","");
		
		$access_token = $request->request->get("access_token","");
		$id = $this->GetId($access_token);
		
		//接收参数
		$date1 = $request->request->get('date1','');if('' == $date1){$date1 = date('Y-m-d');}
		$date2 = $request->request->get('date2','');if('' == $date2){$date2 = date('Y-m-d');}
		
		//处理参数
		$start_time = strtotime($date1.' 0:0:0');//$start_time = 0;
		$end_time = strtotime($date2.' 23:59:59');//$end_time = 1893427200;
		
		if($end_time < $start_time)
		{
			$this->e('结束时间不能小于开始时间');
		}
		
		//接收参数
		$date1 = $request->request->get('date1','');if('' == $date1){$date1 = date('Y-m-d');}
		$date2 = $request->request->get('date2','');if('' == $date2){$date2 = date('Y-m-d');}
		
		//处理参数
		$start_time = strtotime($date1.' 0:0:0');//$start_time = 0;
		$end_time = strtotime($date2.' 23:59:59');//$end_time = 1893427200;
		
		if($end_time < $start_time)
		{
			$this->e('结束时间不能小于开始时间');
		}
		$types = $this->_types($request);
		
		$where = 'a.id > 0 and a.created_at >= '.$start_time.' and a.created_at <= '.$end_time;
		
		if('' == $show_types)
		{
			$where = 'a.id < 0';
		}
		
		$show_types = explode(',',$show_types);
		$show_types = implode("','",$show_types);
		if('' != $show_types)
		{
			$where .= " and a.bundle in ('".$show_types."')";
		}
		
		$prepage=25;
		$pager = $this->pager($request,'Alog',$where,'a.id desc','',$prepage,'',true);
		//print_r($pager);die();
		if(count($pager['data']) > 0)
		{
			foreach($pager['data'] as &$log)
			{
				$bundle = $log['bundle'];
				$log['type'] = $bundle;
				$arr = json_decode($log['data'],true);
				$message  = [];
				//订单号
				if(is_numeric($log['order_id']) && $log['order_id'] > 0)
				{
					$message[]  = '订单号:'.$log['order_id'];
				}
				
				if(array_key_exists('channel_id',$arr))
				{
					$channel = $this->db('Channel')->find($arr['channel_id']);
					if($channel)
					{
						$message[] = '渠道:'.$channel->getName();
					}
				}
				if(array_key_exists('shanghu_id',$arr))
				{
					$shanghu = $this->db('Shanghu')->find($arr['shanghu_id']);
					if($shanghu)
					{
						$message[] = '商户:'.$shanghu->getName().''.$arr['by'];
					}
				}
				switch($bundle)
				{
					case 'ADD_BALANCE':
						$message[] = '余额'.$arr['old_balance'];
						$message[] = '加'.$arr['add'].'='.$arr['new_balance'];
						break;
					case 'CREATE_PAYIN_ORDER':
					case 'CREATE_PAYOUT_ORDER':
						if(array_key_exists('is_test',$arr))
						{
							$message[] = (0 == $arr['is_test'] ? '正式单' : '测试单');
						}
						if(array_key_exists('type',$arr))
						{
							$message[] = ('HAND' == $arr['type'] ? '手工创建' : '');
						}
						if(array_key_exists('amount',$arr))
						{
							$message[] = '金额:'.$arr['amount'];
						}
						if(array_key_exists('old_money',$arr))
						{
							$message[] = '原余额:'.$arr['old_money'];
						}
						if(array_key_exists('new_money',$arr))
						{
							$message[] = '新余额:'.$arr['new_money'];
						}
						break;
					case 'TOPUP': //充值
					case 'WITHRAWAL': //提现
						if(array_key_exists('money',$arr))
						{
							$message[] = '金额:'.$arr['money'];
						}
						if(array_key_exists('old_money',$arr))
						{
							$message[] = '原余额:'.$arr['old_money'];
						}
						if(array_key_exists('new_money',$arr))
						{
							$message[] = '新余额:'.$arr['new_money'];
						}
						break;
					default:
						$message = $log['data'];
						break;
				}
				if(1 == count($message))
				{
					$log['message'] = $message;
				}
				else
				{
					$log['message'] = implode(', ',$message);
				}
				if(array_key_exists($bundle,$types)){$log['type'] = $types[$bundle];}
				$log['created_time'] = date('Y-m-d H:i:s',$log['created_at']);
			}
		}
		
		echo json_encode(['code'=>0,'msg'=>'OK','pager'=>$pager]);
		exit();
	}
}

