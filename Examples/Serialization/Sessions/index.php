<?php
// include "Log.php"; // Log class

// This works!
function __autoload($class_name) {
  include "$class_name.php";
}

// Needed for sessions to work
session_start();
?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Object Serialization using PHP Sessions</title>
  </head>
  <body>
    <h3>Object Serialization using PHP Sessions</h3>
    <?php
      $now = strftime("%c");
      // Default session timeout is 1440 sec
      if (!isset($_SESSION['logger'])) {
        print "<p>Start new session</p>";
        echo '<p>Create session and persistent log object</p>';

        $logger = new Log('/tmp/persistent_log.txt');
        $_SESSION['logger'] = $logger;
        $logger->write("Created $now");

      } else {
        print "<p>Session is active</p>";
        $logger = new Log('/tmp/persistent_log.txt');
        $logger->write("Viewed home page $now");
        echo '<p>The log contains:</p>';
        echo nl2br($logger->read());
      }
    ?>

    <p><a href="next.php">Next Page</a>&nbsp;
        <a href="logout.php">Close Session</a>
    </p>
  </body>
</html>

