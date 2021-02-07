<?php
/**
 * WrathTools by SDPRO DEV
 * @author Christopher Ciampoli
 */
namespace Calendar\View;

use Symfony\Component\HttpFoundation\Response;

/** @var Response $response */
$response->setContent('Goodbye!');
$response->send();