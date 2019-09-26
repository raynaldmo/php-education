#!/usr/bin/env php
<?php

// declare (strict_types = 1);

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define class to experiment with
class Employee {
	private $name;
  private $ein;

  function __construct(string $name, int $ein) {
  	echo 'In ' . get_class() . ' constructor.' . PHP_EOL;
  	$this->name = $name;
  	$this->ein = $ein;
  }

  private function privateMethod() {
  	echo get_class() . ' called private method' . PHP_EOL;
  }

  public function getName() : string {
  	return $this->name;
  }

  public function getEin() : int {
  	return $this->ein;
  }

  protected function protectedMethod() {
  	echo get_class() . ' called protected method' . PHP_EOL;
  }

  final function finalMethod() {
  	echo get_class() . ' called final method' . PHP_EOL;
  }

}

class Manager extends Employee {
  public function __construct(string $name, int $ein) {
  	parent::__construct($name, $ein);
  	echo 'In ' . get_class() . ' constructor.' . PHP_EOL;
  }

  protected function protectedMethod() {
  	echo get_class() . ' called protected method' . PHP_EOL;
  }

  public function finalMethod() {
  	echo get_class() . ' called final method' . PHP_EOL;
  }

  public function testProtectedMethod() {
    $this->protectedMethod();
  }

  public function testPrivateMethod() {
    $this->privateMethod();
  }

  public function testFinalMethod() {
    $this->finalMethod();
  }
}

// Exercise class methods
$emp = new Employee('Simon', 1234);
echo $emp->getName() . PHP_EOL;
echo $emp->getEin() . PHP_EOL;

$mgr = new Manager('Ray', 1);
echo $mgr->getName() . PHP_EOL;
echo $mgr->getEin() . PHP_EOL;

// Check method visibility
$mgr->testProtectedMethod();

// This will cause 'Fatal error: Uncaught Error: Call to private method Employee::privateMethod()'
// $mgr->testPrivateMethod();

// This will cause 'Fatal error: Cannot override final method Employee::finalMethod()'
// $mgr->testFinalMethod();

// Check static methods
