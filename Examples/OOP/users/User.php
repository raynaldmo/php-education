<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 2/7/15
 * Time: 10:53 AM
 */

// Actions/data
// login, logout, preferences (alerts), contact info, active status
// date joined, billing info (payment method etc.), password
// subscription( level, cancel, change)
// payment history
// use inheritance to distinguish paying and non paying customers
class User {
  private $id;
  private $name;
  private $email;

  function getName() {
    return $this->name;
  }
  function getEmail() {
    return $this->email;
  }

  function __construct ($name="", $email="") {
    $this->name = $name;
    $this->email = $email;
  }

  function printUserInfo() {
    echo "<p><strong>$this->name</strong> : <em>$this->email</em></p>";
  }

} 