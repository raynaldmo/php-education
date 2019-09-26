#!/usr/bin/php
<?php
// Emulate array_values() function

function my_array_values($arr) {
 $new_arr = array();

 if ($arr) {
   foreach ($arr as $val) {
     $new_arr[] = $val;
   }
 }
  
 return $new_arr;
}

$fruits = array('k1' => 'apple', 'k2' => 'orange', 'k3' => 'cherries');
var_dump($fruits);
var_dump(my_array_values($fruits));
