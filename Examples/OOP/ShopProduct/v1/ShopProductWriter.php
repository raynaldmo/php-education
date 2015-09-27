<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 2/19/15
 * Time: 10:12 AM
 */

abstract class ShopProductWriter {
  protected $products = array();

  public function addProduct(ShopProduct $product) {
    array_push($this->products, $product);
  }

  abstract public function write();

} 