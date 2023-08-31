<?php

namespace FrontBundle\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends \AppBundle\Controller\BaseController
{
    public function indexAction(Request $request)
    {
		$rp = $this->get('kernel')->getRootDir();
        $diff =  realpath($rp.'/../diff/');
        $app_json = file_get_contents($diff.'/app.json');
        $data = json_decode($app_json,true);	
		
        return $this->render('FrontBundle:Default:index.html.twig',$data);
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
