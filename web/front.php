<?php
require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;

$request = Request::createFromGlobals();

$routes = new RouteCollection();
$routes->add('home', new Route('/'), [] );
$routes->add('hello', new Route('/hello/{name}'), ['name' => 'World'] );
$routes->add('bye', new Route('/bye'));

$context = new RequestContext();
$context->fromRequest($request);
$matcher = new UrlMatcher($routes, $context);

$attributes = $matcher->match($request->getPathInfo());

var_dump($attributes);


if(isset($map[$path])) {
    ob_start();
    extract($request->query->all(), EXTR_SKIP);
    include sprintf(__DIR__ . '/../src/pages/%s.php', $map[$path]);
    $response = new Response(ob_get_clean());

}else
{
    $response = new Response("Not Found", 404);
}

$response->send();
