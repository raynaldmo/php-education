// This script handles and validates the form submission.
// This script then makes an Ajax request of login_ajax.php.

// Do something when the document is ready:
$(function() {

  // cache jQuery objects
  var $email = $('#email');
  var $emailP = $('#emailP');
  var $emailErr= $('#emailError');

  var $pwd = $('#password');
  var $pwdP = $('#passwordP');
  var $pwdErr= $('#passwordError');

  var $login = $('#login');
  var $results = $('#results');

  // Process AJAX response
  function processResponse(resp) {

    // Hide error messages if they are there
    if ($emailErr.hasClass('showError')) {
      $emailErr.removeClass('showError');
    }

    if ( $pwdErr.hasClass('showError')) {
      $pwdErr.removeClass('showError');
    }

    resp = resp.trim();

    if (resp == 'CORRECT') {
      // Hide the form:
      // $login.hide();

      $login[0].reset();

      // Show a message:
      $results.removeClass('error');
      $results.text('You are now logged in!');

    } else if (resp == 'INCORRECT') {
      $results.text('The submitted credentials do not match those on file!');
      $results.addClass('error');
    } else if (resp == 'INCOMPLETE') {
      $results.text('Please provide an email address and a password!');
      $results.addClass('error');
    } else if (resp == 'INVALID_EMAIL') {
      $results.text('Please provide a valid email address!');
      $results.addClass('error');
    }

  }

	// Assign an event handler to the form:
	$login.submit(function(evt) {

    evt.preventDefault();

		// Initialize some variables:
		var email, password;
		
		// Validate the email address:
		if ($email.val().length >= 6) {

      // Hide error message
      $emailP.removeClass('error');
      $emailErr.addClass('hideError');

			// Get the email address:
			email = $email.val();
			
		} else { // Invalid email address!

      // Show the error message:
			$emailP.addClass('error');
			$emailErr.addClass('showError')

		}
		
		// Validate the password:
		if ($pwd.val().length > 0) {

      // Hide error message
      $pwdP.removeClass('error');
      $pwdErr.addClass('hideError');

      // Get password
      password = $pwd.val();

    } else {
      // Show error message
			$pwdP.addClass('error');
			$pwdErr.addClass('showError');
		}
				
		// If appropriate, perform the Ajax request:
		if (email && password) {

      var data = {
        email : email,
        password : password
      };

      var options = {
        data: data,
        dataType :'text',
        type : 'get',
        url : 'login_ajax.php',
        success : processResponse
      };
			
			// Perform the request:
			$.ajax(options);
		
		} // End of email && password IF.
		
		// Return false to prevent an actual form submission:
		return false;
		
	}); // End of form submission.

}); // End of document ready.