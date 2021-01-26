<?php
use Symfony\Component\HttpFoundation\Request;

$request = new Request();
$name = $request->get('name', 'World') ?>
    Hello <?= htmlspecialchars(isset($name)
        ? $name
        : 'World',
        ENT_QUOTES)
    ?>
