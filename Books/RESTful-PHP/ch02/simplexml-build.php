<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 5/21/15
 * Time: 11:07 AM
 */

$xmlstr = <<<XML
<books>
<book>
<title/>
</book>
</books>
XML;

$xml = new SimpleXMLElement($xmlstr);
$book = $xml->book[0];
$book->addAttribute('type', 'Computer');
$book->title = 'RESTful Web Services!';
$author = $xml->book[0]->addChild('author');
$author->addChild('name', 'Raynald');

header('Content-Type: text/xml');
echo $xml->asXML();