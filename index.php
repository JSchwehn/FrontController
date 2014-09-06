<?php
require_once 'Lib/Autoloader.php';

$autoloader = new SplClassLoader('FrontController');
$autoloader->register();

$request = \FrontController\HttpRequest::createFromGlobals();


$testRoute = new \FrontController\HttpRoute('/','IndexController','index');
$testRoute2 = new \FrontController\HttpRoute('/foo','IndexController','foo');
$router = new \FrontController\HttpRouter(array($testRoute, $testRoute2));
$dispatcher = new \FrontController\HttpDispatcher();
$front = new FrontController\Front($router, $dispatcher);
$front->run($request, new \FrontController\HttpResponse());