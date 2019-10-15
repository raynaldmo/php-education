<?php
$id = 'America/New_York';
$tz = new DateTimeZone($id);
// Pass in date that's in daylight savings time
$offset = $tz->getOffset(new DateTime('4/1/2015'));
echo $offset;
