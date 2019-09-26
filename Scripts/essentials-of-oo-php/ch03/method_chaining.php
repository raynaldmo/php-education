#!/usr/bin/env php
<?php

// declare (strict_types = 1)

error_reporting(E_ALL);
ini_set('display_errors', 1);

class User {
  public $firstName;

  public function hello() {
    echo "hello, " . $this->firstName;
    return $this;
  }

  public function register() {
    echo ' >> registered';
    return $this;
  }

  public function mail() {
    echo ' >> email sent';
    return $this;
  }
}

$user1 = new User();
$user1->firstName = 'Jane';

$user1->hello()->register()->mail();
echo PHP_EOL;

