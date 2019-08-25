<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Namespace-v1</title>
</head>
<body>
<p style="color:green">This version doesn't use a class autoloader but does use 'use' operator</p>

<?php # namespace2.php

// Explicitly load class files. No autoloader is used
require('Department.php');
require('Employee.php');

// Use 'use' operator for aliasing class names
use Foo\Company\Department;
use Foo\Company\Employee;

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