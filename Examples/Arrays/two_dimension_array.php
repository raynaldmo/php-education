<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Looping Through a Two-Dimensional Array</title>
  </head>
  <body>

  </body>
</html>
<h3>Looping Through a Two-Dimensional Array</h3>

<?php

  $myBooks = array(
    array(
      "title" => "The Grapes of Wrath",
      "author" => "John Steinbeck",
      "pubYear" => 1939
    ),
    array(
      "title" => "The Trial",
      "author" => "Franz Kafka",
      "pubYear" => 1925
    ),
    array(
      "title" => "The Hobbit",
      "author" => "J. R. R. Tolkien",
      "pubYear" => 1937
    ),
    array(
      "title" => "A Tale of Two Cities",
      "author" => "Charles Dickens",
      "pubYear" => 1859
    ),
  );

  $bookNum = 0;

  foreach ( $myBooks as $book ) {

    $bookNum++;
    echo "<p style='font-size: larger';><em>Book #$bookNum:</em></p>";
    echo "<dl>";

    foreach ( $book as $key => $value ) {
      echo "<dt>$key</dt><dd>$value</dd>";
    }

    echo "</dl>";
  }

?>
