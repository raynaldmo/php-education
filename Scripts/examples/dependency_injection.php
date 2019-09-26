#!/usr/bin/env php
<?php

// declare (strict_types = 1)

error_reporting(E_ALL);
ini_set('display_errors', 1);

interface Mailer {
  public function sendMail($message);
}

class Mailer1 implements Mailer {
  public function sendMail($message) {
    return __CLASS__ . ': ' . $message;
  }
}

class Mailer2 implements Mailer {
  public function sendMail($message) {
    return __CLASS__ . ': ' . $message;
  }
}

class User {
  protected $mailer = '';

  public function __construct(Mailer $mailer) {
    $this->mailer = $mailer;
  }

  public function getMailer() {
    return $this->mailer;
  }
}


$user = new User(new Mailer1());
echo $user->getMailer()->sendMail('Send mail to user.') . PHP_EOL;

$user = new User(new Mailer2());
echo $user->getMailer()->sendMail('Send mail to user.') . PHP_EOL;