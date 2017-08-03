<?php
require_once './namespace_01.php';
require_once './namespace_02.php';

use Oreilly\Php7\UpToSpeed\Nouns\Language;
use Oreilly\Php7\UpToSpeed\Nouns\Operator;
use Oreilly\Php7\UpToSpeed\Verbs\Possess;

$lang = new Language();
$operators = new Operator();
$verb = new Possess();

echo $lang->version;