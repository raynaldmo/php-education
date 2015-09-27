<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 2/13/15
 * Time: 11:15 AM
 */
$str = implode('',(range('a' , 'c')));
$idx = strlen($str) - 1;
$r_str = '';
$i = 0;

echo '$r_str is a ' . gettype($r_str) . '<br>';

while($idx >= 0) {
  // This doesn't work - thinks $_str is an array

  $r_str[$i] = $str[$idx];

  echo gettype($r_str[$i]) . ' ';
  echo gettype($str[$idx]) . '<br>';

  $i++; $idx--;

  // $r_str = $r_str . $str[$idx--];
}

echo $str . '<br>';
echo implode('',$r_str) . '<br>';
// var_dump($r_str);