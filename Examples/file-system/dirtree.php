<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>List Contents of Directory</title>
  </head>
  <body>
    <h3>List Contents of Directory</h3>

    <?php
    $dirPath = "/home/raynald/Documents";

    function traverseDir( $dir ) {
      echo "<h4>Listing $dir ...</h4>";
      if ( !( $handle = opendir( $dir ) ) ) die( "Cannot open $dir." );

      $files = array();

      while ( $file = readdir( $handle ) ) {
        if ( $file != "." && $file != ".." ) {
          if ( is_dir( $dir . "/" . $file ) ) $file .= "/";
          $files[] = $file;
        }
      }
      sort( $files );

      echo "<ul>";
      foreach ( $files as $file ) echo "<li>$file</li>";
      echo '</ul>';

      // Once we get entries for directory, loop thru them
      // and if entry is directory, call travereDir recursively
      foreach ( $files as $file ) {
        if ( substr( $file,-1) == "/" ) {
          traverseDir( "$dir/" . substr( $file,0,-1) );
        }
      }
      closedir( $handle );
    }

    traverseDir( $dirPath );
    ?>
  </body>
</html>

