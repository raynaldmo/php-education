<?php
// model.php

function open_database_connection() {
  $connection = new PDO(
    "mysql:host=localhost;dbname=blog",
    'test',
    'test'
  );

  return $connection;
}

function close_database_connection(&$connection) {
  $connection = NULL;
}

function get_all_posts() {
  $connection = open_database_connection();

  $result = $connection->query('SELECT post_id, post_title FROM posts');

  $posts = [];
  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $posts[] = $row;
  }
  close_database_connection($connection);

  return $posts;
}

function get_post_by_id($id)
{
  $connection = open_database_connection();

  $query = 'SELECT post_date, post_title,  post_text FROM posts WHERE  post_id=:id';
  $statement = $connection->prepare($query);
  $statement->bindValue(':id', $id, PDO::PARAM_INT);
  $statement->execute();

  $row = $statement->fetch(PDO::FETCH_ASSOC);

  close_database_connection($connection);

  return $row;
}


