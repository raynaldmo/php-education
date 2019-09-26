#!/usr/bin/env php
<?php

// declare (strict_types = 1)

error_reporting(E_ALL);
ini_set('display_errors', 1);

class Employee {
  private function adjustWage() {
    echo "adjustWage()\n";
  }

  public function calculateWage() {
    $this->adjustWage();
    echo "calculateWage()\n";
  }
}

class Manager extends Employee {

}

$emp = new Employee();
$emp->calculateWage(); 
// $emp->adjustWage();     // error

$mgr = new Manager();
$mgr->calculateWage(); 
// $mgr->adjustWage();     // error

