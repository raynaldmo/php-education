<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 4/16/15
 * Time: 10:00 AM
 */

// URL scanner app

// 1. Use Composer autoloader
require 'vendor/autoload.php';

use \League\Csv\Reader;
use \GuzzleHttp\Client;

// 2. Instantiate Guzzle HTTP client
$client = new Client();

// 3. Open and iterate CSV
// $csv = new \League\Csv\Reader($argv[1]);
$csv = Reader::createFromPath($argv[1]);

foreach ($csv as $url) {
  try {
    // 4. Send HTTP OPTIONS request
    $httpResponse = $client->options($url[0]);

    // 5. Inspect HTTP response status code
    if ($httpResponse->getStatusCode() >= 400) {
      throw new \Exception();
    }

  } catch (\Exception $e) {
    // 6. Print bad URL to standard out
    echo $url[0] . PHP_EOL;
  }

}