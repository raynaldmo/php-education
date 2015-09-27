<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Error Handling</title>
</head>

  <body>
    <h3>Error Handling</h3>
    <?php include('error-handler.php');
      // Error message for live site or development
      define('LIVE', false);

      // Always log errors
      ini_set('log_errors', '1');

      // Choose error reporting level based on site status
      if (LIVE) {
        error_reporting(E_ALL & ~E_DEPRECATED);
        ini_set('display_errors', '0');
        ini_set('error_log', '');
        $dest = 3; // log to file

      } else {
        ini_set('display_errors', '1');
        error_reporting(E_ALL | E_STRICT);
        ini_set('error_log', 'syslog');
        $dest = 0; // log to /var/log/syslog
      }
      // error handler:
      set_error_handler ('my_error_handler');

      if ($dest == 0) {
        error_log("Test error message", $dest);
      } else {
        error_log("Test error message\n", $dest,
          '/var/tmp/error-handler-log.txt');
      }

      $var = 1/0;
    ?>
  </body>
</html>

