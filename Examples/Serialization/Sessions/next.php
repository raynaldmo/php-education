<?php
include_once "Log.php";
session_start();
?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Next Page</title>
  </head>
  <body>
    <h3>Next Page</h3>
    <?php
      // $logger is supposed to be automatically loaded but
      // this doesn't seem to happen!
      $now = strftime("%c");
      $logger->write("Viewed next page at $now");

      echo '<p>The log contains:</p>';
      echo nl2br($logger->read());
    ?>
  </body>
</html>

