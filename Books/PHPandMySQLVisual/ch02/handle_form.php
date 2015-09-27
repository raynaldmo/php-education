<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Form Feedback</title>
  </head>

  <body>

  <?php # Script 2.5 - handle_form.php #4

    // Print the submitted information:
    if ( !empty($_POST['name']) && !empty($_POST['comments']) && !empty($_POST['email']) ) {

      echo "<p>Thank you, <b>{$_POST['name']}</b>, for the following comments:<br>
      <span>{$_POST['comments']}</span></p>
      <p>We will reply to you at <em>{$_POST['email']}</em>.</p>\n";

    } else { // Missing form value.
      echo '<p>Please go back and fill out the form again.</p>';
    }

  ?>
  </body>
</html>