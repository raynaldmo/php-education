<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Factory</title>
</head>
<body>
<?php # factory.php

// Load the class definitions:
// require('ShapeFactory.php');
// require('Shape.php');
// require('Triangle.php');
// require('Rectangle.php');

spl_autoload_register(function($class) {
  require $class . '.php';
});

// Minimal validation:
if (isset($_GET['submit'])) {
  if (isset($_GET['shape'], $_GET['dim'])) {

    $dim = trim($_GET['dim']);
    if ( empty($dim)) {
      die('<p class="error">Please provide dimensions in correct format.</p>');
    }

    $dim = explode(',', $dim);
    var_dump($dim);

    $dim = array_map('intval', $dim);
    var_dump($dim);

    // Create the new object:
    $obj = ShapeFactory::Create($_GET['shape'], $dim);

    // Print a little introduction:
    echo "<h2>Creating a {$_GET['shape']}...</h2>";

    // Print the area:
    echo '<p>The area is ' . $obj->getArea() . '</p>';

    // Print the perimeter:
    echo '<p>The perimeter is ' . $obj->getPerimeter() . '</p>';

  } else {
    echo '<p class="error">Please provide a shape type and size.</p>';
  }

// Delete the object:
  unset($obj);
}

?>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="get">
  <input type="radio" id="rect" name="shape" value="rectangle">Rectangle<br>
  <input type="radio" id="tri" name="shape" value="triangle">Triangle<br>
  <input type="radio" id="circ" name="shape" value="circle">Circle<br><br>
  <div>
    <input type="text" id="d" name="dim" size="30" placeholder="Dimensions
    (comma separated)">
  </div>
  <br>
  <div>
    <input type="submit" name='submit' value="Submit">
  </div>

</form>
</body>
</html>