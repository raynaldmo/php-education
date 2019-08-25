<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Namespace</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php # namespace2.php

// Include the PHP script:
require('MyNamespace/Company/Department.php');
require('MyNamespace/Company/Employee.php');

// Use 'use' operator for aliasing class names
use MyNamespace\Company\Department;
use MyNamespace\Company\Employee;

// Create a department:
$hr = new Department('Accounting');

// Create employees:
$e1 = new Employee('Holden Caulfield');
$e2 = new Employee('Jane Gallagher');

// Add the employees to the department:
$hr->addEmployee($e1);
$hr->addEmployee($e2);

// Delete the objects:
unset($hr, $e1, $e2);

?>
</body>
</html>