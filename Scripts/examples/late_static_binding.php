#!/usr/bin/env php
<?php

// declare (strict_types = 1)

error_reporting(E_ALL);
ini_set('display_errors', 1);

class Foo {
   public static function baz() {
     // return $this won't work since baz() is a static function
     return new self();
   }

   public function msg() {
     return __CLASS__;
   }
}

// $x is a Foo
$x = Foo::baz();
echo "{$x->msg()}\n";  // 'Foo'

class Bar extends Foo {
  public function msg() {
     return __CLASS__;
  }
}

// $z is also a Foo
$z = Foo::baz();
echo "{$z->msg()}\n";  // 'Foo'

// $z is still a Foo !
$z = Bar::baz();
echo "{$z->msg()}\n";  // 'Foo'


class Foo1 {
   public static function baz() {
     // return $this won't work since baz() is a static function
     return new static();
   }

   public function msg() {
     return __CLASS__;
   }
}

class Bar1 extends Foo1 {
  public function msg() {
     return __CLASS__;
  }
}

// $wow is a Foo1
$wow = Foo1::baz();
echo "{$wow->msg()}\n";  // 'Foo1'

// $wow is now a Bar1, even though baz() is in base Foo1
$wow = Bar1::baz();
echo "{$wow->msg()}\n";  // 'Bar1'
