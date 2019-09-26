#!/usr/bin/env php

<?php

$d = 'A00';

for ($i=1; $i<=9; $i++) {
  $s = substr($d, 2, 1);
  $v1 = $s + $i;
  $v2 = substr($d, 0, 2) . $v1;
  echo $v2 . PHP_EOL;
}

?>
 
