<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 1/13/15
 * Time: 1:14 PM
 */

// Open file for reading
$filename = './test.txt';
if ( ! ($fh = fopen($filename, 'r') ) ) {
  die("<p>Cannot open file $filename</p>");
}

echo '<ul>';
while(!feof($fh)) echo '<li>'.fgets($fh).'</li>';
echo '</ul>';

fclose($fh);