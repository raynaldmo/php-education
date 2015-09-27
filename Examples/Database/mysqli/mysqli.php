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
function display_results($res) {

  // Table header:
  echo '<table class="tbl">
	<tr>
		<th>Host</th>
		<th>User</th>
	</tr>
';

  // Fetch and print all the records:
  while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
    echo '<tr>
			<td>' . $row['host'] . '</td>
			<td>' . $row['user'] . '</td>
		</tr>';
  }

  echo '</table>';

}

//----------------------------- END FUNCTIONS ---------------------------------

// Make the connection:
$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR
  die ('Could not connect to MySQL: ' . mysqli_connect_error() );

// Set the encoding...
mysqli_set_charset($dbc, 'utf8');

$query = "select host,user from user";
$res = @mysqli_query ($dbc, $query);

// Count the number of returned rows:
$num = mysqli_num_rows($res);

if ($num > 0) { // If it ran OK, display the records.

  display_results($res);

  mysqli_free_result ($res);

} else { // If no records were returned.
  echo '<p style="color:red;">No records in database.</p>';
}

mysqli_close($dbc);



