<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 3/17/15
 * Time: 1:17 PM
 */
// demo.php for lectures 1 -4

require 'class.Address.inc';

echo '<h3>Instantiating Address</h3>';
$address = new Address();

echo '<h3>Empty Address</h3>';
echo '<code><pre>' . var_export($address, true) . '</pre></code>';


echo '<h3>Setting properties</h3>';
$address->street_address_1 = '555 Fake Street';
$address->city_name = 'Hayward';
$address->subdivision_name = 'CA';
$address->postal_code = '94544';
$address->country_name = 'USA';

// Accessed via __get method
$address->address_type_id = 1;

echo '<code><pre>' . var_export($address, true) . '</pre></code>';

echo '<h3>Displaying address...</h3>';
echo $address->display();

echo '<h3>Testing magic __get and __set</h3>';
unset($address->postal_code);
echo $address->display();

echo '<h3>Testing Address __construct with an array</h3>';
$address2 = new Address(
  array('street_address_1' => '400 Walt Disney Way',
    'city_name' => 'Hawthorne', 'subdivision_name' => 'CA',
    'postal_code' => 94041, 'country_name' => 'USA')
);

echo '<code><pre>' . var_export($address2, true) . '</pre></code>';
echo $address2->display();

echo '<h3>Address __toString()</h3>';
echo $address2;

// error_reporting(E_ALL & ~E_STRICT);

echo '<h3>Displaying address types...</h3>';
echo '<code><pre>' . var_export(Address::$valid_address_types, true) .
  '</pre></code>';

echo '<h3>Testing address type ID validation</h3>';
for ($id = 0 ; $id <=4; $id++) {
  echo "<div>$id: ";
  echo Address::isValidAddressTypeId($id) ? 'Valid' : 'Invalid';
  echo '</div>';
}

