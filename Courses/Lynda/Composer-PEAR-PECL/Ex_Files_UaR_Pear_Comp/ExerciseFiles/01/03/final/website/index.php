<?php

require 'vendor/autoload.php';

$md = new \dflydev\markdown\MarkdownParser();

$content = file_get_contents('text.md');

echo $md->transformMarkdown($content);