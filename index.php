<?php
require_once __DIR__.'/init.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$request = Request::createFromGlobals();
$response = new Response();

$map = [
    '/hello' => 'hello.php',
    '/bye' => 'bye.php',
];


if(isset($map[$path])) {
    require $map[$path];
}else
{
    $response->setStatusCode(404);
    $response->setContent("$map[$path] Not Found.");
}

//$response->send();
