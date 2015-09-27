<?php

require_once 'HTTP/Request2.php';

$request = new HTTP_Request2(
	'http://www.example.com', 
	HTTP_Request2::METHOD_GET
);

$response = $request->send();

echo "HTTP Status: " . $response->getStatus() . "\n";

print_r($response->getHeader());