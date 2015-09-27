<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Search Array</title>
  </head>
  <body>
    <h3>Search for values in an array</h3>
    <?php
      // check that all required fields have been filled in
      function hasRequired($formInput, $requiredFields) {
        // Get all <input> name attributes from
        // $_POST['email_address'] etc..
        $keys = array_keys($formInput); // ["name", "email_address"]

        foreach($requiredFields as $field) {
          if (! in_array($field, $keys)) {
            return false;
          }
        }
        return true;
      }
    // Check for form submission:
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      echo print_r($_POST);

      if ($_POST['submitted']) {
          $requiredFields = array('name', 'email_address');
          $formInput = array_filter($_POST);

          $status = hasRequired($formInput, $requiredFields);
          if ($status) {
            echo '<p style="color:green">You filled in all required fields<p>';
          } else {
            echo "<p style='color:orangered;'>You didn't fill in all required fields<p>";
          }
      }
    }

    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
      <p>
        Name: <input type="text" name="name" /><br />
        Email address: <input type="text" name="email_address" /><br />
        Age (optional): <input type="text" name="age" />
      </p>
      <p>
        <input type="submit" value="submit" name="submitted" />
      </p>
    </form>
  </body>
</html>

