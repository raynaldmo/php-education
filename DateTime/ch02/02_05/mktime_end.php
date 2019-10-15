<?php
// Calculate timestamp based on local date and time
$ts = mktime(16,38,0,6,21,2015);
echo $ts . '<br>';
echo date('g:i:s a, l, F j, Y', $ts) . '<br><br>';

// Calculate timestamp based on GMT date and time
$ts = gmmktime(16,38,0,6,21,2015);
echo $ts . '<br>';
echo date('g:i:s a, l, F j, Y', $ts) . '<br>';

