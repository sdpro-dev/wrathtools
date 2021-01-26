<?php
use Symfony\Component\HttpFoundation\Response;

/** @var Response $response */
$response->setContent('Goodbye!');
$response->send();