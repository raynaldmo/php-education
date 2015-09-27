<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 1/3/15
 * Time: 10:16 PM
 */

class Manager extends Employee {
  function __construct() {
    parent::__construct();

    echo "<p>Manager constructor called</p>";
  }

  public function setName($name) {
    echo "<p>Manager::setName() called</p>";
    $this->name = $name;
  }
} 