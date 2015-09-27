<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Test Page for ShopProduct Class</title>
  </head>
  <body>
    <h3>Test Page for ShopProduct Class</h3>
    <?php

      spl_autoload_register(function($class) {
        require $class . '.php';
      });

      // Instantiate some objects
      $cd1 = new CdProduct('The Boss', 'Diana', 'Diana Ross', 9.99,
        '60 minutes');
      $book1 = new BookProduct('Black Genius','Dick', 'Dick Russell', 15.99,
        375);

      echo '<p><b>Summary Line</b></p>';
      echo $cd1->getSummaryLine() . '<br>';
      echo $book1->getSummaryLine() . '<br>';

      echo '<p><b>Summary Line (ShopProductWriter)</b></p>';
      $writer = new TextProductWriter();
      $writer->addProduct($cd1);
      $writer->addProduct($book1);

      echo nl2br($writer->write());

    ?>
  </body>
</html>

