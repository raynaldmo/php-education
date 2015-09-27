<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Single and Double Quotes</title>
  </head>
  <body>
    <h3>Single and Double Quotes</h3>
    <?php
        $var = 'test';
        echo "var is equal to $var (double quotes)<br>";
        echo 'var is equal to $var (single quotes)<br>';
        echo "\$var is equal to $var (double quotes, escaped dollar sign)<br>";
        echo '\$var is equal to $var (single quotes, escaped dollar sign)<br>';
    ?>
  </body>
</html>

