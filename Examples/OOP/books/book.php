<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 1/3/15
 * Time: 9:47 PM
 */

class Book {
  private $title;
  private $isbn;
  private $copies;

  function __construct($isbn) {
    $this->setIsbn($isbn);
    $this->getTitle();
    $this->getNumberCopies();
  }

  public function setIsbn($isbn) {
    $this->isbn = $isbn;
  }

  public function getTitle() {
    $this->title = "Easy PHP Websites with the Zend Framework";
    echo "Title : {$this->title}"."<br>";
  }

  public function getNumberCopies() {
    $this->copies = "5";
    echo "Number copies available: {$this->copies}"."<br>";
  }

  function __destruct() {
    print "<p>Book class instance destroyed</p>";
  }
} 