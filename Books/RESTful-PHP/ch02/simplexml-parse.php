<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 5/21/15
 * Time: 11:45 AM
 */
$xml = simplexml_load_file('book.xml');
$book = $xml->book[0];
echo 'Book title : ' . $book->title . '<br>';
echo 'Book author name : ' . $book->author->name . '<br>';

$attributes = $book->attributes();
echo 'Book category : ' . $attributes['category'] . '<br>';
echo 'Book sub-category : ' . $attributes['sub-category'] . '<br>';