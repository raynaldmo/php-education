<?php
// index.php
$connection = new PDO("mysql:host=localhost;dbname=blog", 'test', 'test');

$result = $connection->query('SELECT post_id, post_title FROM posts');


$posts = [];

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
  $posts[] = $row;
}

$connection = null;

// include the HTML presentation code
require_once 'templates/list.php';
