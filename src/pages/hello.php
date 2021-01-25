<!-- example.com/src/pages/hello.php -->
<?php $name = $request->get('name', 'World') ?>
<script src="../../web/scripts/wrath.js"></script>
Hello <?= htmlspecialchars($name, ENT_QUOTES, 'UTF-8') ?>
<div id="react-app"></div>
