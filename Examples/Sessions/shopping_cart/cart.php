<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 1/20/15
 * Time: 11:29 AM
 */

// Must come before session_start() or weird things happen!
require_once'config.php';

session_start();

$h1 = '';
$h2 = 'Your Shopping Cart';
require_once 'header.html';

//echo '<p>In cart.php</p>';
// var_dump($_GET);
// print_r($_GET);
// var_dump($_REQUEST);
// print_r($_REQUEST);
// print_r($_GET);

if ( !isset( $_SESSION["cart"] ) ) $_SESSION["cart"] = array();

if ( isset( $_GET["action"] ) and $_GET["action"] == "addItem" ) {
  addItem();
} elseif ( isset( $_GET["action"] ) and $_GET["action"] == "removeItem" ) {
  removeItem();
} elseif ( isset( $_GET["viewCart"] )) {
  // displayCart();
} else {
  // displayCart();
}

function addItem() {
  global $products;

  // echo '<p>addItem</p>';

  if ( isset( $_GET["productId"] ) and $_GET["productId"] >= 1 and $_GET["productId"] <= 3 ) {
    $productId = (int) $_GET["productId"];

    if ( !isset( $_SESSION["cart"][$productId] ) ) {
      $_SESSION["cart"][$productId] = $products[$productId];
    }
  }

  session_write_close();
  // header( "Location: cart.php" );
}

function removeItem() {

  if ( isset( $_GET["productId"] ) and $_GET["productId"] >= 1 and $_GET["productId"] <= 3 ) {
    $productId = (int) $_GET["productId"];

    if ( isset( $_SESSION["cart"][$productId] ) ) {
      unset( $_SESSION["cart"][$productId] );
    }
  }

  // Ensure that session data is written to file
  // PHP will do this automatically when script exits but it's best practice
  // to do this explicitly.
  session_write_close();
  // header( "Location: cart.php" );
}

function displayCart() {

  $totalPrice = 0;
  $cart_contents = $_SESSION['cart'];

  if (count($cart_contents) == 0) {
    echo '<p><em>You have no items in your cart</em></p>';
  } else {

    echo '<dl>';

    foreach ( $cart_contents as $product ) {
      $totalPrice += $product->getPrice();

      echo '<dt>'.$product->getName() . '</dt>';
      echo '<dd>$'.number_format( $product->getPrice(), 2 ).
        '&nbsp;<a href="cart.php?action=removeItem&amp;productId='.
        $product->getId().'">Remove</a></dd>';
    }
    echo '<dt>Cart Total:</dt>';
    echo '<dd><strong>$'.number_format( $totalPrice, 2 ).'</strong></dd></dl>';
  }

  echo '<p></p><a href="index.php">&lt;&lt;&nbsp;Back to Shopping</a></p>';

}

displayCart();

require_once 'footer.html';