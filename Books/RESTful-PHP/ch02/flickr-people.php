<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 5/21/15
 * Time: 3:33 PM
 */

$base_url = 'https://api.flickr.com/services/rest/';
$query_string = '';

$params = array (
  'method' => 'flickr.people.findByUsername',
  'api_key' => '1a60093c2205c2ba468ab55462fff369',
  'username' => 'raynaldmo'
);

$query_string = http_build_query($params);

$url = $base_url . '?' . $query_string;

$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($client);
curl_close($client);

// header('Content-Type: text/xml');
// echo $response;

$xml = simplexml_load_string($response);
foreach ($xml->user as $user) {
  $attributes = $user->attributes();
  echo 'User Name :' . $user->username . '<br>';
  echo 'User ID : ' . $attributes['id'] . '<br>';
  echo 'User NSID : ' . $attributes['nsid'] . '<br>';
}
