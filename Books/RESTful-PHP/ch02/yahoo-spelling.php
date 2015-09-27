<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 5/21/15
 * Time: 8:59 AM
 */

// URL seems to be outdated/not working
$url = "http://search.yahooapis.com/WebSearchService/V1/spellingSuggestion?appid=YahooDemo&query=apocalipto";
$result = file_get_contents($url);
echo $result;