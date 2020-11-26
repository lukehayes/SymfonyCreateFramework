<?php

use Symfony\Component\Routing;

$routes = new RouteCollection();

$routes->add('home', new Route('/'), [] );
$routes->add('hello', new Route('/hello/{name}'), ['name' => 'World'] );
$routes->add('bye', new Route('/bye'));

return $routes;
