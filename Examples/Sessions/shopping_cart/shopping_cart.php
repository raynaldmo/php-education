<?php
require_once ("config.php");
session_start();

// print_r($_REQUEST["action"]);
// print_r($_GET["action"]);

if ( !isset( $_SESSION["cart"] ) ) $_SESSION["cart"] = array();

if ( isset( $_GET["action"] ) and $_GET["action"] == "addItem" ) {
  addItem();
} elseif ( isset( $_GET["action"] ) and $_GET["action"] == "removeItem" ) {
  removeItem();
} else {
  displayCart();
}

function addItem() {
  echo '<p>addItem</p>';

  global $products;
  if ( isset( $_GET["productId"] ) and $_GET["productId"] >= 1 and $_GET["productId"] <= 3 ) {
    $productId = (int) $_GET["productId"];

    if ( !isset( $_SESSION["cart"][$productId] ) ) {
      $_SESSION["cart"][$productId] = $products[$productId];
    }
  }

  session_write_close();
  // header( "Location: shopping_cart.php" );
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

function displayCart() {
  global $products;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>A shopping cart using sessions</title>
    <link rel="stylesheet" type="text/css" href="common.css" />
  </head>
  <body>

    <h1>Your shopping cart</h1>

    <dl>

<?php
$totalPrice = 0;
foreach ( $_SESSION["cart"] as $product ) {
  $totalPrice += $product->getPrice();
?>
      <dt><?php echo $product->getName() ?></dt>
      <dd>$<?php echo number_format( $product->getPrice(), 2 ) ?>
      <a href="shopping_cart.php?action=removeItem&amp;productId=<?php echo $product->getId() ?>">Remove</a></dd>
<?php } ?>
      <dt>Cart Total:</dt>
      <dd><strong>$<?php echo number_format( $totalPrice, 2 ) ?></strong></dd>
    </dl>

    <h1>Product list</h1>

    <dl>
<?php foreach ( $products as $product ) { ?>
      <dt><?php echo $product->getName() ?></dt>
      <dd>$<?php echo number_format( $product->getPrice(), 2 ) ?>
      <a href="shopping_cart.php?action=addItem&amp;productId=<?php echo $product->getId() ?>">Add Item</a></dd>
<?php } ?>
    </dl>

<?php
}
?>

  </body>
</html>
