<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends \AppBundle\Controller\BaseController 
{
    public function indexAction(Request $request)
    {
		$data = [
			'uid'=>$this->getUser()->getId(),
			'access_token'=>$this->authcode('ID'.$this->getUser()->getId()),
			'title'=>$this->title,
			'http_url'=>$this->http_url,
		];
		
		$user_permissions = [];
		$_user_permissions = $this->db('UserPermission')->findBy(['user_id'=>$this->getUser()->getId()]);
		foreach($_user_permissions as $_user_permission)
		{
			$permission = $this->db('Permission')->find($_user_permission->getPermissionId());
			if($permission){
				$user_permissions[] = $permission->getSlug();
			}
		}
		$data['user_permissions'] = implode("','",$user_permissions);
		
        return $this->render('FrontBundle:Default:index.html.twig',$data);
    }
	
	public function debugAction(Request $request)
	{
		$debug = $this->getParameter('kernel.debug');
        echo $debug ? 'Enabled' : 'Disabled';
		exit();
    }
}
