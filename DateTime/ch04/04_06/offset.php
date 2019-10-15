<?php
$id = 'America/New_York';
$tz = new DateTimeZone($id);
$offset = $tz->getOffset(new DateTime());
echo $offset;