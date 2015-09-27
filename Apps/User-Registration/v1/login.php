<?php # Script 12.3 - login-12-3.php
// Main login page
// This page processes the login form submission.
// Upon successful login, the user is redirected.
// Two included files are necessary.
// Send NOTHING to the Web browser prior to the setcookie() lines!

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// For processing the login:
	require ('includes/login_functions.inc.php');
	
	// Need the database connection:
	require ('./mysqli_connect.php');
		
	// Check the login:
	list ($check, $errors, $data) = check_login($dbc, $_POST['email'],
    $_POST['pass']);
	
	if ($check) { // OK!
		
		// Set the cookies:
		// setcookie ('user_id', $data['user_id']);
		// setcookie ('first_name', $data['first_name']);

    setcookie ('user_id', $data['user_id'], time()+3600, '/', '', 0, 0);
    setcookie ('first_name', $data['first_name'], time()+3600, '/', '', 0, 0);

		// Redirect:
		redirect_user('loggedin.php');
			
  }

  // $errors will be null or not depending on check_login() results
  // $errors is used by login_page.inc.php script
		
	mysqli_close($dbc); // Close the database connection.

} // End of the main submit conditional.

// Create the page:
include ('includes/login_page.inc.php');
?>