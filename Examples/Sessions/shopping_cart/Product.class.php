<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 1/20/15
 * Time: 10:02 AM
 */

class Product {
  private $productId;
  private $productName;
  private $price;

  public function __construct( $productId, $productName, $price ) {
    $this->productId = $productId;
    $this->productName = $productName;
    $this->price = $price;
  }

  public function getId() {
    return $this->productId;
  }

  public function getName() {
    return $this->productName;
  }

  public function getPrice() {
    return $this->price;
  }

}
