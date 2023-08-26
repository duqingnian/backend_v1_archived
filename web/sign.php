<?php
die();
/**
 * 自定义ascii排序 返回字符串
 * @param array $params
 * @return string
 */
function ascii_params($params = array())
{
    if (!empty($params)) {
        $p = ksort($params);
        if ($p) {
            $str = '';
            foreach ($params as $k => $val) {
                $str .= $k . '=' . $val . '&';
            }
            $strs = rtrim($str, '&');
            return $strs;
        }
    }
    return '参数错误';
}

/**
 * @brief 使用HMAC-SHA1算法生成oauth_signature签名值
 *
 * @param  $str   string 源串
 * @param $keystring 密钥
 *
 * @return string
 */
function getSignature($str, $key)
{
    $signature = "";
    if (function_exists('hash_hmac')) {
        $signature = base64_encode(hash_hmac("sha1", $str, $key, true));
    } else {
        $blocksize = 64;
        $hashfunc = 'sha1';
        if (strlen($key) > $blocksize) {
            $key = pack('H*', $hashfunc($key));
        }
        $key = str_pad($key, $blocksize, chr(0x00));
        $ipad = str_repeat(chr(0x36), $blocksize);
        $opad = str_repeat(chr(0x5c), $blocksize);
        $hmac = pack(
            'H*', $hashfunc(
                ($key ^ $opad) . pack(
                    'H*', $hashfunc(
                        ($key ^ $ipad) . $str
                    )
                )
            )
        );
        $signature = base64_encode($hmac);
    }
//    echo($signature);
    return $signature;
}

$key = "SMBF7WHE8R6F4A2NL3AVEGU9GPIM9NN3FDYW3MQOTC5CMWPRWVD1CRKO1ZZXV0XR";

$data = [
	'merchantId'=>'d8fe93b103f04c6e84719ce552bd8c7a',
	'country'=>'2',
	'orderNo'=>'test001',
	'amount'=>'450',
	'name'=>'test_user_001',
	'notifyUrl'=>'http://backend.wuziceshi.xyz/test.php',
];

$string = ascii_params($data);
$sign = getSignature($string, $key);
echo $sign;die();
