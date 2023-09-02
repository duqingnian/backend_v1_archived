<?php

namespace FrontBundle\Controller;
use Symfony\Component\HttpFoundation\Request;

class MerchantController extends \AppBundle\Controller\BaseController
{
    public function indexAction(Request $request)
    {
        $action = $request->query->get("action",'index');
        $method = '_'.$action;
        if(!method_exists($this,$method))
        {
            echo json_encode(['code'=>-1,'msg'=>'method:'.$action.' not exist!']);
            exit();
        }
		return $this->{$method}($request);
    }
	
	public function _index($request)
    {
		$where = "a.username != 'admin'";
		$this->data['filter_name'] = $request->query->get('filter_name','');
		$this->data['pager'] = $this->pager($request,'user',$where,'','',20);
		
		//渠道
		$channels = [];
		$_channels = $this->db('Channel')->findAll();
		foreach($_channels as $_c)
		{
			$channels[$_c->getId()] = $_c->getName();
		}
		
		//为每个数据生成token，防止误删
		foreach($this->data['pager']['data'] as &$data)
		{
			if($data)
			{
				$data['token'] = $this->_generate_token($data['id']);;
				
				//Merchant
				$data['merchant'] = $this->db('Merchant')->findOneBy(['uid'=>$data['id']]);
				
				$data['channel'] = null;
				if($data['merchant'])
				{
					//查询渠道
					$data['channel'] = $channels[$data['merchant']->getChannelId()];
				}
			}
		}
		
        return $this->render('FrontBundle:Merchant:index.html.twig',$this->data);
    }
	
	public function _prepare($request)
	{
		$this->data['id'] = $request->query->get('id',0);
		if(!is_numeric($this->data['id']) || $this->data['id'] < 0) $this->e("id is missing or error!");
		
		$username     = $request->request->get('username','');
		$password     = $request->request->get('password','');
		$dispaly_name = $request->request->get('dispaly_name','');
		$channel_id = $request->request->get('channel_id',0);
		$percent = $request->request->get('percent','0.00');
		
		if($request->isMethod('post'))
		{
			//判断是不是为空
			if('' == $username)
			{
				$this->e('请输入账号');
			}
			
			//判断通道是不是存在、是不是激活
			if(!is_numeric($channel_id) || $channel_id <= 0) $this->e('通道错误');
			$channel = $this->db('Channel')->find($channel_id);
			if(!$channel)
			{
				$this->e('通道不存在');
			}
			if(!$channel->getIsActive())
			{
				$this->e('通道没有激活');
			}
			
			if(0 == $this->data['id'])
			{
				if('' == $password)
				{
					$this->e('请输入密码');
				}
				
				//添加
				$user = $this->db('user')->findOneBy(['username'=>$username]);
				if($user)
				{
					$this->e('['.$user.']已经存在');
				}
				
				//开始添加
				
				$email = md5($username.$password.time());
				$email = substr($email,0,8).'@auto.gen';
				
				$userManager = $this->get('fos_user.user_manager');
				$user = $userManager->createUser();
				$user->setUsername($username);
				$user->setEmail($email);
				$user->setPlainPassword($password);
				$user->setDisplayName($dispaly_name);
				$user->setExtType('MT');
				$user->setCreatedAt(time());
				$user->setEnabled(true);
				$user->setRoles(["ROLE_USER","ROLE_MERCHANT"]);
				$userManager->updateUser($user);
				
				if($user->getId() > 0)
				{
					$appid = substr($this->_generate_token(md5($user->getId()).rand(1111,9999)),0,8);
					
					//创建Merchant
					$merchant = new \AppBundle\Entity\Merchant();
					$merchant->setUid($user->getId());
					$merchant->setAppid($appid);
					$merchant->setName($dispaly_name);
					$merchant->setAppSecret( $this->authcode($appid) );
					$merchant->setChannelId($channel_id);
					$merchant->setPercent($percent);
					$this->save($merchant);
					
					if($merchant->getId() > 0)
					{
						$this->succ("创建成功");
					}
					else
					{
						$this->em()->remove($user);
						$this->update();
						
						$this->e("创建失败-2");
					}
				}
				else
				{
					$this->e("创建失败-1");
				}
			}
			else
			{
				//编辑
				$user = $this->db('user')->findOneBy(['username'=>$username]);
				if($user && $user->getId() != $this->data['id'])
				{
					$this->e('['.$user.']已经存在');
				}
				
				$user = $this->db('user')->find($this->data['id']);
				$user->setUsername($username);
				$user->setDisplayName($dispaly_name);
				if(strlen($password) > 0)
				{
					$encoder = $this->get('security.password_encoder');
					$encoded = $encoder->encodePassword($user, $password3);
					$user->setPassword($encoded);
				}
				
				//更新渠道
				$merchant = $this->db('Merchant')->findOneBy(['uid'=>$user->getId()]);
				$merchant->setChannelId($channel_id);
				$merchant->setPercent($percent);
				$merchant->setName($dispaly_name);
				
				$em = $this->getDoctrine()->getManager();
				$em->flush();
				
				$this->succ("更新成功");
			}
		}
		else
		{
			$this->data['user'] = new \stdClass();
			if(0 < $this->data['id'])
			{
				$this->data['user'] = $this->db('user')->find($this->data['id']);
			}
			
			//通道
			$this->data['channels'] = $this->db('Channel')->findBy(['is_active'=>true]);
			
			//商扩展信息
			$this->data['merchant'] = $this->db('Merchant')->findOneBy(['uid'=>$this->data['id']]);
			
			return $this->render('FrontBundle:Merchant:prepare.html.twig',$this->data);
		}
	}
	
	//详情
	function _detail($request)
	{
		$id = $request->query->get('id',0);
		
		$this->data['merchant'] = $this->db('Merchant')->findOneBy(['uid'=>$id]);
		
		return $this->render('FrontBundle:Merchant:detail.html.twig',$this->data);
	}
	
	//删除
	function _delete($request)
	{
		$id = $request->query->get('id',0);
		if(!is_numeric($id))
		{
			$this->e('id is err!');
		}
		
		$token = $request->request->get('token','');
		if('' == $token)
		{
			$this->e('delete token is missing');
		}
		if($token !== $this->_generate_token($id))
		{
			$this->e('delete token is not match!');
		}
		
		$user = $this->db('user')->find($id);
		if(!$user)
		{
			$this->e('user not exists!');
		}
		
		$merchant = $this->db('Merchant')->findOneBy(['uid'=>$user->getId()]);
		if($merchant)
		{
			$this->em()->remove($merchant);
		}
		
		$this->em()->remove($user);
        $this->update();
        
        $this->succ("已删除");
	}
	
	private function _generate_token($id)
	{
		return md5($id.date('Ymd').'duqingnian');
	}
}

