#!/usr/bin/env php
<?php

// declare (strict_types = 1)

error_reporting(E_ALL);
ini_set('display_errors', 1);

class Employee {
  private $name;
  private $position;

  public function setName($name) {
    $this->name = $name;
    return $this;
  }

  public function setPosition($position) {
    $this->position = $position;
    return $this;
  }
}


$emp = new Employee();
$emp->setName('Bugs Bunny')->setPosition('Actor');

var_dump($emp);
print_r($emp);
