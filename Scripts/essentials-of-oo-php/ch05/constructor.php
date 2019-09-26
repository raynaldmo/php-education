#!/usr/bin/env php
<?php

// declare (strict_types = 1)

error_reporting(E_ALL);
ini_set('display_errors', 1);

class User {
  private $firstName;
  private $lastName;

  public function __construct($firstName = 'N/A', $lastName = 'N/A') {
    $this->firstName = $firstName;
    $this->lastName = $lastName;
  }

  public function getFullName() {
    // echo "getFullName()\n";
    $name = $this->firstName . ' ' . $this->lastName . PHP_EOL;;
    return $name;
  }
}

$user1 = new User();
echo $user1->getFullName();

$user2 = new User('Bugs', 'Bunny');
echo $user2->getFullName();

