<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 1/5/15
 * Time: 11:25 AM
 */

// Set the database access information as constants:
DEFINE ('DB_USER', 'sampadm');
DEFINE ('DB_PASSWORD', 'secret');
DEFINE ('DB_HOST', '192.168.0.252');
DEFINE ('DB_NAME', 'mysql');

//------------------- FUNCTIONS -----------------------------------

// display database query results
// Notice the use of type-hinting
function display_results(mysqli_result $res) {

  // Table header:
  echo '<table class="tbl">
	<tr>
		<th>Host</th>
		<th>User</th>
	</tr>
';

  // Fetch and print all the records:
  while ($row = $res->fetch_object()) {
    echo '<tr>
			<td>' . $row->host . '</td>
			<td>' . $row->user . '</td>
		</tr>';
  }

  echo '</table>';

}

//----------------------------- END FUNCTIONS ---------------------------------

// Connect to DB
$mysqli = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($mysqli instanceof mysqli) {
  echo "<p>\$mysqli is instance of mysqli</p>";
} else {
  echo "<p>\$mysqli is NOT instance of mysqli</p>";
}

if (isset($mysqli)) {
  echo "<p>\$mysqli is set</p>";
} else {
  echo "<p>\$mysqli is NOT set</p>";
}

// Verify connection
if ($mysqli->connect_errno) {
  echo "<p class='status-error'>Failed to connect to MySQL: (" .
    $mysqli->connect_errno . ") " . $mysqli->connect_error . "</p>";
  unset($mysqli); // No really necessary
  exit();
} else {
  echo "<p class='status-success'>Connected ok!</p>";
}

// Establish character encoding
$mysqli->set_charset('utf-8');

// Make query
$query = "select host,user from user";

if ($res = $mysqli->query($query, MYSQLI_STORE_RESULT)) {
  display_results($res);

  $res->free();

} else { // If no records were returned.
  echo "<p class='status-error'>Query failed: (" . $mysqli->errno
    . ") " . $mysqli->error;
}

$mysqli->close();

unset($mysqli); // Not really necessary

