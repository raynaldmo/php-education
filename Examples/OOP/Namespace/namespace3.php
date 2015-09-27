<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Namespace</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php # namespace3.php

// Include the PHP script:
// require('MyNamespace/Company/Company.php');
echo get_include_path() . '<br>';

$path = './MyNamespace/Company';
set_include_path(get_include_path() . PATH_SEPARATOR . $path);

echo get_include_path() . '<br>';


function class_loader( $path ) {
  if ( preg_match( '/\\\\/', $path) ) {
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $path );
  }

  echo "{$path}.php" . '<br>';

  if ( file_exists( "{$path}.php" ) ) {

    require_once( "{$path}.php" );
  }
}

spl_autoload_register('class_loader');

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