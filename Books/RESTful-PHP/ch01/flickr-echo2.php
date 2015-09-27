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
  'api_key' => '216c082685f7f735e3ab23787d425b09',
  'format' => 'rest'
);

foreach ($params as $key => $value) {
  $query_string .= "$key=" . urlencode($value) . "&";
}

$url = $base_url . "?" . $query_string;
echo '<pre><code>' . print_r($url, 1) . '</code></pre>';

$xml = file_get_contents($url);

echo $xml;