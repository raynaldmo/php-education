#!/usr/bin/env php
<?php

// declare (strict_types = 1)

error_reporting(E_ALL);
ini_set('display_errors', 1);

interface User {

}

trait Writing {
  abstract public function message();
}

class Author implements User {
  use Writing;

  public function message() {
    return 'Author, please start typing an article...';
  }
}

class Commentator implements User {
  use Writing;

  public function message() {
    return 'Commentator, please start typing your comment...';
  }
}

class Viewer implements User {

}

$author = new author();
echo "{$author->message()}\n";

$commentator = new Commentator();
echo "{$commentator->message()}\n";;

