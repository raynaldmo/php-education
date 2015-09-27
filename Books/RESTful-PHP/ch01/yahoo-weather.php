<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 3/27/15
 * Time: 4:42 PM
 */
$url = 'http://weather.yahooapis.com/forecastrss?p=USNY0996';
$xml = file_get_contents($url);

echo $xml;


$xml = simplexml_load_string($xml);
$node = $xml->channel->item;
$children = $node->children('http://xml.weather.yahoo.com/ns/ rss/1.0');
$condition = $children->condition;
$attributes = $condition->attributes();
echo $attributes['date'] . " temperature " . $attributes['temp'] ."F";
