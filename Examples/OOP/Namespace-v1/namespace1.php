<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Namespace-v1</title>
</head>
<body>
<p style="color:green;"> This version doesn't use a class autoloader or the 'use' operator</p>
<?php # namespace1.php

// Explicitly load class files. No autoloader is used
require('Department.php');
require('Employee.php');

// Create a department:
$hr = new \Foo\Company\Department('Accounting');

// Create employees:
$e1 = new \Foo\Company\Employee('Holden Caulfield');
$e2 = new \Foo\Company\Employee('Jane Gallagher');

// Add the employees to the department:
$hr->addEmployee($e1);
$hr->addEmployee($e2);

// Delete the objects:
unset($hr, $e1, $e2);
?>
</body>
</html>