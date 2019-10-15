<?php
$ts = strtotime('7/4/2015');

// prints 1435993200
echo $ts . '<br>';

// Caution: Don't pass in timestamp this way. DateTime will show the GMT time
// and not take into account the local time zone
$date = new DateTime("@$ts");

// prints 7:00 am, Saturday, July 4, 2015
// Assuming America/Los_Angeles time zone
echo $date->format('g:i a, l, F j, Y') . '<br>';

// Use the setTimestamp() method set timestamp. Local time zone will be
// taken into account when date is displayed
$date1 = new DateTime();
$date1->setTimestamp($ts);

// prints 12:00 am, Saturday, July 4, 2015
// Assuming America/Los_Angeles time zone
echo $date1->format('g:i a, l, F j, Y') . '<br>';