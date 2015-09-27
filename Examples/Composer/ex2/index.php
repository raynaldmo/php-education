<?php

require 'vendor/autoload.php';

$md = new \PEAR2\Text\Markdown_Main();
$content = file_get_contents('text.md');

echo $md->transform($content);