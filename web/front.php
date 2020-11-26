<?php
require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;

$request = Request::createFromGlobals();
$routes = include __DIR__ . "../src/app.php";

$context = new RequestContext();
$context->fromRequest($request);
$matcher = new UrlMatcher($routes, $context);

$attributes = $matcher->match($request->getPathInfo());

dump($attributes);
dump($matcher->match('/byea'));

//if(isset($map[$path])) {
    //ob_start();
    //extract($request->query->all(), EXTR_SKIP);
    //include sprintf(__DIR__ . '/../src/pages/%s.php', $map[$path]);
    //$response = new Response(ob_get_clean());

//}else
//{
    //$response = new Response("Not Found", 404);
//}

//$response->send();
