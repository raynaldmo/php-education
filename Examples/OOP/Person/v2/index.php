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
      $p1 = new Person('Raynald', 55, new PersonWriter());
      $p2 = new Person('Jacqueline', 50 , new PersonWriter());

      echo '<p><b>Person Info</b></p>';

      // thanks to __call method in Person class, writeName() and
      // write Age methods are delegated to PersonClassWriter
      // this solution to me obscures things!
      echo 'Name : ' . $p1->writeName() .
        ' Age : ' . $p1->writeAge() . '<br>';

      echo 'Name : ' . $p2->writeName() .
        ' Age : ' . $p2->writeAge() . '<br>';
    ?>
  </body>
</html>

