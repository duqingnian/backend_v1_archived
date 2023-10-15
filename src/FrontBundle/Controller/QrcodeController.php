<?php

namespace FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

class QrcodeController extends \AppBundle\Controller\BaseController 
{
	public function generateAction(Request $request)
	{
		$data = $request->query->get("data","");
		
		if('' == $data)
		{
			$this->e('data is missing');
		}
		if('otpauth' != substr($data,0,7))
		{
			$this->e('data format error!');
		}
		$data = urldecode($data);
		
		include $this->root_path().'/lib/phpqrcode/qrlib.php';
		$svg = \QRcode::svg($data);
		
		echo $svg;
		exit();
	}
}

