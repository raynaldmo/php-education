<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 2/19/15
 * Time: 10:20 AM
 */

class TextProductWriter extends ShopProductWriter {
  public function write() {
    $str = "PRODUCT(S):\n";

    foreach($this->products as $product) {
      $str .= $product->getSummaryLine() . "\n";
    }
    return $str;
  }
} 