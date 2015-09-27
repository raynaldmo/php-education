<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 1/3/15
 * Time: 3:08 PM
 */

class Employee {
  protected  $name;
  private $title;
  protected $wage;

  function __construct() {
    echo "<p>Employee constructor called</p>";
  }

  public function setName($name) {
    echo "<p>Employee::setName() called</p>";
    $this->name = $name;
  }

  public function getName() {
    return $this->name;
  }

  protected function clockIn() {
    echo "Member $this->name clocked in at ".date('h:i:s');
  }

  protected function clockOut() {
    echo "Member $this->name clocked out at ".date('h:i:s');
  }
}


