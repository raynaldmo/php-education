#!/usr/bin/env php
<?php

// declare (strict_types = 1)

error_reporting(E_ALL);
ini_set('display_errors', 1);


class User {
  public $firstName;
  public $lastName;

  public function sayHello() {
    return "Hello from user $this->firstName $this->lastName";
  }

}

$user1 = new User();
$user1->firstName = 'Bugs';
$user1->lastName = 'Bunny';

echo $user1->firstName . PHP_EOL;
echo $user1->lastName . PHP_EOL;

echo $user1->sayHello() . PHP_EOL;