<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Form Feedback</title>
    <style>
      p.error { color: orangered;}
    </style>
  </head>
  <body>
    <?php
      // Get the checked selection
      if (isset($_POST['preferences'])) {

        // preferences is an array
        $preferences = $_POST['preferences'];
        $num = count($preferences);
        if ($num == 1) {
          echo "<p>Your preference is <em>$preferences[0]</em></p>";
        } else {
          echo "<p>Your preferences are: <em>";
          foreach($preferences as $preference) {
            echo "$preference ";
          }
          echo "</em></p>";
        }
      } else {
        $preferences = NULL;
        echo '<p class="error">You forgot to make a selection</p>';
      }
    ?>
  </body>
</html>

