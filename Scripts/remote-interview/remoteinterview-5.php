#!/usr/bin/env php
<?php

// declare (strict_types = 1);

error_reporting(E_ALL);
ini_set('display_errors', 1);

class SomeClass
{
  protected static $_someMember = 1;

  public static function getSomethingStatic()
  {
    return self::$_someMember * 5;
  }

}

$val = SomeClass::getSomethingStatic();
echo $val . PHP_EOL;  

?>
