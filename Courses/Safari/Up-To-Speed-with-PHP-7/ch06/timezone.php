<?php
echo 'Running PHP ' . phpversion() . '<br>';

$now = new DateTime();
$tz = $now->getTimezone();
echo $tz->getName();