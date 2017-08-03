<?php
$name = $_POST['name'] ?: 'guest';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Null coalesce operator</title>
</head>
<body>
<p>Hello, <?= $name; ?></p>
</body>
</html>
