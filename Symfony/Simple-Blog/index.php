<?php
// index.php -  Front controller
ini_set('display_errors', '1');


// load and initialize any global libraries
require_once 'model.php';
require_once 'controllers.php';

// route the request internally
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// $uri = '/' . basename($uri);

if ( '/' === $uri) {
  list_action();
}
elseif ( (strpos($uri, '/show') !== FALSE) && isset($_GET['id']) ) {
  show_action($_GET['id']);
}
else {
  header('HTTP/1.1 404 Not Found');
  echo '<html><body><h1>Page Not Found</h1></body></html>';
}
