<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 2/19/15
 * Time: 4:56 PM
 */

class Person {
  private $_name;
  private $_age;
  private $_writer;

  function __construct($name='none', $age=0, PersonWriter $w) {
    $this->_name = $name;
    $this->_age = $age;
    $this->_writer = $w;
  }

  function getName() {
    return $this->_name;

  }

  function setName( $name ) {
    $this->_name = $name;
    if ( ! is_null( $name ) ) {
      $this->_name = strtoupper($this->_name);
    }
  }

  function getAge() {
    return $this->_age;
  }

  function setAge( $age ) {
    $this->_age =  strtoupper($age);
  }

  // 'Interceptor' methods
  function  __get($property) {
    $method = "get{$property}";
    if (method_exists($this, $method)) {
      return $this->$method;
    }
    return null;
  }

  function __set( $property, $value ) {
    $method = "set{$property}";
    if ( method_exists( $this, $method ) ) {
      return $this->$method( $value );
    }
    return null;
  }

  function __isset($property) {
    $method = "get{$property}";
    return (method_exists($this, $method));
  }

  function __unset($property) {
    $method = "set{$property}";
    if (method_exists($this, $method)) {
      $this->$method(null);
    }
  }

  // Allows us to 'delegate' methods to another class
  function __call($methodname, $args) {
    if(method_exists($this->_writer, $methodname)) {
      return $this->_writer->$methodname($this);
    }
    return null;
  }

} 