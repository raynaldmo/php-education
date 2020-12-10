#!/usr/bin/env php
<?php

// declare (strict_types = 1)

error_reporting(E_ALL);
ini_set('display_errors', 1);

class User {
  protected $username;

  public function setUserName($username) {
    $this->username = $username;
  }

  public function getUserName() {
    return $this->username;
  }

}

interface Author {
  public function setAuthorPrivileges($arr);
  public function getAuthorPrivileges();
}

interface Editor {
  public function setEditorPrivileges($arr);
  public function getEditorPrivileges();
}

class AuthorEditor extends User implements Author, Editor {
  private $authorPriv = [];
  private $editorPriv = [];

  // Implement Author interface
  public function setAuthorPrivileges($arr) {
    $this->authorPriv = $arr;
  }

  public function getAuthorPrivileges() {
    return $this->authorPriv;
  }

  // Implement Editor interface
  public function setEditorPrivileges($arr) {
    $this->editorPriv = $arr;
  }

  public function getEditorPrivileges() {
    return $this->editorPriv;
  }

}

$user1 = new AuthorEditor();
$user1->setUserName('Test');

$user1->setAuthorPrivileges(['write text', 'read text', 'edit own text', 'delete own text' ]);
$user1->setEditorPrivileges(['write text', 'read text', 'edit text', 'delete text' ]);

// var_dump($user1);

$userPriv = array_merge($user1->getAuthorPrivileges(), $user1->getEditorPrivileges());

echo $user1->getUserName() . " user has the following privileges:\n";

foreach($userPriv as $key => $val) {
  echo $key . ' => '. $val . ', ';
}

echo PHP_EOL;
