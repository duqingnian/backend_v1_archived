<?php

namespace FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

class TelegramController extends \AppBundle\Controller\BaseController 
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

	public function _create_bot($request)
    {
		$uid = $this->GetId($request->request->get('access_token',''));
		
		$name = $request->request->get('name','');
		$bot_token = $request->request->get('bot_token','');
		$telegram_group_id = $request->request->get('telegram_group_id','');
		$sh_id = $request->request->get('sh_id','');
		
		if('' == $name)
		{
			$this->e('名称不能为空');
		}
		else if('' == $bot_token)
		{
			$this->e('token不能为空');
		}
		else if('' == $telegram_group_id)
		{
			$this->e('群组ID不能为空');
		}
		else if('' == $sh_id)
		{
			$this->e('请选择商户');
		}
		else{}
		
		if('bot' != substr($bot_token,0,3))
		{
			$this->e("token格式错误");
		}
		if('-' != substr($telegram_group_id,0,1))
		{
			$this->e("群组ID格式错误");
		}
		
		$telegram_bot = $this->db('TelegramBot')->findOneBy(['token'=>$bot_token]);
		if($telegram_bot)
		{
			$this->e("token已经存在:".$bot_token);
		}
		
		$sh_id = $this->GetId($sh_id);
		
		$telegram_bot = new \AppBundle\Entity\TelegramBot();
		$telegram_bot->setName($name);
		$telegram_bot->setTelegramGroupId($telegram_group_id);
		$telegram_bot->setShId($sh_id);
		$telegram_bot->setToken($bot_token);
		$telegram_bot->setCreatedAt(time());
		$this->save($telegram_bot);
		
		if($telegram_bot->getId() > 0)
		{
			$this->succ('已添加');
		}
		else
		{
			$this->e('添加失败,错误码:6045');
		}
	}
	
	private function _sh_list($request)
	{
		$uid = $this->GetId($request->request->get('access_token',''));
		
		$sh_list = [];
		$shs = $this->db('shanghu')->findAll();
		foreach($shs as $sh)
		{
			$sh_list[] = ['key'=>$this->authcode('ID'.$sh->getId()),'text'=>$sh->getName()];
		}
		
		echo json_encode(['code'=>0,'msg'=>'OK','sh_list'=>$sh_list]);
		exit();
	}
	
	private function _load_bot($request)
	{
		$uid = $this->GetId($request->request->get('access_token',''));
		$json = ['code'=>0,'msg'=>'OK','bot_list'=>[]];

		$telegram_bot_list = [];
		$telegram_bots = $this->db('TelegramBot')->findAll();
		foreach($telegram_bots as $telegram_bot)
		{
			$sh_id = $telegram_bot->getShId();
			$sh = $this->db('shanghu')->find($sh_id);
			$sh_name = '';
			if($sh)
			{
				$sh_name = $sh->getName();
			}
			$telegram_bot_list[] = [
				'name'=>$telegram_bot->getName(),
				'token'=>$telegram_bot->getToken(),
				'sh_name'=>$sh_name,
				'is_checked'=>0,
				'telegram_group_id'=>$telegram_bot->getTelegramGroupId(),
				'request_token'=>$this->authcode($telegram_bot->getId()),
				'created_time'=>date('Y-m-d H:i:s',$telegram_bot->getCreatedAt()),
			];
		}
		echo json_encode(['code'=>0,'msg'=>'OK','telegram_bots'=>$telegram_bot_list]);exit();
	}

	private function _update($request) 
	{
		$uid = $this->GetId($request->request->get('access_token',''));
		
		$name = $request->request->get('name','');
		
		$this->succ("已更新");
	}
	
	private function _detail($request)
	{
		$uid = $this->GetId($request->request->get('access_token',''));
	}

}
