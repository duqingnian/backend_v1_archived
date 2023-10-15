<?php

namespace FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

class UserController extends \AppBundle\Controller\BaseController 
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
	
	private function _load_user_group($request)
	{
		$id = $this->GetId($request->request->get("access_token",""));

		$user_group_list = [];
		$user_groups = $this->db('UserGroup')->findAll();
		foreach($user_groups as $group)
		{
			$user_group_list[] = [
				'id'=>$group->getId(),
				'name'=>$group->getName(),
				'request_token'=>$this->authcode('ID'.$group->getId()),
			];
		}
		
		echo json_encode(['code'=>0,'msg'=>'OK','user_group_list'=>$user_group_list]);
		exit();
	}
	
	//创建权限组
	private function _create_user_group($request)
	{
		$id = $this->GetId($request->request->get("access_token",""));
		
		$name = $request->request->get('name','');
		if('' == $name)
		{
			$this->e('名称不能为空');
		}
		
		$user_group = $this->db('UserGroup')->findOneBy(['name'=>$name]);
		if($user_group)
		{
			$this->e('名称:'.$name.'已经存在!');
		}
		
		$user_group = new \AppBundle\Entity\UserGroup();
		$user_group->setName($name);
		$this->save($user_group);
		
		$this->succ('已添加');
	}
	
	//权限组详情
	private function _user_group_detail($request)
	{
		$id = $this->GetId($request->request->get("access_token",""));
		
		$request_token = $request->request->get('request_token','');
		if('' == $request_token)
		{
			$this->e('request_token is missing');
		}
		$user_group_id = $this->GetId($request_token);
		$user_group = $this->db('UserGroup')->find($user_group_id);
		if(!$user_group)
		{
			$this->e('用户组不存在');
		}
		
		//用户组的权限
		$user_group_permissions = [];
		$_user_group_permissions = $this->db('UserGroupPermission')->findBy(['user_group_id'=>$user_group->getId()]);
		foreach($_user_group_permissions as $_user_group_permission)
		{
			$user_group_permissions[] = $_user_group_permission->getPermissionId();
		}
		
		//标准权限
		$permissions = $this->get_stand_permissions();
		foreach($permissions as &$permission)
		{
			$all_chencked = true;
			foreach($permission['permissions'] as &$p)
			{
				if(in_array($p['id'],$user_group_permissions))
				{
					$p['is_checked'] = 1;
				}
				else
				{
					$all_chencked = false;
				}
			}
			if($all_chencked)
			{
				$permission['is_checked'] = 1;
			}
		}
		
		echo json_encode([
			'code'=>0,
			'msg'=>'OK',
			'user_group'=>
			[
				'id'=>$user_group->getId(),
				'name'=>$user_group->getName(),
				'request_token'=>$this->authcode('ID'.$user_group->getId()),
				'permissions'=>$permissions,
			]
		]);
		die();
	}
	
	//更新 用户组 权限
	private function _update_permission($request)
	{
		$this->GetId($request->request->get("access_token",""));
		$uer_group_id = $this->GetId($request->request->get("request_token",""));
		
		//用户是不是存在
		if(is_numeric($uer_group_id) && $uer_group_id > 0)
		{
			$uer_group = $this->db('UserGroup')->find($uer_group_id);
			if(!$uer_group)
			{
				$this->e('用户组不存在');
			}
		}
		else
		{
			$this->e('uer_group_id error');
		}
		
		//删除用户组原来的权限
		$user_group_permissions = $this->db('UserGroupPermission')->findBy(['user_group_id'=>$uer_group_id]);
		foreach($user_group_permissions as $ugp)
		{
			$this->em()->remove($ugp);
		}
		$this->update();
		
		$ps = $request->request->get('ps','');
		$permissions = explode(',',$ps);
		foreach($permissions as $permission)
		{
			$permission_id = $this->GetId($permission);
			if('' != $permission_id && is_numeric($permission_id) && $permission_id > 0)
			{
				$pm = $this->db('permission')->find($permission_id);
				if($pm)
				{
					$UserGroupPermissionModel = new \AppBundle\Entity\UserGroupPermission();
					$UserGroupPermissionModel->setUserGroupId($uer_group_id);
					$UserGroupPermissionModel->setPermissionId($permission_id);
					$this->save($UserGroupPermissionModel);
				}
			}
		}
		
		$this->succ('已更新');
		
	}
	
	//根据用户组查询权限
	private function _findPermissionByUserGroup($request)
	{
		$this->GetId($request->request->get("access_token",""));
		$user_group_id = $this->GetId($request->request->get('request_token',''));
		
		//用户组的权限
		$user_group_permissions = [];
		$_user_group_permissions = $this->db('UserGroupPermission')->findBy(['user_group_id'=>$user_group_id]);
		foreach($_user_group_permissions as $_user_permission)
		{
			$user_group_permissions[] = $_user_permission->getPermissionId();
		}
		
		//标准权限
		$permissions = $this->get_stand_permissions();
		foreach($permissions as &$permission)
		{
			$all_chencked = true;
			foreach($permission['permissions'] as &$p)
			{
				if(in_array($p['id'],$user_group_permissions))
				{
					$p['is_checked'] = 1;
				}
				else
				{
					$all_chencked = false;
				}
			}
			if($all_chencked)
			{
				$permission['is_checked'] = 1;
			}
		}
		
		echo json_encode([
			'code'=>0,
			'msg'=>'OK',
			'permissions'=>$permissions
		]);
		exit();
	}
	
	private function get_stand_permissions()
	{
		$data = [];
		$groups = $this->db('permissionGroup')->findAll();
		foreach($groups as $group)
		{
			$permissions = [];
			
			$_permissions = $this->db('permission')->findBy(['group_id'=>$group->getId()]);
			
			foreach($_permissions as $_permission)
			{
				$color = '#616060';
				if('ADMINISTRATOR' == $_permission->getSlug())
				{
					$color = '#eb0f0f';
				}
				else if('ADMIN' == $_permission->getSlug())
				{
					$color = '#cf6060';
				}
				else if('DEVELOPER' == $_permission->getSlug())
				{
					$color = '#10619A';
				}
				else
				{
					$color = '#616060';
				}
				$permissions[] = ['id'=>$_permission->getId(),'request_token'=>$this->authcode('ID'.$_permission->getId()),'name'=>$_permission->getName(),'color'=>$color,'is_checked'=>0];
			}
			
			$data[] = [
				'request_token'=>$this->authcode('ID'.$group->getId()),
				'group_id'=>$group->getId(),
				'group_name'=>$group->getName(),
				'is_checked'=>0,
				'permissions'=>$permissions,
			];
		}
		return $data;
	}
	
	//载入中户
	private function _load_user($request)
	{
		$this->GetId($request->request->get("access_token",""));
		$where = "a.id > 0 and a.acc_type!='SH'";
		
		$pager = $this->pager($request,'user',$where,'a.id desc','',25,'',true);
		foreach($pager['data'] as &$user)
		{
			$group_name = '-';
			if(array_key_exists('group_id',$user) && is_numeric($user['group_id']) && $user['group_id'] > 0)
			{
				$group = $this->db('UserGroup')->find($user['group_id']);
				if($group){$group_name = $group->getName();}
			}
			
			$user['request_token'] = $this->authcode('ID'.$user['id']);
			$user['group'] = $group_name;
		}
		
		echo json_encode(['code'=>0,'msg'=>'ok','pager'=>$pager]);
		die();
	}
	
	//创建用户
	private function _create_user($request)
	{
		$id = $this->GetId($request->request->get("access_token",""));
		
		$display_name = $request->request->get('display_name','');
		if('' == $display_name){$this->e('姓名不能为空');}
		
		$username = $request->request->get('username','');
		if('' == $username){$this->e('账号不能为空');}
		
		$password = $request->request->get('password','');
		if('' == $password){$this->e('密码不能为空');}
		if(strlen($password) < 6 || strlen($password) > 16){$this->e('密码长度最小6位数，最多16位数');}
		if(in_array($password,['123456']))
		{
			$this->e('不允许使用的弱密码:'.$password);
		}

		$is_active = $request->request->get('is_active',0);
		$group_id = $request->request->get('group_id',0);
		if(0 == $group_id)
		{
			$this->e('请选择用户组');
		}
		if(is_numeric($group_id) && $group_id > 0)
		{
			$group = $this->db('UserGroup')->find($group_id);
			if(!$group) $this->e('UserGroup not exist!');
		}
		else
		{
			$this->e('group_id error');
		}
		
		$user = $this->db('User')->findOneBy(['username'=>$username]);
		if($user)
		{
			$this->e('账号:'.$username.'已经存在!');
		}
		
		$email = substr( md5($account.$password.time()),0,8).'@auto.gen';
		
		$userManager = $this->get('fos_user.user_manager');
		$user = $userManager->createUser();
		$user->setUsername($username);
		$user->setDisplayName($display_name);
		$user->setEmail($email);
		$user->setPlainPassword($password);
		$user->setAccType('SA');
		$user->setGroupId($group->getId());
		$user->setCreatedAt(time());
		$user->setEnabled(1 == $is_active ? true : false);
		$user->setIsActive($is_active);
		$user->setRoles(["ROLE_USER","ROLE_SUPER_ADMIN"]);
		$userManager->updateUser($user);
		
		//查找用户组的权限，设置为用户的默认权限
		$group_permissions = $this->db('UserGroupPermission')->findBy(['user_group_id'=>$group->getId()]);
		foreach($group_permissions as $group_permission)
		{
			$UserPermissionModel = new \AppBundle\Entity\UserPermission();
			$UserPermissionModel->setUserId($user->getId());
			$UserPermissionModel->setPermissionId($group_permission->getPermissionId());
			$this->save($UserPermissionModel);
		}
		
		$this->succ('已添加');
	}
	
	//用户详情
	private function _user_detail($request)
	{
		$id = $this->GetId($request->request->get("access_token",""));
		$user_id = $this->GetId($request->request->get("request_token",""));
		
		$user = $this->db('user')->find($user_id);
		if(!$user)
		{
			$this->e('用户不存在');
		}
		
		//用户的权限
		$user_permissions = [];
		$_user_permissions = $this->db('UserPermission')->findBy(['user_id'=>$user->getId()]);
		foreach($_user_permissions as $_user_permission)
		{
			$user_permissions[] = $_user_permission->getPermissionId();
		}
		
		//标准权限
		$permissions = $this->get_stand_permissions();
		foreach($permissions as &$permission)
		{
			$all_chencked = true;
			foreach($permission['permissions'] as &$p)
			{
				if(in_array($p['id'],$user_permissions))
				{
					$p['is_checked'] = 1;
				}
				else
				{
					$all_chencked = false;
				}
			}
			if($all_chencked)
			{
				$permission['is_checked'] = 1;
			}
		}
		
		echo json_encode([
			'code'=>0,
			'msg'=>'OK',
			'user'=>[
				'id'=>$user->getId(),
				'request_token'=>$this->authcode('ID'.$user->getId()),
				'detail'=>[
					'username'=>$user->getUsername(),
					'display_name'=>$user->getDisplayName(),
					'group_id'=>$user->getGroupId(),
					'is_active'=>$user->getIsActive(),
				],
				'permissions'=>$permissions,
			]
		]);
		exit();
	}
	
	//删除用户
	private function _delete_user($request)
	{
		$id = $this->GetId($request->request->get("access_token",""));
		$user_id = $this->GetId($request->request->get("request_token",""));
		
		$user = $this->db('user')->find($user_id);
		if(!$user)
		{
			$this->e('用户不存在');
		}
		
		$this->em()->remove($user);
		
		//删除用户的权限
		$_user_permissions = $this->db('UserPermission')->findBy(['user_id'=>$user->getId()]);
		foreach($_user_permissions as $_user_permission)
		{
			$this->em()->remove($_user_permission);
		}
		
		$this->update();
		$this->succ('用户已删除');
	}

	//更新用户
	private function _update_user($request)
	{
		$this->GetId($request->request->get("access_token",""));
		$user_id = $this->GetId($request->request->get("request_token",""));
		
		$username = $request->request->get('username','');
		$display_name = $request->request->get('display_name','');
		$password = $request->request->get('password','');
		$group_id = $request->request->get('group_id',0);
		$is_active = $request->request->get('is_active',0);
		$ps = $request->request->get('ps','');
		
		//常规判断
		if('' == $display_name){$this->e('姓名不能为空');}
		if('' == $username){$this->e('账号不能为空');}
		if('' != $password)
		{
			if(strlen($password) < 6 || strlen($password) > 16)
			{
				$this->e('密码长度最小6位数，最多16位数');
			}
			if(in_array($password,['123456']))
			{
				$this->e('不允许使用的弱密码:'.$password);
			}
		}
		if(0 == $group_id)
		{
			$this->e('请选择用户组');
		}
		if(is_numeric($group_id) && $group_id > 0)
		{
			$group = $this->db('UserGroup')->find($group_id);
			if(!$group) $this->e('UserGroup not exist!');
		}
		else
		{
			$this->e('group_id error');
		}
		
		$user = $this->db('user')->find($user_id);
		if(!$user)
		{
			$this->e('用户不存在');
		}
		
		$user_check = $this->db('User')->findOneBy(['username'=>$username]);
		if($user_check && $user->getId() != $user_check->getId())
		{
			$this->e('账号:'.$username.'已经存在!');
		}
		
		//可以正常更新
		$user->setUsername($username);
		$user->setDisplayName($display_name);
		if('' != $password)
		{
			$user->setPlainPassword($password);
		}
		$user->setGroupId($group->getId());
		$user->setEnabled(1 == $is_active ? true : false);
		$user->setIsActive($is_active);
		$this->update();
		
		//开始处理权限
		$user_permissions = [];
		$_user_permissions = $this->db('UserPermission')->findBy(['user_id'=>$user->getId()]);
		foreach($_user_permissions as $_user_permission)
		{
			$this->em()->remove($_user_permission);
		}
		$this->update();
		
		if(strlen($ps) > 0)
		{
			$permissions = explode(',',$ps);
			foreach($permissions as $permission)
			{
				$permission_id = $this->GetId($permission);
				
				$UserPermissionModel = new \AppBundle\Entity\UserPermission();
				$UserPermissionModel->setUserId($user->getId());
				$UserPermissionModel->setPermissionId($permission_id);
				$this->save($UserPermissionModel);
			}
		}
		
		$this->succ('已更新');
	}
	
	//生成谷歌验证器二维码
	private function _google_bind($request)
	{
		$id = $this->GetId($request->request->get("access_token",""));
		$user = $this->db('user')->find($id);
		if(!$user)
		{
			$this->e('[google_bind] user not exist!');
		}
		
		$google_authenticator = new \AppBundle\Utils\GoogleAuthenticator();
		if('' == $user->getGoogleSecret())
		{
			$this->user_secret = $google_authenticator->createSecret(32);
			$user->setGoogleSecret($this->user_secret);
			$this->update();
		}else{
			$this->user_secret = $user->getGoogleSecret();
		}
		
		$title = $this->device_name;
		if('' != $user->getUsername())
		{
			$title .= '('.$user->getUsername().')';
		}
		
		$qrcode_data = $google_authenticator->GetQRcodeData($title,$this->user_secret);
		$qrcode_data = urlencode($qrcode_data);
		$qrcode = 'http://backend.9poc.com/qrcode.generate?data='.$qrcode_data;
		
		echo json_encode([
			'code'=>0,
			'msg'=>'OK',
			'qrcode'=>$qrcode,
			'user_secret'=>$this->user_secret,
			'binded'=>$user->getGoogleAuthBind(),
		]);
		exit();
	}
	
	//绑定 解绑操作
	private function _bind_google($request)
	{
		$id = $this->GetId($request->request->get("access_token",""));
		$user = $this->db('user')->find($id);
		if(!$user)
		{
			$this->e('[google_bind] user not exist!');
		}
		
		$google_authenticator = new \AppBundle\Utils\GoogleAuthenticator();
		$user_google_secret = $user->getGoogleSecret();
		
		$google_code = $request->request->get('google_code','');
		$user_secret = $request->request->get('user_secret','');
		
		if(6 != strlen($google_code))
		{
			$this->e('请输入六位数谷歌验证码');
		}
		if($user_google_secret != $user_secret)
		{
			$this->e('密钥不匹配，请刷新页面后重试！');
		}
		
		$checkResult = $google_authenticator->verifyCode($user_google_secret, $google_code, 2);
		if ($checkResult) {
			if(1 == $user->getGoogleAuthBind())
			{
				//准备解绑
				$user->setGoogleAuthBind(0);
				$this->update();
				
				$this->succ('已解绑');
			}
			else
			{
				$user->setGoogleAuthBind(1);
				$this->update();
				
				$this->succ('已绑定');
			}
		} else {
			$this->e('验证码不匹配!');
		}
	}
}


