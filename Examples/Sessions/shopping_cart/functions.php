<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 1/20/15
 * Time: 10:10 AM
 */
function addItem() {
  global $products;
  if ( isset( $_GET["productId"] ) and $_GET["productId"] >= 1 and $_GET["productId"] <= 3 ) {
    $productId = (int) $_GET["productId"];

    if ( !isset( $_SESSION["cart"][$productId] ) ) {
      $_SESSION["cart"][$productId] = $products[$productId];
    }
  }

  session_write_close();
  header( "Location: shopping_cart.php" );
}

function removeItem() {
  global $products;
  if ( isset( $_GET["productId"] ) and $_GET["productId"] >= 1 and $_GET["productId"] <= 3 ) {
    $productId = (int) $_GET["productId"];

    if ( isset( $_SESSION["cart"][$productId] ) ) {
      unset( $_SESSION["cart"][$productId] );
    }
  }

  session_write_close();
  header( "Location: shopping_cart.php" );
}