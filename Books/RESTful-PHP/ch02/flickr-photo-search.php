<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 5/21/15
 * Time: 3:58 PM
 */

$base_url = 'https://api.flickr.com/services/rest/';
$query_string = '';
$params = array (
  'method' => 'flickr.photos.search',
  'api_key' => '1a60093c2205c2ba468ab55462fff369',
  'tags' => 'flowers',
  'per_page' => 10
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
foreach ($xml->photos->photo as $photo) {
  $attributes = $photo->attributes();
  $image_url = 'http://farm' . $attributes['farm'] . '.static.flickr.com/' . $attributes['server'] . '/' . $attributes['id'] . '_' . $attributes['secret'] . '.jpg';
  echo "<img src='" . $image_url . "'/>";
}
