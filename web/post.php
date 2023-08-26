<?php
die();
function http($url, $data = null) 
{
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

$data = [
	'merchantId'=>'d8fe93b103f04c6e84719ce552bd8c7a',
	'country'=>'2',
	'orderNo'=>'test001',
	'amount'=>'450',
	'name'=>'test_user_001',
	'notifyUrl'=>'http://backend.wuziceshi.xyz/test.php',
	'sign'=>'h7fFUPZngcOumqi4/zn5pU/bi2I=',
];

$res = http('https://api.stabpay.com/payment/createOrder',$data);
print_r($res);
die();



