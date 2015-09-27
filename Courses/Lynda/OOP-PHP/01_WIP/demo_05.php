<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 3/17/15
 * Time: 1:17 PM
 */

// demo.php before Inheritance

/*
 * Define autoloader
 * @param string $class_name
 */
function __autoload($class_name) {
  require 'class' . $class_name . '.inc';
}

echo '<h3>Instantiating Address</h3>';
$address1 = new Address();

echo '<h3>Empty Address</h3>';
echo '<code><pre>' . var_export($address1, true) . '</pre></code>';


echo '<h3>Setting Address 1 properties</h3>';
$address1->street_address_1 = '555 Fake Street';
$address1->city_name = 'Hayward';
$address1->subdivision_name = 'California';
$address1->country_name = 'USA';
$address1->address_type_id = 1; // accessed via __get()

echo '<h3>Displaying Address 1</h3>';
echo '<code><pre>' . var_export($address1, true) . '</pre></code>';
echo $address1;


echo '<h3>Setting Address 2 properties</h3>';
$address2 = new Address(
  array('street_address_1' => '400 Walt Disney Way',
    'city_name' => 'Hawthorne', 'subdivision_name' => 'California',
    'country_name' => 'USA')
);

echo '<code><pre>' . var_export($address2, true) . '</pre></code>';
echo $address2;


