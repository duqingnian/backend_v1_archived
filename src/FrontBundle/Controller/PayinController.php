<?php

namespace FrontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

class PayinController extends \AppBundle\Controller\BaseController 
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
	
	//回调
	//$order_no 商户生成的订单
	public function notifyAction($request,$order_no)
	{
		if('' == $order_no)
		{
			$this->e('订单号丢失');
		}
		$data = file_get_contents('php://input');
		
		if(strlen($data) < 10)
		{
			$this->e('no data post to api!',6001);
		}
		$arr = json_decode($data,true);
		if(!is_array($arr) || count($arr) < 2)
		{
			$this->e('invalidate parameters!',6002);
		}
		
		//前置检查参数
		if(!array_key_exists('shanghu_order_no',$arr)) $this->e('shanghu_order_no is missing');
		if(!array_key_exists('order_status',$arr)) $this->e('order_status is missing');
		if(!array_key_exists('currency',$arr)) $this->e('currency is missing');
		if(!array_key_exists('amount',$arr)) $this->e('amount is missing');
		if(!array_key_exists('createtime',$arr)) $this->e('createtime is missing');
		if(!array_key_exists('updatetime',$arr)) $this->e('updatetime is missing');
		if(!array_key_exists('error_msg',$arr)) $this->e('error_msg is missing');
		if(!array_key_exists('attach_data',$arr)) $this->e('attach_data is missing');
		if(!array_key_exists('sign',$arr)) $this->e('sign is missing');
		
		if($arr['shanghu_order_no'] != $order_no)
		{
			$this->e('订单号不匹配');
		}
		
		$order = $this->db('PayinOrder')->findOneBy(['shanghu_order_no'=>$order_no]);
		if(!$order)
		{
			$this->e('订单不存在');
		}
		
		//校验签名
		$shanghu = $this->db('Shanghu')->findOneBy(['uid'=>$order->getShanghuId()]);
		if(!$shanghu)
		{
			$this->e('账户账号未创建，无法创建代收订单');
		}
		if(1 != $shanghu->getIsTest())
		{
			$this->e('非测试账号无法使用此功能');
		}
		$config = $this->db('ShanghuConfig')->findOneBy(['master_id'=>$shanghu->getId()]);
		if(!$config)
		{
			$this->e('商户未初始化配置信息，无法模拟状态');
		}
		$payin_sign_method = $config->getPayinSignMethod();
		//生成签名
		if('md5' == $payin_sign_method)
		{
			$SignGenerator = new \AppBundle\Utils\SignGeneratorMd5();
		}
		else if('sha256' == $payin_sign_method)
		{
			$SignGenerator = new \AppBundle\Utils\SignGeneratorSha256();
		}
		else
		{
			$this->e("未配置代收签名生成方式，无法生成代收订单");
		}
		$sign = $SignGenerator->generate($post_parameters,$payin_secret);
		if($sign != $arr['sign'])
		{
			$this->e('sign not match');
		}
		echo 'success';
		exit();
	}
	
	public function _create($request)
	{
		$request_token = $request->request->get('request_token','');
		$amount = $request->request->get('amount',0);
		
		//前置检查
		if('' == $request_token)
		{
			$this->e('request_token is missing.');
		}
		$uid = $this->GetId($request_token);
		
		if($amount < 1 || $amount > 99999)
		{
			$this->e('金额不能小于1，不能大于99,999');
		}
		//查询代收参数
		$shanghu = $this->db('Shanghu')->findOneBy(['uid'=>$uid]);
		if(!$shanghu)
		{
			$this->e('账户账号未创建，无法创建代收订单,uid='.$uid);
		}
		$config = $this->db('ShanghuConfig')->findOneBy(['master_id'=>$shanghu->getId()]);
		if(!$config)
		{
			$this->e('商户未初始化配置信息，无法创建订单');
		}
		
		$payin_appid  = $config->getPayinAppid();
		$payin_secret = $config->getPayinSecret();
		if('' == $payin_appid){$this->e('代收appid为空，无法创建');}
		if('' == $payin_secret){$this->e('代收密钥为空，无法创建');}
		
		//拼装参数递交给支付接口
		$order_no = $this->generate_order_no($payin_appid,$payin_secret);
		$notify_url = $this->http_url.'/pip/payin.notify/'.$order_no;
		if(1 == $shanghu->getIsTest())
		{
			$notify_url = $this->http_url.'/test/payin.notify/'.$order_no;
		}
		$post_parameters = [
			'type'=>'HAND',
			'appid'=>$payin_appid,
			'amount'=>$amount,
			'order_no'=>$order_no,
			'notify_url'=>$notify_url,
		];
		
		//获取签名生成方式
		$payin_sign_method = $config->getPayinSignMethod();
		
		//生成签名
		if('md5' == $payin_sign_method)
		{
			$SignGenerator = new \AppBundle\Utils\SignGeneratorMd5();
		}
		else if('sha256' == $payin_sign_method)
		{
			$SignGenerator = new \AppBundle\Utils\SignGeneratorSha256();
		}
		else
		{
			$this->e("未配置代收签名生成方式，无法生成代收订单");
		}

		$sign = $SignGenerator->generate($post_parameters,$payin_secret);
		$post_parameters['sign'] = $sign;
		
		$ret = $this->http('https://pay.baishipay.com/api/payment/order/create',$post_parameters);
		
		if('' == $ret)
		{
			$this->e('An error occurred, empty payment result!');
		}
		
		$data = json_decode($ret,true);
		if(count($data) < 2 || !array_key_exists('code',$data))
		{
			echo json_encode(['code'=>-1,'msg'=>'An error occurred, invalidate result dataArray!','ret'=>$ret]);
			die();
		}
		
		if(0 != $data['code'])
		{
			$this->e($data['msg']);
		}
		
		if(!array_key_exists('shanghu_order_no',$data))
		{
			echo json_encode(['code'=>-1,'msg'=>'An error occurred, shanghu_order_no not in dataArray!','ret'=>$ret]);
			die();
		}
		
		$order = $this->db('PayinOrder')->findOneBy(['shanghu_order_no'=>$data['shanghu_order_no']]);
		if(!$order)
		{
			$this->e('An error occurred while reading the payin order:'.$data['shanghu_order_no']);
		}
		$data['qrcode_img_src'] = 'https://www.baishipay.com/static/qrcode.png';
		if(1 == $shanghu->getIsTest())
		{
			//do nothing
		}
		else
		{
			$qrcode_content = '';
			if(array_key_exists('qrcode',$data) && '' != $data['qrcode'])
			{
				$qrcode_content = $data['qrcode'];
			}
			else
			{
				if(array_key_exists('jump_url',$data) && '' != $data['jump_url'])
				{
					$qrcode_content = $data['jump_url'];
				}
			}
			
			if('' != $qrcode_content)
			{
				//生成二维码
				$path = $this->root_path().'/web/qrcodes/'.date('Ymd');
				if(!file_exists($path))
				{
					mkdir($path,0777);
					file_put_contents($path.'/index.html',$path);
				}
				
				$qr_img_name = date('YmdHis').'-'.$order->getId().'-'.md5('DQN10985'.$data['shanghu_order_no'].microtime());
				$qr_img_name = substr($qr_img_name,0,12);
				
				$qcode = $path.'/'.$qr_img_name.'.png';
				if(!file_exists($qcode))
				{
					include $this->root_path().'/lib/phpqrcode/qrlib.php';
					$result = \QRcode::png($qrcode_content,$qcode);
				}
				$data['qrcode_img_src'] = 'https://www.baishipay.com/qrcodes/'.date('Ymd').'/'.$qr_img_name.'.png';
			}
			$order->setQrcodeSrc($data['qrcode_img_src']);
			$this->update();
			//$data['qrcode_img_src'] = '';
		}
		echo json_encode($data);
		exit();
	}
	
	private function generate_order_no($payin_appid,$payin_secret)
	{
		return date('Ymd').md5($payin_appid.$payin_secret.time());
	}

}


