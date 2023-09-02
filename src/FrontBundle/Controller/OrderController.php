<?php

namespace FrontBundle\Controller;
use Symfony\Component\HttpFoundation\Request;

class OrderController extends \AppBundle\Controller\BaseController
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
		$where = 'a.id > 1';
		
		$this->data['filter_channel_order_no'] = $request->query->get('filter_channel_order_no','');
		$this->data['filter_plantform_order_no'] = $request->query->get('filter_plantform_order_no','');
		$this->data['filter_merchant_order_no'] = $request->query->get('filter_merchant_order_no','');
		
		$this->data['pager'] = $this->pager($request,'Aorder',$where,'','',20);
		
		foreach($this->data['pager']['data'] as &$order)
		{
			$channel = $this->db('Channel')->find($order['channel_id']);
			$merchant = $this->db('Merchant')->find($order['merchant_id']);
			
			$order['channel'] = $channel;
			$order['merchant'] = $merchant;
			
			/*
			$order['channel_data'] = ['status'=>'-'];
			if(strlen($order['channel_api_result']) > 30)
			{
				$order['channel_data'] = json_decode($order['channel_api_result'],true);
			}
			*/
		}
		
        return $this->render('FrontBundle:Order:index.html.twig',$this->data);
    }
}
