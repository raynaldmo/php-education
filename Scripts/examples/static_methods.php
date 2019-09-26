#!/usr/bin/env php
<?php

// declare (strict_types = 1)

error_reporting(E_ALL);
ini_set('display_errors', 1);

class Utils {
   public static $count = 0;

   public static function updateCnt($val) {
     self::$count += $val;
     return self::$count;
   }

   public function showCount() {
     return self::$count;
   }
}

echo Utils::$count . PHP_EOL;;        // 0
echo Utils::updateCnt(1) . PHP_EOL;   // 1
echo Utils::updateCnt(2) . PHP_EOL;   // 3
echo Utils::updateCnt(-1) . PHP_EOL;  // 2

$util = new Utils();
echo $util->showCount() . PHP_EOL;
