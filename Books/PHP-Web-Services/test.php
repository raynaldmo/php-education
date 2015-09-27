<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 5/20/15
 * Time: 10:09 PM
 */

$url = 'http://requestb.in/18b3p1w1';

$data = array("name" => "Ray", "email" => "ray@example.com");

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

curl_setopt($ch, CURLOPT_HTTPHEADER,
  array('Content-Type: application/json')
);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);

echo $result;