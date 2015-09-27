<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Rectangle</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php # rectangle2.php
/*	This page uses the revised Rectangle class.
 *	This page shows a bunch of information
 *	about a rectangle.
 */

// Include the class definition:
// require('Rectangle.php');
function __autoload($class) {
  require ($class . '.php');
}

// Define the necessary variables:
$width = 160;
$height = 75;

// Print a little introduction:
echo "<h2>With a width of $width and a height of $height...</h2>\n";
	
// Create a new object:
$r = new Rectangle($width, $height);

// these lines won't work since width and height are protected
// members
// $r->width = 160;
// $r->height = 75;


// Print the area.
echo '<p>The area of the rectangle is ' . $r->getArea() . "</p>\n";
	
// Print the perimeter.
echo '<p>The perimeter of the rectangle is ' . $r->getPerimeter() . '</p>' .
  PHP_EOL;

// Is this a square?
echo '<p>This rectangle is ';
if ($r->isSquare()) {
	echo 'also';
} else {
	echo 'not';
}
echo ' a square.</p>'. PHP_EOL;

$side = 60;
$s = new Square($side);

echo "<h2>With each side being $side...</h2>";

// Create a new object:
$s = new Square($side);

// Print the area.
echo '<p>The area of the square is ' . $s->getArea() . '</p>';

// Print the perimeter.
echo '<p>The perimeter of the square is ' . $s->getPerimeter() . '</p>';

?>
</body>
</html>