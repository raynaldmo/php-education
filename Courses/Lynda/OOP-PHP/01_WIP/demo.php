<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 3/17/15
 * Time: 1:17 PM
 */

/*
 * Define autoloader
 * @param string $class_name
 */
function __autoload($class_name) {
  require 'class.' . $class_name . '.inc';
}

echo '<h3>Instantiating AddressResidence</h3>';
$addr1 = new AddressResidence();

echo '<h3>Empty AddressResidence</h3>';
echo '<code><pre>' . var_export($addr1, true) . '</pre></code>';

echo '<h3>Setting AddressResidence properties</h3>';
// postal_code is read from database
$addr1->street_address_1 = '555 Fake Street';
$addr1->city_name = 'Hayward';
$addr1->subdivision_name = 'California';
$addr1->country_name = 'USA';

echo '<h3>Displaying AddressResidence</h3>';
echo '<code><pre>' . var_export($addr1, true) . '</pre></code>';
echo $addr1;


echo '<h3>Setting AddressBusiness properties</h3>';
// postal_code is read from database
$addr2 = new AddressBusiness(
  array('street_address_1' => '400 Walt Disney Way',
        'city_name' => 'Hawthorne', 'subdivision_name' => 'California')
);

echo '<h3>Displaying AddressBusiness</h3>';
echo '<code><pre>' . var_export($addr2, true) . '</pre></code>';
echo $addr2;


echo '<h3>Instantiating AddressPark</h3>';
$addr3= new AddressPark(array(
  'street_address_1' => '789 Missing Circle',
  'street_address_2' => 'Suite 0',
  'city_name' => 'Hamlet',
  'subdivision_name' => 'Territory')
);

echo '<code><pre>' . var_export($addr3, TRUE) . '</pre></code>';
echo $addr3;

/*
echo '<h3>Cloning AddressPark</h3>';
$addr4 = clone $addr3;

echo '<code><pre>' . var_export($addr4, TRUE) . '</pre></code>';

echo 'address park clone is ' . ($addr3 == $addr4 ?
    '' : 'not ') . ' a copy of address park.';
*/

echo '<h3>Testing typecasting to an object</h3>';
$test_object = (object) 12345;
echo '<tt><pre>' . var_export($test_object, TRUE) . '</pre></tt>';

echo '<h3>Saving AddressResidence</h3>';
// $addr1->save();

echo '<h3>Load AddressResidence</h3>';
$addr4 = Address::load(2);

echo '<h3>Displaying AddressResidence</h3>';
echo '<code><pre>' . var_export($addr4, true) . '</pre></code>';
echo $addr4;