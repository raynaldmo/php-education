<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employees</title>
</head>

<body>
  <h3>Employees</h3>
  <?php
    include('./Employee.php');
    include('./Manager.php');

    $emp1 = new Employee();
    $emp1->setName("Raynald");

    echo "{$emp1->getName()}";

    // $emp1->name = "Pancho"; // Causes error

    $manager = new Manager;
    $manager->setName('raynaldmo');
    echo "{$manager->getName()}";

  ?>
</body>
</html>

