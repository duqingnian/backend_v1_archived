<?php

namespace FrontBundle\Controller;
use Symfony\Component\HttpFoundation\Request;

class ChannelController extends \AppBundle\Controller\BaseController
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
		$where = 'a.id > 0';
		
		$this->data['filter_name'] = $request->query->get('filter_name','');
		
		$this->data['pager'] = $this->pager($request,'Channel',$where,'','',20);
		
		//为每个数据生成token，防止误删
		foreach($this->data['pager']['data'] as &$data)
		{
			$data['token'] = $this->_generate_token($data['id']);;
		}
		
        return $this->render('FrontBundle:Channel:index.html.twig',$this->data);
    }
	
	public function _prepare($request)
	{
		//渠道 只能超级管理员才可以操作
		if($this->getUser()->getId() != 1)
		{
			$this->e('Access Deny! code:60042');
		}
		
		$this->data['id'] = $request->query->get('id',0);
		if(!is_numeric($this->data['id']) || $this->data['id'] < 0) $this->e("id is missing or error!");
		
		$name      = $request->request->get('name','');
		$percent   = $request->request->get('percent','');
		$is_active = $request->request->get('is_active','');
		$pay_type  = $request->request->get('pay_type','');
		$slug      = $request->request->get('slug','');
		$currency  = $request->request->get('currency','');
		$country   = $request->request->get('country','');
		$is_active = 'on' == $is_active ? true : false;
		
		if($request->isMethod('post'))
		{
			//判断是不是为空
			if('' == $name)
			{
				$this->e('请输入名称');
			}
			
			if(0 == $this->data['id'])
			{
				//添加
				$Channel = $this->db('Channel')->findOneBy(['name'=>$name]);
				if($Channel)
				{
					$this->e('['.$name.']已经存在');
				}
				
				//开始添加
				if(true)
				{
					//创建Channel
					$Channel = new \AppBundle\Entity\Channel();
					$Channel->setName($name);
					$Channel->setPercent($percent);
					$Channel->setIsActive($is_active);
					$Channel->setPayType($pay_type);
					$Channel->setSlug($slug);
					$Channel->setCurrency($currency);
					$Channel->setCountry($country);
					$this->save($Channel);
					
					if($Channel->getId() > 0)
					{
						$this->succ("创建成功");
					}
					else
					{
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
				$Channel = $this->db('Channel')->findOneBy(['name'=>$name]);
				if($Channel && $Channel->getId() != $this->data['id'])
				{
					$this->e('['.$name.']已经存在');
				}
				
				$Channel = $this->db('Channel')->find($this->data['id']);
				
				$Channel->setName($name);
				$Channel->setPercent($percent);
				$Channel->setIsActive($is_active);
				$Channel->setPayType($pay_type);
				$Channel->setSlug($slug);
				$Channel->setCurrency($currency);
				$Channel->setCountry($country);
				
				$em = $this->getDoctrine()->getManager();
				$em->flush();
				
				$this->succ("更新成功");
			}
		}
		else
		{
			$this->data['Channel'] = new \stdClass();
			if(0 < $this->data['id'])
			{
				$this->data['Channel'] = $this->db('Channel')->find($this->data['id']);
			}
			return $this->render('FrontBundle:Channel:prepare.html.twig',$this->data);
		}
	}
	
	//详情
	function _detail($request)
	{
		$id = $request->query->get('id',0);
		
		$this->data['Channel'] = $this->db('Channel')->find($id);
		
		return $this->render('FrontBundle:Channel:detail.html.twig',$this->data);
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
		
		$channel = $this->db('Channel')->find($id);
		if($channel)
		{
			$channel->setIsActive(false);
		}
		
        $this->update();
        
        $this->succ("已删除");
	}
	
	private function _generate_token($id)
	{
		return md5($id.date('Ymd').'duqingnian');
	}
}

