<?php # Script 10.3 - edit_user.php
// This page is for editing a user record.
// This page is accessed through view_users.php.

// Use form input values for display if defined, otherwise use the
// database entries
function resolve_form_values($row, $fn, $ln, $e) {
  // echo "<p>Entered resolve_form_values</p>";

  $arr = array();

  if (isset($fn)) {
    $arr[] = $fn;
  } else {
    echo "<p>\$fn is not defined</p>";
    $arr[] = $row[0];
  }
  if (isset($ln)) {
    $arr[] = $ln;
  } else {
    echo "<p>\$ln is not defined</p>";
    $arr[] = $row[1];
  }
  if (isset($e)) {
    $arr[] = $e;
  } else {
    echo "<p>\$e is not defined</p>";
    $arr[] = $row[2];
  }
  return $arr;

}

ini_set('display_errors', 1);

// Suppress notices
error_reporting(E_ALL & ~E_NOTICE);

$page_title = 'Edit a User';
include ('includes/header.html');
echo '<h1>Edit a User</h1>';

// Check for a valid user ID, through GET or POST:
if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { // From view_users.php
	$id = $_GET['id'];
} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // Form submission.
	$id = $_POST['id'];
} else { // No valid ID, kill the script.
	echo '<p class="error">This page has been accessed in error.</p>';
	include ('includes/footer.html'); 
	exit();
}

require_once ('mysqli_connect.php');

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$errors = array();
	
	// Check for a first name:
  $fn = "";
	if (empty($_POST['first_name'])) {
		$errors[] = 'You forgot to enter your first name.';
	} else {
		$fn = mysqli_real_escape_string($dbc, trim($_POST['first_name']));
	}
	
	// Check for a last name:
  $ln = "";
	if (empty($_POST['last_name'])) {
		$errors[] = 'You forgot to enter your last name.';
	} else {
		$ln = mysqli_real_escape_string($dbc, trim($_POST['last_name']));
	}

	// Check for an email address:
  $e = "";
	if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter your email address.';
	} else {
		$e = mysqli_real_escape_string($dbc, trim($_POST['email']));
	}

  // Check for password
  // 1. If both password boxes are empty, skip password update
  // 2. If one password box is blank and the other is empty, record error
  // message.
  // 3. If both password boxes are not empty, check that they match, if
  // not error, otherwise update password
  $p = "";
  if (empty($_POST['pass1']) && empty($_POST['pass2'])) {
    // Do nothing, this is OK
  } elseif ( ! empty($_POST['pass1']) && empty($_POST['pass2'])) {
    $errors[] = 'You forgot to confirm your password.';

  } elseif ( empty($_POST['pass1']) &&  ! empty($_POST['pass2'])) {
    $errors[] = 'You forgot to enter new password.';

  } elseif ($_POST['pass1'] != $_POST['pass2']) {
    $errors[] = 'Your new password did not match the confirmed password.';

  } else {
    $p = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
  }
	
	if (empty($errors)) { // If everything's OK.
	
		//  Test for unique email address:
		$q = "SELECT user_id FROM users WHERE email='$e' AND user_id != $id";
		$r = @mysqli_query($dbc, $q);

		if (mysqli_num_rows($r) == 0) {

			// Make the query:
      if (! empty($p)) {
        $q = "UPDATE users
			      SET first_name='$fn', last_name='$ln', email='$e', pass=SHA1('$p')
			      WHERE user_id=$id LIMIT 1";
      } else {
        $q = "UPDATE users
			      SET first_name='$fn', last_name='$ln', email='$e'
			      WHERE user_id=$id LIMIT 1";
      }


      $r = @mysqli_query ($dbc, $q);
      $affected_rows = mysqli_affected_rows($dbc);
      if ( $affected_rows == 1) { // If it ran OK.
				// Print a message:
				echo '<p>The user has been edited.</p>';

      } elseif ( $affected_rows == 0 ) {
          echo '<p>User information updated</p>';
          $status_str = mysqli_error($dbc);
          if ( ! empty($status_str)) {
            echo '<p>Query Status : ' . mysqli_error($dbc) . '</p>';
          }
			} else { // If it did not run OK.
				echo '<p class="error">The user could not be edited due to a system error. We apologize for any inconvenience.</p>'; // Public message.
				echo '<p>' . mysqli_error($dbc) . '<br />Query: ' . $q . '</p>'; // Debugging message.
			}
				
		} else { // Already registered.
			echo '<p class="error">The email address has already been registered.</p>';
		}
		
	} else { // Report the errors.

		echo '<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p>';
	
	} // End of if (empty($errors)) IF.

} // End of submit conditional.

// Always show the form...

// Retrieve the user's information:
$q = "SELECT first_name, last_name, email FROM users WHERE user_id=$id";		
$r = @mysqli_query ($dbc, $q);

if (mysqli_num_rows($r) == 1) { // Valid user ID, show the form.

	// Get the user's information:
	// $row = mysqli_fetch_array ($r, MYSQLI_NUM);
  $row = mysqli_fetch_row($r);

  // Generates NOTICE that $fn, ... are not defined
  $arr = resolve_form_values($row, $fn, $ln, $e);

	// Create the form:
	echo '<form action="edit_user.php" method="post">
  <p>First Name: <input type="text" name="first_name"
      size="15" maxlength="15"
      value="'.$arr[0].'" />
  </p>
  <p>Last Name: <input type="text" name="last_name"
    size="15" maxlength="30"
    value="' . $arr[1] . '" />
  </p>
  <p>Email Address: <input type="text" name="email"
    size="20" maxlength="60"
    value="' . $arr[2] . '"  />
  </p>
  <p>Password: <input type="password" name="pass1"
    size="20" maxlength="60" />
  </p>
  <p>Confirm Password: <input type="password" name="pass2"
    size="20" maxlength="60" />
  </p>
  <p><input type="submit" name="submit" value="Submit" /></p>
  <input type="hidden" name="id" value="' . $id . '" />
</form>';

} else { // Not a valid user ID.
	echo '<p class="error">This page has been accessed in error.</p>';
}

mysqli_close($dbc);
		
include ('includes/footer.html');
?>