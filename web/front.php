<?php
require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();
$request = Request::create('/hello?name=Luke');
$response = new Response();

$map = [
    '/hello' => '../hello.php',
    '/bye' => '../bye.php',
];

$path = $request->getPathInfo();

if(isset($map[$path])) {
    require $map[$path];
}else
{
    $response->setStatusCode(404);
    $response->setContent("$map[$path] Not Found.");
}

$response->send();
