<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 2/19/15
 * Time: 5:23 PM
 */

class PersonWriter {
  function writeName(Person $p) {
    return  $p->getName();
  }

  function writeAge($p) {
    return $p->getAge();
  }

} 