#!/usr/bin/env php
<?php
namespace Chapter7\Challenge;

// declare (strict_types = 1)

error_reporting(E_ALL);
ini_set('display_errors', 1);


abstract class User {
  protected $username;

  abstract protected function stateYourRole();

  public function setUserName($username) {
    $this->username = $username;
  }

  public function getUserName() {
    return $this->username;
  }
}

class Admin extends User {
  public function stateYourRole() {
    return \strtolower(__CLASS__);
  }
}

class Viewer extends User {
  public function stateYourRole() {
    return strtolower(__CLASS__);
  }
}

$admin = new Admin();
$admin->setUserName('Test');
echo $admin->getUserName() . ' is an ' . $admin->stateYourRole() . PHP_EOL;

