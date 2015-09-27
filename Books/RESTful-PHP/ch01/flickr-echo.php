<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 5/20/15
 * Time: 10:32 PM
 */
$base_url = 'https://api.flickr.com/services/rest/';
$query_string = '';
$params = array (
  'method' => 'flickr.test.echo',
  'name' => 'raynaldmo',
  'api_key' => '1a60093c2205c2ba468ab55462fff369',
  'format' => 'rest'
);

foreach ($params as $key => $value) {
  $query_string .= "$key=" . urlencode($value) . "&";
}

$url = $base_url . "?" . $query_string;
$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
$xml = curl_exec($client);
curl_close($client);

header('Content-Type: text/xml');
echo $xml;