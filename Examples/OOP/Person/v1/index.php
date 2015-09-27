<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Test Page for Person Class</title>
  </head>
  <body>
    <h3>Test Page for Person Class</h3>
    <?php

      spl_autoload_register(function($class) {
        require $class . '.php';
      });

      // Instantiate some objects
      $p1 = new Person('Raynald', 55);
      $p2 = new Person('Jacqueline', 50);

      echo '<p><b>Person Info</b></p>';

      // here we instantiate $writer object standalone
      // in v2 we pass $writer object to Person constructor

      $writer = new PersonWriter();
      echo 'Name : ' . $writer->writeName($p1) .
        ' Age : ' . $writer->writeAge($p1) . '<br>';

      echo 'Name : ' . $writer->writeName($p2) .
        ' Age : ' . $writer->writeAge($p2) . '<br>';
    ?>
  </body>
</html>

