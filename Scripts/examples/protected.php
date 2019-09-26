#!/usr/bin/env php
<?php

// declare (strict_types = 1)

error_reporting(E_ALL);
ini_set('display_errors', 1);

class Employee {
  protected $wage;

  public function setWage($wage) {
    $this->wage= $wage;
  }

  public function getWage() {
    return $this->wage;
  }
}

class Manager extends Employee {

}

$emp = new Employee();
// $emp->wage = 10000;  // error

$mgr = new Manager();
// $mgr->wage = 20000;  // error

$emp->setWage(10000);
echo $emp->getWage(). PHP_EOL;

$mgr->setWage(20000);
echo $mgr->getWage(). PHP_EOL;
