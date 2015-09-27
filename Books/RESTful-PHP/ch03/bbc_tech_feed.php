<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 5/22/15
 * Time: 8:53 AM
 */

require_once 'utils.php';

// $url = 'https://newsrss.bbc.co.uk/rss/newsonline_world_edition/technology/rss.xml';
$url = 'http://feeds.bbci.co.uk/news/technology/rss.xml';
$response = curl_get($url);
$xml = simplexml_load_string($response);

// header('Content-Type: text/xml');
echo $xml;

/*
foreach ($xml->channel->item as $item) {
  echo $item->title . "\n";
}
*/