<?php

namespace FrontBundle\Controller;
use Symfony\Component\HttpFoundation\Request;

class ChongzhiController extends \AppBundle\Controller\BaseController
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
    
    private function _index($request)
    {
		return $this->render('FrontBundle:Chongzhi:index.html.twig',$this->data);
	}
}


