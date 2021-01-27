<?php
/**
 * WrathTools by SDPRO DEV
 * @author Christopher Ciampoli
 */
namespace Wrath\View;

use Symfony\Component\HttpFoundation\Response;

/** @var Response $response */
$response->setContent('Goodbye!');
$response->send();