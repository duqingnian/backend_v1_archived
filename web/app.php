<?php
header("Content-type: text/html; charset=utf-8");
define(DEBUG,true);

$is_ssl = false;
if(isset($_SERVER['HTTPS']) && ('1' == $_SERVER['HTTPS'] || 'on' == strtolower($_SERVER['HTTPS'])))
{
	$is_ssl = true;
}
else if(isset($_SERVER['SERVER_PORT']) && ('443' == $_SERVER['SERVER_PORT'] ))
{
	$is_ssl = true;
}
else if(isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && ('https' == $_SERVER['HTTP_X_FORWARDED_PROTO'] ))
{
	$is_ssl = true;
}
else
{}

$server_name = 'www.'.$_SERVER['SERVER_NAME'];
if(!$is_ssl)
{
	header('location: https://'.$server_name);
	die();
}

use Symfony\Component\HttpFoundation\Request;
$loader = require __DIR__.'/../app/autoload.php';
include_once __DIR__.'/../var/bootstrap.php.cache';

if(DEBUG)
{
	$kernel = new AppKernel('prod', true);
	$kernel->loadClassCache();
}
else
{
	$kernel = new AppKernel('prod', false);
	$kernel->loadClassCache();
	$kernel = new AppCache($kernel);
	Request::enableHttpMethodParameterOverride();
}
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);

