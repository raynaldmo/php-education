<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Reflection Class Example Usage</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <h3>Reflection Class Example Usage</h3>
    <?php
      require 'util.php';

      spl_autoload_register(function($class){
        require $class . '.php';
      });

      $prod_class = new ReflectionClass('CdProduct');
      // output of the following doesn't look very useful
      // Reflection::export($prod_class);

      // standard var_dump()
      $cd1 = new CdProduct('cd1', 'bob', 'bobbleson', 4,50);
      echo '<br><br><pre>' .
        var_dump($cd1) .
      '</pre>';

      print '<p><b>Class Info</b></p>';
      print nl2br(classData($prod_class));


    ?>

  </body>

</html>