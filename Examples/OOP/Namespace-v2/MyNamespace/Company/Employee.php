<?php
namespace MyNamespace\Company;

class Employee {
  private $_name;
  function __construct($name) {
    $this->_name = $name;
  }
  function getName() {
    return $this->_name;
  }
}