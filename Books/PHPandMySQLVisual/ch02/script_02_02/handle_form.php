<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Form Feedback</title>
  </head>
  <body>
    <?php # Script 2.2 - handle_form.php

    // Create a shorthand for the form data:
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $comments = $_REQUEST['comments'];
    $age = $_REQUEST['age'];
    $gender = $_REQUEST['gender'];
    // $_REQUEST['submit']


    // Print the submitted information:
    echo "<p>Thank you, <b>$name</b>, for the following comments:<br />
    <span style='color:blue;'>$comments</span>
    <p>We will reply to you at <em>$email</em>.</p>\n";

    echo "Your age and gender were entered as $age and $gender, respectively.";

    ?>
  </body>
</html>