<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 2/18/15
 * Time: 12:07 PM
 */

class CdProduct extends ShopProduct{
  private $playLength = 0;

  public function __construct($title, $firstName,
      $mainName, $price, $playLength) {

      parent::__construct($title, $firstName, $mainName, $price);
      $this->playLength = $playLength;
  }

  public function getPlayLength() {
    return $this->playLength;
  }

  public function getSummaryLine() {
    $base = parent::getSummaryLine();
    $base .= ": playing time - {$this->getPlayLength()}";
    return $base;
  }
} 