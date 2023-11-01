<?php

namespace FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

class SettingController extends \AppBundle\Controller\BaseController 
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

	//载入权限组
	private function _load_permission_group($request)
	{
		$id = $this->GetId($request->request->get("access_token",""));

		$permission_group_list = [];
		$permission_groups = $this->db('PermissionGroup')->findBy(['bundle'=>0]);
		foreach($permission_groups as $group)
		{
			$permission_group_list[] = [
				'id'=>$group->getId(),
				'name'=>$group->getName(),
				'request_token'=>$this->authcode('ID'.$group->getId()),
			];
		}
		
		echo json_encode(['code'=>0,'msg'=>'OK','permission_group_list'=>$permission_group_list]);
		exit();
	}
	
	//创建权限组
	private function _create_permission_group($request)
	{
		$id = $this->GetId($request->request->get("access_token",""));
		$user = $this->db('user')->find($id);
		if(!$user)
		{
			$this->e('[create_permission_group] user not exist!');
		}
		
		$name = $request->request->get('name','');
		if('' == $name)
		{
			$this->e('名称不能为空');
		}
		
		$permission_group = $this->db('PermissionGroup')->findOneBy(['name'=>$name]);
		if($permission_group)
		{
			$this->e('名称:'.$name.'已经存在!');
		}
		
		//确定是商户的还是平台的
		$bundle = -1;
		if('SA' == $user->getAccType()){ $bundle = 0; }
		else if('SH' == $user->getAccType()){ $bundle = 1; }
		else{}
		
		$permission_group = new \AppBundle\Entity\PermissionGroup();
		$permission_group->setName($name);
		$permission_group->setBundle($bundle);
		$this->save($permission_group);
		
		$this->succ('已添加');
	}
	
	//权限组详情
	private function _permission_group_detail($request)
	{
		$id = $this->GetId($request->request->get("access_token",""));
		
		$request_token = $request->request->get('request_token','');
		if('' == $request_token)
		{
			$this->e('request_token is missing');
		}
		$permission_group_id = $this->GetId($request_token);
		$permission_group = $this->db('PermissionGroup')->find($permission_group_id);
		if(!$permission_group)
		{
			$this->e('权限组不存在');
		}
		
		$permissions = [];
		$_permissions = $this->db('permission')->findBy(['group_id'=>$permission_group->getId()]);
		foreach($_permissions as $_permission)
		{
			$permissions[] = [
				'request_token'=>$this->authcode('ID'.$_permission->getId()),
				'name'=>$_permission->getName().'('.$_permission->getSlug().')',
				//'name'=>$_permission->getName(),
				'slug'=>$_permission->getSlug(), 
			];
		}
		
		echo json_encode([
			'code'=>0,
			'msg'=>'OK',
			'permission_group'=>[
				'id'=>$permission_group->getId(),
				'name'=>$permission_group->getName(),
				'request_token'=>$this->authcode('ID'.$permission_group->getId()),
				'permissions'=>$permissions,
			]
		]);
		die();
	}
	
	//添加权限
	private function _create_permission($request)
	{
		$id = $this->GetId($request->request->get("access_token",""));
		
		$request_token = $request->request->get('group_request_token','');
		$name = $request->request->get('name','');
		$slug = $request->request->get('slug','');
		
		if('' == $request_token){$this->e('request_token is missing');}
		if('' == $name){$this->e('权限名称不能为空');}
		if('' == $slug){$this->e('权限别名不能为空');}
		
		$permission_group_id = $this->GetId($request_token);
		$permission_group = $this->db('PermissionGroup')->find($permission_group_id);
		if(!$permission_group)
		{
			$this->e('权限组不存在');
		}
		
		//查重
		$permission = $this->db('Permission')->findOneBy(['group_id'=>$permission_group_id,'name'=>$name]);
		if($permission)
		{
			$this->e('权限名称:'.$name.'已经存在');
		}
		
		$permission = $this->db('Permission')->findOneBy(['group_id'=>$permission_group_id,'slug'=>$slug]);
		if($permission)
		{
			$this->e('权限别名:'.$slug.'已经存在');
		}
		
		//开始入库
		$permission = new \AppBundle\Entity\Permission();
		$permission->setGroupId($permission_group->getId());
		$permission->setName($name);
		$permission->setSlug($slug);
		$this->save($permission);
		
		$this->succ('已添加');
	}
	
	//删除权限
	private function _remove_permission($request)
	{
		$this->GetId($request->request->get("access_token",""));
		$request_token = $request->request->get('request_token','');
		
		$id = $this->GetId($request_token);
		$permission = $this->db('Permission')->find($id);
		if(!$permission)
		{
			$this->e('权限['.$id.']不存在');
		}
		
		$this->em()->remove($permission);
		$this->update();
		
		$this->succ('已完成');
	}
}

