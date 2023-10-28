<?php

namespace FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

class HomeController extends \AppBundle\Controller\BaseController 
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
		$uid = $this->GetId($request->request->get('access_token',''));
		
		//国家map
		$country_map = [];
		$countries = $this->db('country')->findAll();
		foreach($countries as $_country)
		{
			$country_map[$_country->getSlug()] = $_country->getName();
		}
		
		$countrys = [];
		//查询出所有的商户
		$sql = "SELECT a.id,a.name,a.country from AppBundle:Shanghu a group by a.country order by a.id";
		$sh_list_by_group = $this->em()->createQuery($sql)->setFirstResult(0)->setMaxResults(1000)->getResult();

		foreach($sh_list_by_group as $sh)
		{
			$countrys[$sh['country']] = [
				'country_slug'=>$sh['country'],
				'country_name'=>$country_map[$sh['country']],
				'collapsible'=>0,
				'sh_list'=>[],
			];
		}
		
		$sh_list = $this->db('shanghu')->findAll();
		foreach($sh_list as $sh)
		{
			$countrys[$sh->getCountry()]['sh_list'][] = [
				'name'=>$sh->getName(),
				'category'=>$sh->getCategory(),
			];
		}

		$country_list = [];
		foreach($countrys as $country)
		{
			$country_list[] = $country;
		}
		
		echo json_encode(['country_list'=>$country_list]);
		die();
	}
}