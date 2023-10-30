<?php

namespace FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

class DispatchController extends \AppBundle\Controller\BaseController 
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

	private function _list($request)
	{
		$bundle = $request->request->get('bundle','');
		if('' == $bundle || !in_array($bundle,['TOPUP','WITHRAWAL']))
		{
			$this->e('WT参数错误');
		}
		
		$where = "a.bundle='".$bundle."'";
		$prepage=25;
		$pager = $this->pager($request,'dispatch',$where,'a.id desc','',$prepage,'',true);
		foreach($pager['data'] as &$dispatch)
		{
			$dispatch['user'] = '??';
			$user = $this->db('user')->find($dispatch['uid']);
			if($user)
			{
				$dispatch['user'] = $user->getUsername();
			}
			
			$dispatch['shanghu'] = '??';
			$shanghu = $this->db('shanghu')->find($dispatch['shanghu_id']);
			if($shanghu)
			{
				$dispatch['shanghu'] = $shanghu->getName();
			}
			
			$dispatch['created_time'] = date('Y-m-d H:i:s',$dispatch['created_at']);
		}
		
		echo json_encode(['code'=>0,'msg'=>'OK','pager'=>$pager]);
		exit();
	}
	
//冻结
	private function _freeze($request)
	{
		$uid = $this->GetId($request->request->get('access_token',''));
		$sh_id = $this->GetId($request->request->get('request_token',''));
		$freeze_number = $request->request->get('freeze_number','');
		$freeze_number = str_replace(',','',$freeze_number);
		
		if(is_numeric($freeze_number) && $freeze_number > 0)
		{
			//do nothing
		}
		else
		{
			$this->e("金额错误");
		}
		
		if(is_numeric($sh_id) && $sh_id > 0)
		{
			$sh = $this->db('shanghu')->find($sh_id);
			if(!$sh)
			{
				$this->e('商户状态异常');
			}
			
			$balance = $sh->getBalance();
			if($freeze_number > $balance)
			{
				$this->e('冻结金额:'.$freeze_number.'不能大于商户余额:'.$balance);
			}
			
			//开始冻结金额
			//创建记录
			$note = '';
			
			$model = new \AppBundle\Entity\Dispatch();
			$model->setBundle('FREEZE');
			$model->setOldMoney($balance);
			$model->setMoney($freeze_number);
			$model->setUid($uid);
			$model->setShanghuId($sh->getId());
			$model->setNote($note);
			$model->setStatus('-');
			$model->setCreatedAt(time());
			$this->save($model);
			
			//创建日志
			if($model->getId() > 0)
			{
				$new_money = $balance - (float)$freeze_number;
				$model->setNewMoney($new_money);
				$sh->setBalance($new_money);
				$sh->setFreezePool($sh->getFreezePool() + $freeze_number);
				
				$data = json_encode(['uid'=>$uid,'sh_id'=>$sh->getId(),'old_money'=>$balance,'freeze_number'=>$freeze_number,'new_money'=>$new_money,'note'=>$note,'dispatch_id'=>$model->getId()]);
				
				$log = new \AppBundle\Entity\Alog(); 
				$log->setUid($uid);
				$log->setShId($sh->getId());
				$log->setBundle('FREEZE');
				$log->setData($data);
				$log->setCreatedAt(time());
				$log->setOrderId(0);
				$this->save($log);
			}
			else
			{
				$this->e('操作失败');
			}
			
			$this->succ('操作成功');
		}
		else
		{
			$this->e("参数错误");
		}
	}
	
	//冻结
	private function _unfreeze($request)
	{
		$uid = $this->GetId($request->request->get('access_token',''));
		$sh_id = $this->GetId($request->request->get('request_token',''));
		$unfreeze_number = $request->request->get('unfreeze_number','');
		$unfreeze_number = str_replace(',','',$unfreeze_number);
		
		if(is_numeric($unfreeze_number) && $unfreeze_number > 0)
		{
			//do nothing
		}
		else
		{
			$this->e("金额错误");
		}
		
		if(is_numeric($sh_id) && $sh_id > 0)
		{
			$sh = $this->db('shanghu')->find($sh_id);
			if(!$sh)
			{
				$this->e('商户状态异常');
			}
			
			$FreezePool = $sh->getFreezePool();
			if($unfreeze_number > $FreezePool)
			{
				$this->e('解冻金额:'.$unfreeze_number.'不能大于商户冻结金额:'.$FreezePool);
			}
			
			//开始冻结金额
			//创建记录
			$balance = $sh->getBalance();
			$note = '';
			
			$model = new \AppBundle\Entity\Dispatch();
			$model->setBundle('UNFREEZE');
			$model->setOldMoney($balance);
			$model->setMoney($unfreeze_number);
			$model->setUid($uid);
			$model->setShanghuId($sh->getId());
			$model->setNote($note);
			$model->setStatus('-');
			$model->setCreatedAt(time());
			$this->save($model);
			
			//创建日志
			if($model->getId() > 0)
			{
				$new_money = $balance + (float)$unfreeze_number;
				$model->setNewMoney($new_money);
				$sh->setBalance($new_money);
				$sh->setFreezePool($sh->getFreezePool() - $unfreeze_number);
				
				$data = json_encode(['uid'=>$uid,'sh_id'=>$sh->getId(),'old_money'=>$balance,'unfreeze_number'=>$unfreeze_number,'new_money'=>$new_money,'note'=>$note,'dispatch_id'=>$model->getId()]);
				
				$log = new \AppBundle\Entity\Alog(); 
				$log->setUid($uid);
				$log->setShId($sh->getId());
				$log->setBundle('UNFREEZE');
				$log->setData($data);
				$log->setCreatedAt(time());
				$log->setOrderId(0);
				$this->save($log);
			}
			else
			{
				$this->e('操作失败');
			}
			
			$this->succ('操作成功');
		}
		else
		{
			$this->e("参数错误");
		}
	}
	
	//发起提现或者充值
	private function _create($request)
	{
		$token = $request->request->get('token','');
		$rand = $request->request->get('rand','');
		$access_token = $request->request->get('access_token','');
		$shanghu = $request->request->get('shanghu','');
		$money = $request->request->get('money','');
		$M = $request->request->get('M','');
		$bundle = $request->request->get('bundle','');
		$note = $request->request->get('note','');
		
		$uid = $this->GetId($access_token);
		$bundle = strtoupper($bundle);
		
		if(md5('0000-2046-'.$money) != $M)
		{
			$this->e('金额异常，无法完成操作');
		}
		
		$_token = md5("DUQINGNIAN-" . $access_token . "-" . date('Y-m-d') . "-" . $rand);
		if($_token != $token)
		{
			$this->e('token not match');
		}
		
		if('' == $shanghu)
		{
			$this->e('商户参数未传递');
		}
		$shanghu_id = $this->GetId($shanghu);
		if('' == $shanghu_id || !is_numeric($shanghu_id) || $shanghu_id <= 0)
		{
			$this->e('商户id异常');
		}
		$sh = $this->db('shanghu')->find($shanghu_id);
		if(!$sh)
		{
			$this->e('商户状态异常');
		}

		$sh_user = $this->db('user')->find($sh->getUid());
		if(!$sh_user)
		{
			$this->e('账号不存在，无法执行此操作');
		}
		
		if('' == $money || !is_numeric($money) || $money <= 0 || $money >= 1000000)
		{
			$this->e('金额异常');
		}
		
		
		$balance = $sh->getBalance();
		if('WITHRAWAL' == $bundle)
		{
			if($money > $balance)
			{
				$this->e('操作失败,提现金额:'.$money.'大于余额:'.$balance);
			}
		}
		
		//创建记录
		$model = new \AppBundle\Entity\Dispatch();
		$model->setBundle($bundle);
		$model->setOldMoney($balance);
		$model->setMoney($money);
		$model->setUid($uid);
		$model->setShanghuId($sh->getId());
		$model->setNote($note);
		$model->setStatus('-');
		$model->setCreatedAt(time());
		$this->save($model);
		
		//创建日志
		if($model->getId() > 0)
		{
			$new_money = '??';
			if('TOPUP' == $bundle)
			{
				$new_money = $balance + (float)$money;
			}
			if('WITHRAWAL' == $bundle)
			{
				$new_money = $balance - (float)$money;
			}
			$model->setNewMoney($new_money);
			$sh->setBalance($new_money);
			$data = json_encode(['uid'=>$uid,'shanghu_id'=>$shanghu_id,'old_money'=>$balance,'money'=>$money,'new_money'=>$new_money,'note'=>$note,'dispatch_id'=>$model->getId()]);
			
			$log = new \AppBundle\Entity\Alog(); 
			$log->setUid($uid);
			$log->setBundle($bundle);
			$log->setData($data);
			$log->setCreatedAt(time());
			$log->setOrderId(0);
			$this->save($log);
		}
		else
		{
			$this->e('操作失败');
		}
		
		$this->succ('操作成功');
	}
}

