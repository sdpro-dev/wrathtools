<?php
/*
 * WrathTools by SDPRO DEV
 * @author Christopher Ciampoli
 *
 */
use Symfony\Component\Routing;
use Calendar\Controller\LeapYearController;

$routes = new Routing\RouteCollection();
$routes->add('leap_year', new Routing\Route('/is_leap_year/{year}', [
    'year' => null,
    '_controller' => [new LeapYearController(), 'index'],
]));

$routes->add('caps', new Routing\Route('/cap_it/{word}', [
    'word' => null,
    '_controller' => [new \Calendar\Controller\CapsController(), 'index'],
]));


return $routes;