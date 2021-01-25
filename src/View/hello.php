<!-- example.com/src/View/hello.php -->
<?php
    $name = $request->get('name', 'World') ?>
    Hello <?= htmlspecialchars(isset($name)
        ? $name
        : 'World',
        ENT_QUOTES, 'UTF-8')
    ?>
