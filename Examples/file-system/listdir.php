<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>List Directory Contents</title>
  </head>
  <body>
    <h3>List Directory Contents</h3>
    <?php
      $dirPath = "/home/raynald";
      is_dir($dirPath) or die('Directory '.$dirPath.' doesn\'t exist');

      if ( !( $handle = @opendir( $dirPath ) ) ) die( "Cannot open the directory
       $dirPath" );

      $entries = array();
      while ($file = readdir($handle)) {
        if ( $file == '.' or $file == '..') continue;
        $entries[] = $file;
      }
      sort($entries);
      closedir( $handle );
    ?>

    <p><?= $dirPath ?> contains the following files and folders:</p>
    <ul>
      <?php
        foreach ($entries as $entry) {
          echo "<li>$entry</li>";
        }
      ?>
    </ul>
  </body>
</html>

