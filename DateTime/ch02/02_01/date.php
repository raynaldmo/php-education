<?php
// date() uses PHP configured time zone
ini_set('date.timezone', 'Europe/London');
print 'Time zone is ' . ini_get('date.timezone') . '<br>';

echo 'Today is ' . date('g:i:s a \o\n l, F j, Y') . '<br>';
echo 'The time is ' . date('g:i:s a') . '<br>';
echo date(DATE_COOKIE) . '<br><br>';

$time_zone = date_default_timezone_set('America/New_York');

echo 'Today is ' . date('g:i:s a \o\n l, F j, Y') . '<br>';
echo 'The time is ' . date('g:i:s a') . '<br>';
echo date(DATE_COOKIE) . '<br>';