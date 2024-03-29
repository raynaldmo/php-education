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

  public function expressYourRole() {
      return 'user';
  }

  public function sayHello() {
		return 'Hello, ' . $this->expressYourRole() . ' ' .  $this->username . PHP_EOL;
  }
}

class Admin extends User {
  public function expressYourRole() {
    return 'admin';
  }

}

$user = new User();
$user->setName('User');
echo $user->sayHello();

$admin = new Admin();
$admin->setName('Balthazar');
echo $admin->sayHello();
