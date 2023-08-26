<?php

namespace FrontBundle\Controller;
use Symfony\Component\HttpFoundation\Request;

class TongjiController extends \AppBundle\Controller\BaseController
{
    public function indexAction(Request $request)
    {
		
		//取出所有订单
		$this->data['pager'] = $this->pager($request,'Aorder');
		
        return $this->render('FrontBundle:Tongji:index.html.twig',$this->data);
    }
}
