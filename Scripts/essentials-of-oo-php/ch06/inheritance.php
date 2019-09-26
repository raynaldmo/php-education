#!/usr/bin/env php
<?php

// declare (strict_types = 1)

error_reporting(E_ALL);
ini_set('display_errors', 1);

class User {
  protected $username;

  public function setName($username) {
    $this->username = $username;
  }
}

class Admin extends User {
  public function expressYourRole() {
    return 'admin';
  }

  public function sayHello() {
    return 'Hello, ' . $this->expressYourRole() .  $this->username . PHP_EOL;
  }
}

$admin = new Admin();
$admin->setName('Balthazar');

echo $admin->sayHello();
