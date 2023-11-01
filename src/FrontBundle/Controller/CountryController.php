<?php

namespace FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

class CountryController extends \AppBundle\Controller\BaseController 
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

	private function _load($request)
	{
		$access_token = $request->request->get("access_token","");
		$id = $this->GetId($access_token);
		
		$cccodes = [];
		$_cccodes = $this->db('Country')->findAll();
		foreach($_cccodes as $cc)
		{
			$cccodes[] = [
				'request_token'=>$this->authcode('ID'.$cc->getId()),
				'slug'=>$cc->getSlug(),
				'name'=>$cc->getName(),
				'code'=>$cc->getCode(),
				'currency'=>$cc->getCurrency(),
				'currency_name'=>$cc->getCurrencyName(),
				'rate_usdt'=>$cc->getRateUsdt(),
				'rate_rmb'=>$cc->getRateRmb(),
			];
		}
		
		echo json_encode(['code'=>0,'msg'=>'OK','cccodes'=>$cccodes]);
		exit();
	}
	
	private function _sync($request)
	{
		$request_token = $request->request->get("request_token","");
		$name = $request->request->get("name","");
		$text = $request->request->get("text","");
		$id = $this->GetId($request_token);
		
		if('' == $text)
		{
			$text = 0.00;
		}
		
		if(is_numeric($id) && $id > 0)
		{
			$cccode = $this->db('Country')->find($id);
			if(!$cccode)
			{
				$this->e('不存在');
			}
			if('rate_usdt' == $name)
			{
				$cccode->setRateUsdt($text);
			}
			if('rate_rmb' == $name)
			{
				$cccode->setRateRmb($text);
			}
			$this->update();
			echo json_encode(['code'=>0,'msg'=>'已更新']);
			exit();
		}
		else
		{
			$this->e('参数错误');
		}
	}
}

