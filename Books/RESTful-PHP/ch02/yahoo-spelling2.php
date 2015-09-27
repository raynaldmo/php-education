<?php
$url = "http://search.yahooapis.com/WebSearchService/V1/spellingSuggestion?appid=YahooDemo&query=apocalipto";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPGET, true);
$response = curl_exec($ch);
curl_close($ch);

echo $response;