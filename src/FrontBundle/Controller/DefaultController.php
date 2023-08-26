<?php

namespace FrontBundle\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends \AppBundle\Controller\BaseController
{
    public function indexAction(Request $request)
    {
        return $this->render('FrontBundle:Default:index.html.twig');
    }
	
	//template render
	public function templateAction(Request $request,$dir,$tpl)
    {
		if(strlen($dir) < 2) return;
		if(strlen($tpl) < 2) return;
		$dir = ucfirst($dir);
        return $this->render('FrontBundle:'.$dir.':'.$tpl.'.html.twig');
    }
}
