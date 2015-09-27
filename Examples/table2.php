<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Basic Table Example #1</title>
  <style>
    table {
      border-collapse: collapse;
    }
  </style>
</head>
<body>
  <h3>Basic Table Example #1</h3>
  <?php
    $ages = array(
      'Person'  => "Age",
      'Fred'    => 35,
      'Barney'  => 30,
      'Tigger'  => 8,
      'Pooh'    => 40
    );

    $printRow = function($value, $key, $color) {
      echo "<tr><td bgcolor=\"{$color}\">{$key}</td>";
      echo "<td bgcolor=\"{$color}\">{$value}</td></tr>";
    };

    echo "<table border=1>";
    array_walk($ages, $printRow, "lightblue");
    echo "</table>";
  ?>
</body>
</html>





