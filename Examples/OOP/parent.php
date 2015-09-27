<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 2/8/15
 * Time: 4:01 PM
 */

class ParentClass {
  function __construct() {
    echo 'using parent constructor';
  }
}

class SubClass extends ParentClass {

  function __construct() {
    parent::__construct();

    echo 'using sub-class constructor';
  }
}