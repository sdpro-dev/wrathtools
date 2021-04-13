<?php
/*
 * WrathTools by SDPRO DEV
 * @author Christopher Ciampoli
 *
 */

use Controller\CapsController;
use Symfony\Component\Routing;
use Controller\LeapYearController;
use Symfony\Component\Routing\Route;

$routes = new Routing\RouteCollection();
$routes->add('leap_year', new Route('/is_leap_year/{year}', [
    'year' => null,
    '_controller' => [new LeapYearController(), 'index'],
]));

$routes->add('caps', new Route('/cap_it/{word}', [
    'word' => null,
    '_controller' => [new CapsController(), 'index'],
]));


return $routes;