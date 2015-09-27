<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>DateTime Usage</title>
	<style type="text/css" media="screen">
	body {
		font-family: Verdana, Arial, Helvetica, sans-serif;
		font-size: 12px;
		margin: 10px;
	}
	label { display: inline-block; width: 80px; font-weight: bold; }
	.error { color: #F00; }
	</style>
</head>
<body>

<?php # datetime.php

// Set the start and end date as today and tomorrow by default:
$valid_dates = false;

$start = new DateTime();
$end = new DateTime();
$end->modify('+1 day');

// Default format for displaying dates:
$format = 'm/d/Y';

// This function validates a provided date string.
// The function returns an array--month, day, year--if valid.
function validate_date($date) {
	
	// Break up the string into its parts:
	$array = explode('/', $date);
	
	// Return FALSE if there aren't 3 items:
	if (count($array) != 3) return false;
	
	// Return FALSE if it's not a valid date:
	if (!checkdate($array[0], $array[1], $array[2])) return false;

	// Return the array:
	return $array;
	
} // End of validate_date() function.

// Check for a form submission:
if (isset($_POST['start'], $_POST['end'])) {

	// Call the validation function on both dates:
	if ( (list($sm, $sd, $sy) = validate_date($_POST['start']))
    && (list($em, $ed, $ey) = validate_date($_POST['end'])) ) {
		
		$valid_dates = true;

		// If it's okay, adjust the DateTime objects:
		$start->setDate($sy, $sm, $sd);
		$end->setDate($ey, $em, $ed);
		
		// The start date must come first:
		if ($start < $end) {
			
			// Determine the interval:
			$interval = $start->diff($end);
			
			// Print the results:
			echo "<p>The event has been planned starting on {$start->format($format)}
			 and ending on {$end->format($format)}, which is a period of $interval->days day(s).</p>";
			
		} else { // End date must be later!
			echo '<p class="error">The starting date must precede the ending date.</p>';
		}
			
	} else { // An invalid date!
		echo '<p class="error">One or both of the submitted dates was invalid.</p>';
	}
		
} // End of form submission.

// Show the form:
?>
<h2>Set the Start and End Dates for Event</h2>
<form action="datetime.php" method="post">
	
	<p><label for="start">Start Date:</label><input type="text"
      id="start" name="start"
      value='<?php if ($valid_dates) echo "{$start->format($format)}";
      else echo "MM/DD/YYYY"; ?>' >
  </p>
	<p><label for="end">End Date:</label><input type="text"
       id="end" name="end"
       value='<?php if ($valid_dates) echo "{$end->format($format)}";
       else echo "MM/DD/YYYY"; ?>' >
  </p>
	
	<p><input type="submit" value="Submit" /></p>
</form>

<script>
  var start = document.getElementById('start');
  var end = document.getElementById('end');
  start.onfocus= function() {
    // console.log(this);
    this.value= "";
  };
  end.onfocus = function() {
    this.value = "";
  };
</script>

</body>
</html>