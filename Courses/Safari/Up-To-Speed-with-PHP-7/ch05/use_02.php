<?php
require_once './namespace_03.php';

use Oreilly\Php7\UpToSpeed\Common\DoSomething;
use const Oreilly\Php7\UpToSpeed\Common\{PIE, LOCATION};
use function Oreilly\Php7\UpToSpeed\Common\{ doubleIt, cube };

$obj = new DoSomething();
echo '<p>Yum, ' . PIE . '!</p>';
echo '<p>' . LOCATION . ' is a great place to live.</p>';
$number = 4;
echo "<p>Twice $number is " . doubleIt($number) . ", but cubed, it's " . cube($number) . '.</p>';