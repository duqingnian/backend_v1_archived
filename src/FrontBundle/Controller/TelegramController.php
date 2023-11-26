<?php

namespace FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

class TelegramController extends \AppBundle\Controller\BaseController 
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

	public function _create_bot($request)
    {
		$uid = $this->GetId($request->request->get('access_token',''));
		
		$name = $request->request->get('bot_name','');
		$slug = $request->request->get('bot_slug','');
		$bot_token = $request->request->get('bot_token','');
		
		if('' == $name)
		{
			$this->e('中文名称不能为空');
		}
		else if('' == $slug)
		{
			$this->e('英文名称不能为空');
		}
		else if('' == $bot_token)
		{
			$this->e('token不能为空');
		}
		else{}
		
		if('bot' == substr($bot_token,0,3))
		{
			$bot_token = substr($bot_token,3);
		}
		
		$telegram_bot = $this->db('TelegramBot')->findOneBy(['token'=>$bot_token]);
		if($telegram_bot)
		{
			$this->e("token已经存在:".$bot_token);
		}
		
		$telegram_bot = new \AppBundle\Entity\TelegramBot();
		$telegram_bot->setName($name);
		$telegram_bot->setSlug($slug);
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
	
	private function _load_bot($request)
	{
		$uid = $this->GetId($request->request->get('access_token',''));
		$json = ['code'=>0,'msg'=>'OK','bot_list'=>[]];

		$telegram_bot_list = [];
		$telegram_bots = $this->db('TelegramBot')->findAll();
		foreach($telegram_bots as $telegram_bot)
		{
			$telegram_bot_list[] = [
				'id'=>$telegram_bot->getId(),
				'name'=>$telegram_bot->getName(),
				'slug'=>$telegram_bot->getSlug(),
				'request_token'=>$this->authcode('ID'.$telegram_bot->getId()),
				'created_time'=>date('Y-m-d H:i:s',$telegram_bot->getCreatedAt()),
			];
		}
		echo json_encode(['code'=>0,'msg'=>'OK','telegram_bots'=>$telegram_bot_list]);exit();
	}

	private function _update($request) 
	{
		$this->GetId($request->request->get('access_token',''));
		$request_token = $request->request->get('request_token','');
		$commands = $request->request->get('_commands','');
		$name = $request->request->get('name','');
		$slug = $request->request->get('slug','');
		$token = $request->request->get('bot_token','');
		$commands = json_decode($commands,true);
		
		$bot_id = $this->GetId($request_token);
		$bot = $this->db('TelegramBot')->find($bot_id);
		if(!$bot)
		{
			$this->e('机器人不存在');
		}
		$bot->setName($name);
		$bot->setSlug($slug);
		$bot->setToken($token);
		$this->update();
		
		foreach($commands as $command)
		{
			if('' == $command['custom_name'])
			{
				continue;
			}
			
			$bot_command = $this->db('TelegramBotCmd')->findOneBy(['bot_id'=>$bot_id,'const_name'=>$command['key']]);
			
			if($bot_command)
			{
				$bot_command->setCustomName($command['custom_name']);
				$bot_command->setConstContent($command['const_content']);
			}
			else
			{
				$custom_name   = null == $command['custom_name'] ? '' :$command['custom_name'];
				$const_content = null == $command['const_content'] ? '' :$command['const_content'];
				
				$bot_command = new \AppBundle\Entity\TelegramBotCmd();
				$bot_command->setBotId($bot_id);
				$bot_command->setConstName($command['key']);
				$bot_command->setCustomName($custom_name);
				$bot_command->setConstContent($const_content);
				
				$this->save($bot_command);
			}
		}
		$this->update();
		
		$this->succ("已更新");
	}
	
	private function _detail($request)
	{
		$uid = $this->GetId($request->request->get('access_token',''));
		$bot_id = $this->GetId($request->request->get('request_token',''));
		
		$bot = $this->db('TelegramBot')->find($bot_id);
		if(!$bot)
		{
			$this->e('机器人不存在');
		}
		
		$commands = $this->_get_const();
		
		$map = [];
		$cmds = $this->db('TelegramBotCmd')->findBy(['bot_id'=>$bot_id]);
		foreach($cmds as &$cmd)
		{
			$map[$cmd->getConstName()]['custom_name'] = $cmd->getCustomName();
			$map[$cmd->getConstName()]['const_content'] = $cmd->getConstContent();
		}
		
		foreach($commands as &$command)
		{
			$command['custom_name'] = $map[$command['key']]['custom_name'];
			$command['const_content'] = $map[$command['key']]['const_content'];
		}
		
		$_bot = [
			'id'=>$bot->getId(),
			'name'=>$bot->getName(),
			'slug'=>$bot->getSlug(),
			'bot_token'=>$bot->getToken(),
			'request_token'=>$this->authcode('ID'.$bot->getId()),
			'const_names'=>$const_names,
			'commands'=>$commands,
		];
		echo json_encode(['code'=>0,'msg'=>'OK','bot'=>$_bot]);
		exit();
	}
	
	private function _get_const()
	{
		return [
			['key'=>'HELP','text'=>'获取帮助','custom_name'=>'','const_content'=>''],
			['key'=>'BIND','text'=>'绑定商户appId','custom_name'=>'','const_content'=>''],
			['key'=>'BALANCE','text'=>'获取商户余额','custom_name'=>'','const_content'=>''],
			['key'=>'QUERY','text'=>'代收查询','custom_name'=>'','const_content'=>''],
			['key'=>'VOUCHER','text'=>'获取凭证','custom_name'=>'','const_content'=>''],
			['key'=>'ORDER','text'=>'获取订单详情','custom_name'=>'','const_content'=>''],
			['key'=>'WHOAMI','text'=>'获取当前群组id','custom_name'=>'','const_content'=>''],
		];
	}
}
