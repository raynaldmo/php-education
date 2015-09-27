<?php # Script 3.9+ - calculator.php
// Same as script 3.9 with the following additions
// add text box for estimated miles per hour
// call create_radio in a loop
// add form reset button

define ("MPH", 65); // default MPH

// This function creates a radio button.
// The function takes two arguments: the value and the name.
// The function also makes the button "sticky".
function create_radio($value, $name = 'gallon_price') {

  $value = number_format($value, 2);

	// Start the element:
	echo '<input type="radio" name="' . $name .'" value="' . $value . '"';
	
	// Check for stickiness:
	if (isset($_POST[$name]) && ($_POST[$name] == $value)) {
		echo ' checked="checked"';
	} 
	
	// Complete the element:
	echo " /> $value ";

} // End of create_radio() function.

$page_title = 'Trip Cost Calculator';
include ('../includes/header.html');

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// Minimal form validation:
	if (isset($_POST['distance'], $_POST['gallon_price'], $_POST['efficiency']) &&
	 is_numeric($_POST['distance']) && is_numeric($_POST['gallon_price']) && is_numeric($_POST['efficiency']) ) {
	
		// Calculate the results:
		$gallons = $_POST['distance'] / $_POST['efficiency'];
		$dollars = $gallons * $_POST['gallon_price'];

    if (isset($_POST['mph']) && is_numeric($_POST['mph'])) {
      $mph = $_POST['mph'];
    } else {
      $mph = MPH;
    }
    $hours = $_POST['distance']/$mph;
		
		// Print the results:
		echo '<h1>Total Estimated Cost</h1>
	    <p>The total cost of driving ' .
      $_POST['distance'] . ' miles, averaging ' .
      $_POST['efficiency'] .
      ' miles per gallon, and paying an average of $' .
      $_POST['gallon_price'] . ' per gallon, is $' .
      number_format ($dollars, 2) .
      '. If you drive at an average of ' . $mph .
      ' miles per hour, the trip will take approximately ' .
      number_format($hours, 2) . ' hours.</p>';
	
	} else { // Invalid submitted values.
		echo '<h1>Error!</h1>
		<p class="error">Please enter a valid distance, price per gallon, and fuel efficiency.</p>';
	}
	
} // End of main submission IF.

// Leave the PHP section and create the HTML form:
?>

<h1>Trip Cost Calculator</h1>
<form action="calculator.php" method="post">
	<p>Distance (in miles): <input type="text" name="distance" value="<?php if (isset($_POST['distance'])) echo $_POST['distance']; ?>" /></p>
  <p>Estimated MPH (optional): <input type="text" name="mph"
     value="<?php if (isset($_POST['mph'])) echo $_POST['mph']; ?>" />
  </p>
  <p>Ave. Price Per Gallon: <span class="input">
	<?php
    for ($i=0, $val=3.00; $i < 3; $i++, $val +=0.5) :
      create_radio($val);
    endfor;
	?>
	</span></p>
	<p>Fuel Efficiency: <select name="efficiency">
		<option value="10"<?php if (isset($_POST['efficiency']) && ($_POST['efficiency'] == '10')) echo ' selected="selected"'; ?>>Terrible</option>
		<option value="20"<?php if (isset($_POST['efficiency']) && ($_POST['efficiency'] == '20')) echo ' selected="selected"'; ?>>Decent</option>
		<option value="30"<?php if (isset($_POST['efficiency']) && ($_POST['efficiency'] == '30')) echo ' selected="selected"'; ?>>Very Good</option>
		<option value="50"<?php if (isset($_POST['efficiency']) && ($_POST['efficiency'] == '50')) echo ' selected="selected"'; ?>>Outstanding</option>
	</select></p>
	<p>
    <input type="submit" name="submit" value="Calculate!" />
    <input type="reset" value="Reset" />
  </p>
</form>

<?php include ('../includes/footer.html'); ?>