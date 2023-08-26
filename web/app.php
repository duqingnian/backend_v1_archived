<?php
header("Content-type: text/html; charset=utf-8");

define(DEBUG,true);

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
