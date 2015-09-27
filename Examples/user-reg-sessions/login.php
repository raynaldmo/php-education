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
		
		// Set the session data:
    session_start();
    $_SESSION['user_id'] = $data['user_id'];
    $_SESSION['first_name'] = $data['first_name'];

    // For added security store the HTTP_USER_AGENT:
    $_SESSION['agent'] = md5($_SERVER['HTTP_USER_AGENT']);

		// Redirect:
		redirect_user('loggedin.php');
			
  }

  // $errors will be null or not null depending on check_login() results
  // $errors is used by login_page.inc.php script
		
	mysqli_close($dbc); // Close the database connection.

} // End of the main submit conditional.

// Create the page:
include ('includes/login_page.inc.php');
?>