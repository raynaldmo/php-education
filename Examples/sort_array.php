<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Array Sort </title>
  </head>
  <body>
    <h3>Array Sort Example</h3>
    <?

      $values = array(
        'name' => 'Smitty Hawkins',
        'email_address' => 'smitty@yahoo.com',
        'age' => 32,
        'profession' => 'Wrestler',
        'status' => 'Active'
      );

      $names = array('Ray', 'Jacqueline', 'Biff', 'Putee', 'Smokey', 'Cliff');

      function userSort($a, $b) {
        echo "<p>Sort with <code>userSort</code></p>";

      }

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($_POST['submitted']) {
          $sortType = $_POST['sort_type'];
          if (preg_match('/^u/', $sortType)) {
            $sortType($values, "userSort");
            $sortType($names, "userSort");
          } else {
            $sortType($values);
            $sortType($names);
          }
        }
      }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?> " method="post">
      <p>
        <input type="radio" name="sort_type"
               value="sort" checked="checked" /> Standard<br />
        <input type="radio" name="sort_type" value="rsort" /> Reverse<br />
        <input type="radio" name="sort_type" value="usort" /> User-defined<br />
        <input type="radio" name="sort_type" value="ksort" /> Key<br />
        <input type="radio" name="sort_type" value="krsort" /> Reverse key<br />
        <input type="radio" name="sort_type"
               value="uksort" /> User-defined key<br />
        <input type="radio" name="sort_type" value="asort" /> Value<br />
        <input type="radio" name="sort_type"
               value="arsort" /> Reverse value<br />
        <input type="radio" name="sort_type"
               value="uasort" /> User-defined value<br />
      </p>

      <p><input type="submit" value="Sort" name="submitted" /></p>
    </form>

      <?
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          echo "<p>Values sorted by <code>$sortType</code></p>";
        } else {
          echo "<p>Values are unsorted</p>";
        }
      ?>
      <ul>
        <?
          foreach ($values as $key => $value) {
            echo "<li><b>{$key}</b>: {$value}</li>";
          }
        ?>
      </ul>
      <?
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          echo "<p>Names sorted by <code>$sortType</code></p>";
        } else {
          echo "<p>Names are unsorted</p>";
        }
      ?>
      <ul>
        <?
          foreach ($names as $key => $name) {
            echo "<li><b>{$key}</b>: {$name}</li>";
          }
        ?>
      </ul>
  </body>
</html>

