#!/usr/bin/env php
<?php

// declare (strict_types = 1)

error_reporting(E_ALL);
ini_set('display_errors', 1);

class Employee {
  protected $name;

  // not executed when Manager object is instantiated
  public function __construct($name) {  
    $this->name = __CLASS__  . ' '. $name;
    echo __CLASS__ . ' constructor' . PHP_EOL;
  }

  public function getName() {
    return $this->name;
  }
}

class Manager extends Employee {

  // overrides parent constructor
  public function __construct($name) { 
    $this->name = __CLASS__  . ' '. $name;
    echo __CLASS__ . ' constructor' . PHP_EOL;
  }
}

$emp = new Employee('employee');  // 'Employee constructor'
echo $emp->getName() . PHP_EOL;   // 'Employee employee'

$mgr = new Manager('manager');    // 'Manager constructor'
echo $mgr->getName() . PHP_EOL;   // 'Manager manager'



class Executive extends Manager {
  public function __construct($name) {
    parent::__construct($name);
  }
}

$exec = new Executive('executive'); // 'Manager constructor'
echo $exec->getName() . PHP_EOL;    // 'Manager executive''

