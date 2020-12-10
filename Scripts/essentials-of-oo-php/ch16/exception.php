#!/usr/bin/env php
<?php

// declare (strict_types = 1)

error_reporting(E_ALL);
ini_set('display_errors', 1);

class User { 
  private $name = '';
  private $age = 0;

  public function setName($name) {
    if (\strlen($name) < 3 || \strlen($name > 20)) {
      throw new Exception('Name must be longer than 3 character and less than 20 characters.');
    } else {
      // Trim the white spaces
      $name = trim($name);
      $this->name = $name;
    }
  }

  public function setAge($age) {
    if ($age <= 0 || $age > 120) {
      throw new Exception('Age must be greater than 0 and less than 120.');
    } else {
      // Cast into an integer type
      $age = (int)$age;
      $this-> age = $age;
    }
  }

  public function getName() {
    return $this->name; 
  }

  public function getAge() {
    return $this->age; 
  }
}

$data = [ 
          ['Ben', 4], ['Eva', 28], ['Li', 29], array('Catie', 'not yet born'), ['Sue', 1.5] 
        ];


$user = new User();
foreach ($data as $val) {
   try {
     $user->setName($val[0]);
   } catch (Exception $e) {
       echo "Invalid name $val[0].\n";
       echo "{$e->getMessage()}\n";
   }

   try {
     $user->setAge($val[1]);
   } catch (Exception $e) {
       echo "Invalid age $val[1].\n";
       echo "{$e->getMessage()}\n";
   }
}
