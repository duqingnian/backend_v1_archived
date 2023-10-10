<?php

namespace FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

class CountryController extends \AppBundle\Controller\BaseController 
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

	private function _load($request)
	{
		$access_token = $request->request->get("access_token","");
		$id = $this->GetId($access_token);
		
		$cccodes = [];
		$_cccodes = $this->db('Country')->findAll();
		foreach($_cccodes as $cc)
		{
			$cccodes[] = [
				'id'=>$cc->getId(),
				'slug'=>$cc->getSlug(),
				'name'=>$cc->getName(),
				'code'=>$cc->getCode(),
				'currency'=>$cc->getCurrency(),
				'currency_name'=>$cc->getCurrencyName(),
			];
		}
		
		echo json_encode(['code'=>0,'msg'=>'OK','cccodes'=>$cccodes]);
		exit();
	}
}

