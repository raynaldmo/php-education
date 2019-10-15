<?php
require_once 'FormattedDate.php';
$date = new FormattedDate('7/4/1776');

// Print date using default format
echo $date . '<br>';

// Set custom format
$date->mdy();
echo $date . '<br>';