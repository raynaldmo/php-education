<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 2/5/15
 * Time: 9:44 PM
 */

function r($a)
{
  if ($a < 2) {
    echo "$a<br>";
    r($a + 1);
  }
  echo "$a" . ' hello<br>';
}

r(0);