<?php

require_once('config.php');

$h1 = '<em>Welcome to ACME Widget Company</em>';
$h2 = 'Product List';
include 'header.html';

function displayProductList() {
  global $products;

  echo '<dl>';
  foreach ( $products as $product ) {
    echo '<dt>'.$product->getName().'</dt>';
    echo '<dd>$'.number_format( $product->getPrice(), 2 );

    // TODO : use http_build_query()
    echo '&nbsp;<a href="cart.php?action=addItem&amp;productId='
      .$product->getId().'">Add To Cart</a></dd>';
  }
  echo '</dl>';
}

displayProductList();

include 'show_cart.html';
include 'footer.html';


