<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 2/18/15
 * Time: 12:21 PM
 */

class BookProduct extends ShopProduct {
  private $numPages = 0;

  public function __construct($title, $firstName,
                              $mainName, $price, $numPages) {

    parent::__construct($title, $firstName, $mainName, $price);
    $this->numPages = $numPages;
  }

  public function getNumberOfPages() {
    return $this->numPages;
  }

  public function getSummaryLine() {
    $base = parent::getSummaryLine();
    $base .= ": page count - {$this->getNumberOfPages()}";
    return $base;
  }
} 