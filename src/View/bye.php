<?php
/**
 * WrathTools by SDPRO DEV
 * @author Christopher Ciampoli
 */
namespace View;

use Symfony\Component\HttpFoundation\Response;

$response = new Response();
$response->setContent('Goodbye!');
$response->send();