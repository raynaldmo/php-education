<?php

function __autoload( $className ) {
  $className = str_replace ( "..", "", $className );
  require_once( "$className.class.php" );
}

$products = array(
1 => new Product( 1, "SuperWidget", 19.99 ),
2 => new Product( 2, "MegaWidget", 29.99 ),
3 => new Product( 3, "WonderWidget", 39.99 )
);