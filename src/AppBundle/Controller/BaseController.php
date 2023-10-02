<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BaseController extends Controller
{
	protected $title = '';
	protected $http_url = '';
	protected $data = [];

	public function __construct()
	{
		$path = realpath(__FILE__);
		$path = substr($path,0,strpos($path,'src'));
		$app_json_file = $path.'diff/app.json';
		if(file_exists($app_json_file))
		{
			$app_json = file_get_contents($app_json_file);
			$app = json_decode($app_json);
			
			$this->title = $app->title;
			$this->http_url = $app->http_url;
		}
	}

    protected function root_path()
    {
        $rp = $this->get('kernel')->getRootDir();
        return realpath($rp.'/../');
    }
    protected function upload_path()
    {
        $rp = $this->get('kernel')->getRootDir();
        return realpath($rp.'/../web/uploads/');
    }
    protected function var_path()
    {
        $rp = $this->get('kernel')->getRootDir();
        return realpath($rp.'/../var/');
    }
    protected function db($name,$conn='')
    {
        $name = ucfirst($name);
		if('' == $conn)
		{
			$conn = 'default';
			$bundle = 'AppBundle';
		}
		else
		{
			$conn = 'pad';
			$bundle = 'PadBundle';
		}
		return $this->em()->getRepository($bundle.':'.$name);
    }
    protected function uid()
    {
        return $this->user()->getId();
    }
    protected function em($name='')
    {
		if(''==$name)
		{
			$name = 'default';
		}
        return $this->getDoctrine()->getManager($name);
    }
    protected function save($model,$conn='')
    {
        $em = $this->em($conn);
        $em->persist($model);
        $em->flush();
    }
    protected function update($conn='')
    {
        $this->em($conn)->flush();
    }
	protected function _sum($conn,$model,$column,$where="")
	{
		return $this->sum($model,$column,$where,$conn);
	}
    protected function sum($model,$column,$where="",$conn='')
    {
        $model = ucfirst($model);
		if('' == $conn)
		{
			$conn = 'default';
			$bundle = 'AppBundle';
		}
		else
		{
			$conn = 'pad';
			$bundle = 'PadBundle';
		}
        $total = $this->em($conn)->createQuery("select sum(a.".$column.") as s from ".$bundle.":".$model." a where ".$where)->getSingleScalarResult();
        return $total;
    }
    protected function count($model,$where="",$conn='')
    {
        $model = ucfirst($model);
		if('' == $conn)
		{
			$conn = 'default';
			$bundle = 'AppBundle';
		}
		else
		{
			$conn = 'pad';
			$bundle = 'PadBundle';
		}
        $count = $this->em($conn)->createQuery("select count(a.id) from ".$bundle.":".$model." a where ".$where)->getSingleScalarResult();
        return $count;
    }
    protected function getReadableBytes($bytes, $precision=2)
    {
        $suffix	= array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
        $total	= count($suffix);

        for ($i = 0; $bytes > 1024 && $i < $total; $i++)
            $bytes /= 1024;

        return number_format($bytes, $precision) . ' ' . $suffix[$i];
    }
    public function pager($request,$model='',$where='',$order='',$groupby='',$prepage=25,$conn='',$req = false)
    {
		if('' == $conn)
		{
			$conn = 'default';
			$bundle = 'AppBundle';
		}
		else
		{
			$conn = 'pad';
			$bundle = 'PadBundle';
		}
		
        $model = ucfirst($model);
		
		if('' != $where)
		{
		$where = ltrim($where);
		$where = ' where '.$where;
        $where = str_replace('where where','where',$where);
		}
        if($order != ''){
			$order = str_replace('order by','',$order);
            $order = ' order by '.$order;
        }else{
            $order=' order by a.id DESC';
        }

        if($groupby!=''){
			$groupby = str_replace('group by','',$groupby);
            $groupby = ' group by '.$groupby;
        }

        $page['page']=$request->query->get('page',1);
		if($req)
		{
			$page['page']=$request->request->get('page',1); 
		}
        if(!is_numeric($page['page']) || $page['page'] <= 0)
        {
            $page['page'] = 1;
        }
        $page['prepage']=$prepage;

        $em = $this->getDoctrine()->getManager($conn);
		
        $page['prepage'] = $page['prepage'];
        $poffset = 3;
		
        $page['total'] = $em->createQuery("select count(a.id) as c from ".$bundle.":".$model." a ".$where.' '.$groupby)->getSingleScalarResult();
		
        $page['pages'] = ceil($page['total']/$page['prepage']);
        if($page['pages'] < 1){
            $page['pages'] = 1;
        }
        
        if($page['page'] >= $page['pages']){
            $page['page'] = $page['pages'];
        }

        $page['min'] = $page['page']-$poffset > 1 ? $page['page']-$poffset : 1;
        $page['max'] = $page['page']+$poffset < $page['pages'] ? $page['page']+$poffset : $page['pages'];
        if($page['max'] < $page['min']){
            $page['max'] = $page['min'];
        }
        $page['prev'] = $page['page'] - 1 > 0 ? $page['page'] - 1 : 1;
        $page['next'] = $page['page'] + 1 < $page['pages'] ? $page['page'] + 1 : $page['pages'];
        //print_r($page);die();
        $limit = ($page['page'] -1)*$page['prepage'];

        $columns = $this->columns($model);
		$sql = "SELECT ".$columns." from ".$bundle.":".$model." a ".$where.' '.$groupby.' '.$order;
        //echo '$limit='.$limit;die();
        //echo $sql;die();
		$items = $em->createQuery($sql)->setFirstResult($limit)->setMaxResults($page['prepage'])->getResult();
        $page_range = [];
        for($i=$page['min'];$i<=$page['max'];$i++)
        {
            $page_range[] = $i;
        }
        
        $page['page'] = (int)$page['page'];
        $page['total'] = (int)$page['total'];
        
        $data = array('pager'=>$page,'data'=>$items,'page_range'=>$page_range,'sql'=>'');
        return $data;
    }
	
	protected function findAll($table,$where='',$orderby='')
	{
		return $this->fetch('',$table,$where,$orderby);
	}
	
	protected function find($table,$id)
	{
		$row = $this->em()->createQuery("SELECT ".$this->columns($table)." from AppBundle:".$table." a where a.id=".$id)->setFirstResult(0)->setMaxResults(1)->getResult();
		if(count($row) > 0)
		{
			return $row[0];
		}
		return [];
	}

    protected function fetch($cols='',$model='',$where="",$orderby='order by a.id desc',$groupby='')
	{
        $model = ucfirst($model);
		
		if($cols == '')
		{
			$columns = $this->columns($model);
		}
		else
		{
			$columns = $cols;
		}
		if('' == $orderby)
		{
			$orderby = 'order by a.id desc';
		}
        else
        {
            $orderby = str_replace('order by','',$orderby);
            $orderby = ' order by '.$orderby;
        }
        if(strlen($where)>0){
			$where = str_replace('where','',$where);
            $where = ' where '.$where;
        }
		$sql = "SELECT ".$columns." from AppBundle:".$model." a ".$where." ".$groupby.' '.$orderby;
		return $this->em()->createQuery($sql)->getResult();
    }

    protected function columns($model)
    {
        $model = ucfirst($model); 
        $_columns = array(
			'User'=>'a.id',
			'Channel'=>'a.id,a.name',
			'PayinOrder'=>'a.id,a.shanghu_id,a.channel_id,a.amount,a.channel_order_no,a.shanghu_order_no,a.plantform_order_no,a.order_status,a.payin_pct,a.payin_sigle_fee,a.fee,a.order_type,a.created_at',
			'PayoutOrder'=>'a.id,a.shanghu_id,a.channel_id,a.amount,a.channel_order_no,a.shanghu_order_no,a.plantform_order_no,a.order_status,a.payout_pct,a.payout_sigle_fee,a.fee,a.order_type,a.created_at',
        );
        return $_columns[$model];
    }
    protected function user(){
        return $this->getUser();
    }
	
	function http_post_json($url, $jsonStr)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonStr);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json; charset=utf-8','Content-Length: ' . strlen($jsonStr)));
		$response = curl_exec($ch);
		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);
	 
		return array($httpCode, $response);
	}
    function http($url, $data = null) {
        $curl = curl_init ();
        curl_setopt ( $curl, CURLOPT_URL, $url );
        curl_setopt ( $curl, CURLOPT_SSL_VERIFYPEER, FALSE );
        curl_setopt ( $curl, CURLOPT_SSL_VERIFYHOST, FALSE );
        if (! empty ( $data )) {
            curl_setopt ( $curl, CURLOPT_POST, 1 );
            curl_setopt ( $curl, CURLOPT_POSTFIELDS, $data );
        }
        curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );
        $output = curl_exec ( $curl );
        curl_close ( $curl );
        return $output;
    }
    
    //加密解密
    function authcode($string, $operation = 'ENCODE', $key = '', $expiry = 0) {
        if($operation == 'DECODE') {
            $string = str_replace('_','+',$string);
            $string = str_replace('-','/',$string);
        }
        $ckey_length = 4;
        $key = 'DQN_577_WX_2046';
        $keya = md5(substr($key, 0, 16));
        $keyb = md5(substr($key, 16, 16));
        $keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length): substr(md5(microtime()), -$ckey_length)) : '';

        $cryptkey = $keya.md5($keya.$keyc);
        $key_length = strlen($cryptkey);

        $string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0).substr(md5($string.$keyb), 0, 16).$string;
        $string_length = strlen($string);

        $result = '';
        $box = range(0, 255);

        $rndkey = array();
        for($i = 0; $i <= 255; $i++) {
            $rndkey[$i] = ord($cryptkey[$i % $key_length]);
        }

        for($j = $i = 0; $i < 256; $i++) {
            $j = ($j + $box[$i] + $rndkey[$i]) % 256;
            $tmp = $box[$i];
            $box[$i] = $box[$j];
            $box[$j] = $tmp;
        }

        for($a = $j = $i = 0; $i < $string_length; $i++) {
            $a = ($a + 1) % 256;
            $j = ($j + $box[$a]) % 256;
            $tmp = $box[$a];
            $box[$a] = $box[$j];
            $box[$j] = $tmp;
            $result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
        }

        if($operation == 'DECODE') {
            if((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26).$keyb), 0, 16)) {
                return substr($result, 26);
            } else {
                return '';
            }
        } else {
            $str = $keyc.str_replace('=', '', base64_encode($result));
            $str = str_replace('+','_',$str);
            $str = str_replace('/','-',$str);
            return $str;
        }
    }
    public function getIp()
    {
        if (isset($_SERVER)) {
            if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $realip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
                $realip = $_SERVER['HTTP_CLIENT_IP'];
            } else {
                $realip = $_SERVER['REMOTE_ADDR'];
            }
        } else {
            if (getenv("HTTP_X_FORWARDED_FOR")) {
                $realip = getenv( "HTTP_X_FORWARDED_FOR");
            } elseif (getenv("HTTP_CLIENT_IP")) {
                $realip = getenv("HTTP_CLIENT_IP");
            } else {
                $realip = getenv("REMOTE_ADDR");
            }
        }
        return $realip;
    }
    //驗證csrf_token
    protected function _check_csrf_token($csrf_token)
    {
        $csrfToken = $this->has('security.csrf.token_manager')? $this->get('security.csrf.token_manager')->getToken('authenticate')->getValue(): null;
        if($csrf_token != $csrfToken)
        {
            return 'csrfToken錯誤';
        }
        return 'PASS';
    }
    protected function show($msg,$die=true){
        header("Content-type: text/html; charset=utf-8");
        echo '<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">';
		echo $msg.','.date('Y-m-d H:i:s');
        $die && exit();
    }
    
    protected function e($msg,$code=-1)
    {
        echo json_encode(['code'=>$code,'msg'=>$msg]);
        exit();
    }
    
    protected function response($K,$D)
    {
        echo json_encode(['code'=>0,$K=>$D]);
        exit();
    }

    protected function random($len=4)
    {
        $str = '';
        for($i=0;$i<$len;$i++){
            $str .= chr(97+rand(1,25));
        }
        return $str;
    }

    protected function go($url)
    {
        header("Location:".$url);
        die();
    }
	
	//生成随机数
	protected function _generate_random($len=4)
	{
		$random = md5(microtime().rand(1111,9999));
		return substr($random,0,$len);
	}
    
    protected function console($arr,$k="data")
    {
        echo json_encode(['code'=>0,$k=>$arr]);
        exit();
    }
    
    protected function succ($str='操作成功')
    {
        echo json_encode(['code'=>0,'msg'=>$str]);
        exit();
    }
    
    protected function is_ssl() 
    {
      if(isset($_SERVER['HTTPS']) && ('1' == $_SERVER['HTTPS'] || 'on' == strtolower($_SERVER['HTTPS']))){
            return true;
      }else if(isset($_SERVER['SERVER_PORT']) && ('443' == $_SERVER['SERVER_PORT'] )) {
            return true;
      }
      return false;

    }
    
    protected function format($file,$format=200)
    {
        $lastIndexOf = strripos($file,'.');
        return substr($file,0,$lastIndexOf).'.'.$format.substr($file,$lastIndexOf);
    }
    
    protected function get_url(){
        $url = $this->is_ssl() ? 'https' : 'http';
        $url .= '://'.$_SERVER["SERVER_NAME"];
        return $url;
    }
	
	//国家列表 印度，巴西，墨西哥，印尼，尼日利亚，越南，日本
	public function get_countries()
	{
		return [
			'brazil'=>['name'=>'巴西','currency'=>'BRL'],
			'thailand'=>['name'=>'泰国','currency'=>'THB'],
			'vietnam'=>['name'=>'越南','currency'=>'VND'],
			'india'=>['name'=>'印度','currency'=>'RS'],
			'mexico'=>['name'=>'墨西哥','currency'=>'MXN'],
			'indonesia'=>['name'=>'印尼','currency'=>'IDR'],
			'nigeria'=>['name'=>'尼日利亚','currency'=>'NGN'],
			'japan'=>['name'=>'日本','currency'=>'YEN'],
		];
	}
	
	//创建请求常量
	public function get_pay_consts($type='',$bundle='')
	{
		if('PAYIN' == $type)
		{
			return $this->get_payin_consts($bundle);
		}
		else if('PAYOUT' == $type)
		{
			return $this->get_payout_consts($bundle);
		}
		else{}
	}
	
	public function get_payin_consts($bundle='')
	{
		$CONSTS = ['REQUEST'=>[],'RESULT'=>[],'NOTIFY'=>[]];
		$CONSTS['REQUEST'] = [
			'TYPE'=>'请求类型',
			'HEADER'=>'头信息',
			'URL'=>'接口地址',
			'APPID'=>'appid',
			'DEVICE_IP_V4'=>'设备ipv4',
			'DEVICE_NAME'=>'设备名称',
			'UID'=>'商家下单用户的唯一身份标识',
			'ORDER_NO'=>'商户订单号',
			'CURRENCY'=>'金额币种',
			'AMOUNT'=>'订单金额',
			'NOTIFY_URL'=>'异步通知地址',
			'RETURN_URL'=>'同步通知地址',
			'ATTACH_DATA'=>'附加信息',
			'SIGN'=>'签名',
		];
		$CONSTS['RESULT'] = [
			'CODE'=>'响应状态码',
			'ORDER_STATUS'=>'订单状态',
			'ORDER_SUCC_STATUS'=>'订单成功状态',
			'CHANNEL_ORDER_NO'=>'通道订单号',
			'SHANGHU_ORDER_NO'=>'商户订单号',
			'CURRENCY'=>'金额币种',
			'AMOUNT'=>'订单金额',
			'CREATETIME'=>'创建时间',
			'UPDATETIME'=>'更新时间',
			'ERROR_MSG'=>'订单异常信息',
			'URL'=>'订单跳转地址',
			'QRCODE'=>'二维码内容',
			'SIGN'=>'签名',
			'MSG'=>'创建结果消息',
			'ATTACH_DATA'=>'附加信息',
		];
		$CONSTS['NOTIFY'] = [
			'ORDER_STATUS'=>'订单状态',
			'ORDER_SUCC_STATUS'=>'订单成功状态',
			'CHANNEL_ORDER_NO'=>'通道订单号',
			'SHANGHU_ORDER_NO'=>'商户订单号',
			'CURRENCY'=>'金额币种',
			'AMOUNT'=>'订单金额',
			'CREATETIME'=>'创建时间',
			'UPDATETIME'=>'更新时间',
			'ERROR_MSG'=>'订单异常信息',
			'ATTACH_DATA'=>'附加信息',
			'SIGN'=>'签名',
		];

		return $CONSTS[$bundle];
	}
	public function get_payout_consts($bundle='')
	{
		$CONSTS = ['REQUEST'=>[],'RESULT'=>[],'NOTIFY'=>[]];
		$CONSTS['REQUEST'] = [
			'TYPE'=>'请求类型',
			'HEADER'=>'头信息',
			'URL'=>'接口地址',
			'APPID'=>'appid',
			'DEVICE_IP_V4'=>'设备ipv4',
			'DEVICE_NAME'=>'设备名称',
			'UID'=>'商家下单用户的唯一身份标识',
			'ORDER_NO'=>'商户订单号',
			'CURRENCY'=>'金额币种',
			'AMOUNT'=>'订单金额',
			'NOTIFY_URL'=>'异步通知地址',
			'ACC_TYPE'=>'账号(卡)类型',
			'ACCOUNT'=>'账号(卡号)',
			'PHONE'=>'手机号',
			'EMAIL'=>'email',
			'CPF_NO'=>'CPF号码',
			'ACC_OWNER_NAME'=>'账号(持卡人)姓名',
			'ATTACH_DATA'=>'附加信息',
			'SIGN'=>'签名',
		];
		$CONSTS['RESULT'] = [
			'CODE'=>'响应状态码',
			'ORDER_STATUS'=>'订单状态',
			'ORDER_SUCC_STATUS'=>'订单成功状态',
			'CHANNEL_ORDER_NO'=>'通道订单号',
			'SHANGHU_ORDER_NO'=>'商户订单号',
			'CURRENCY'=>'金额币种',
			'AMOUNT'=>'订单金额',
			'CREATETIME'=>'创建时间',
			'UPDATETIME'=>'更新时间',
			'ERROR_MSG'=>'订单异常信息',
			'MSG'=>'创建结果消息',
			'ATTACH_DATA'=>'附加信息',
			'SIGN'=>'签名',
		];
		$CONSTS['NOTIFY'] = [
			'ORDER_STATUS'=>'订单状态',
			'ORDER_SUCC_STATUS'=>'订单成功状态',
			'CHANNEL_ORDER_NO'=>'通道订单号',
			'SHANGHU_ORDER_NO'=>'商户订单号',
			'CURRENCY'=>'金额币种',
			'AMOUNT'=>'订单金额',
			'CREATETIME'=>'创建时间',
			'UPDATETIME'=>'更新时间',
			'ERROR_MSG'=>'订单异常信息',
			'ATTACH_DATA'=>'附加信息',
			'RECEIPT_URL'=>'凭证信息',
			'SIGN'=>'签名',
		];

		return $CONSTS[$bundle];
	}
	public function GetId($request_token)
	{
		if(strlen($request_token) < 10)
		{
			$this->e('request_token is missing');
		}
		$id = $this->authcode($request_token,'DECODE');
		if('ID' != substr($id,0,2))
		{
			$this->e('bad request_token!');
		}
		$id = substr($id,2);
		if(!is_numeric($id))
		{
			$this->e('request_token err!'.$id);
		}
		return $id;
	}
	public function get_sign_types()
	{
		return [
			['key'=>'md5','text'=>'MD5'],
			['key'=>'sha256','text'=>'SHA256'],
			['key'=>'hmacsha1','text'=>'HmacSHA1'],
		];
	}
}


