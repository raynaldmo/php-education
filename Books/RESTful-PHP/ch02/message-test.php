<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 5/21/15
 * Time: 10:37 AM
 */
$url = 'http://localhost/PHP-Education/Books/RESTful-PHP/ch02/message-service.php';
$data = <<<XML
<?xml version="1.0" encoding="utf-8"?>
<?xml-stylesheet type="text/css" href="style.css"?>
<text>Hello World!</text>
XML;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$response = curl_exec($ch);
curl_close($ch);

header('Content-Type: text/xml');
echo $response;
