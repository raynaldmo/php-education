<?php

echo __FILE__ ."<br />";
echo __LINE__ ."<br />"; // be careful once you include files
echo dirname(__FILE__) ."<br >";
echo __DIR__ ."<br />"; // only PHP 5.3

echo file_exists(__FILE__) ? '1. yes' : '1. no';
echo "<br />";

echo file_exists(dirname(__FILE__)."/basic.html") ? '2. yes' : '2. no';
echo "<br />";

echo file_exists(dirname(__FILE__)) ? '3. yes' : '3. no';
echo "<br />";

echo is_file(dirname(__FILE__)."/basic.html") ? '4. yes' : '4. no';
echo "<br />";

echo is_file(dirname(__FILE__)) ? '5. yes' : '5. no';
echo "<br />";

echo is_dir(dirname(__FILE__)."/basic.html") ? '6. yes' : '6. no';
echo "<br />";

echo is_dir(dirname(__FILE__)) ? '7. yes' : '7. no';
echo "<br />";

echo is_dir('..') ? '8. yes' : '8. no';
echo "<br />";

?>