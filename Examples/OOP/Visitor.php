<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 1/3/15
 * Time: 10:31 PM
 */
// Example usage of static keyword

class Visitor {
  private static $visitors = 0;

  function __construct() {
    self::$visitors++;
  }

  static function getVisitors() {
    return self::$visitors;
  }
}

$v1 = new Visitor();
echo Visitor::getVisitors().'<br>';

$v2 = new Visitor();
echo Visitor::getVisitors().'<br>';
