<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 2/8/15
 * Time: 11:36 AM
 */

class Square extends Rectangle {
  function __construct($side = 0) {
    $this->width = $side;
    $this->height = $side;
  }
} 