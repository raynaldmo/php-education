<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 1/7/15
 * Time: 10:30 AM
 */

class Log {
  private $filename;
  private $fh;

  function __construct($filename) {
    $this->filename = $filename;
    $this->open();
  }

  function open() {
    $this->fh = fopen($this->filename, 'a') or die("Can't open
    $this->filename");
  }

  function write($note) {
    fwrite($this->fh, "{$note}\n");
  }

  function read() {
    // read entire file into array and concatenate as one string
    return join('', file($this->filename));
  }

  function __wakeup() {
    $this->open();
  }

  function __sleep() {
    // write information to the account file
    fclose($this->fh);
    return array('filename'); // this is the only thing we store in file
  }
} 