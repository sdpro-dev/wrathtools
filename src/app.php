<?php
/**
 * WrathTools by SDPRO DEV
 * @author Christopher Ciampoli
 */
namespace Wrath;

use Symfony\Component\Routing;
use Wrath\Controller\LeapYearController;

$routes = new Routing\RouteCollection();
$routes->add('leap_year', new Routing\Route('/is_leap_year/{year}', [
    'year' => null,
    '_controller' => [new LeapYearController(), 'index'],
]));


return $routes;