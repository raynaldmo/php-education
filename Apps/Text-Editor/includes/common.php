<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 1/15/15
 * Time: 7:51 PM
 */

define( "PATH_TO_FILES", "/home/raynald/sandbox" );

// Reusable function to redirect user to desired page
function redirect_user ($page = 'index.php', $query_string='') {

  // Start defining the URL...
  // URL is http:// plus the host name plus the current directory:
  $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);

  // Remove any trailing slashes:
  $url = rtrim($url, '/\\');

  $url .= '/' . $page;

  if($query_string) {
    $url .= ('?' . $query_string);
  }

  // Redirect the user:
  header("Location: $url");
  exit(); // quit calling script

}