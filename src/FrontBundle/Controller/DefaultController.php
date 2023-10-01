<?php

namespace FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends \AppBundle\Controller\BaseController 
{
    public function indexAction()
    {
		$data = [
			'access_token'=>$this->authcode('ID'.$this->getUser()->getId()),
		];
        return $this->render('FrontBundle:Default:index.html.twig',$data);
    }
}
