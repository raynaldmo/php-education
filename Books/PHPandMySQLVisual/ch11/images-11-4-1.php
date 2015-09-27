<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Images</title>
</head>

<body>
<p>Click on an image to view it in a separate window.</p>
<ul id="image-list">
  <?php # Script 11.4-1 - images.php
  // This script lists the images in the uploads directory.

  // Set default timezone
  date_default_timezone_set('America/Los_Angeles');

  $dir = '../uploads'; // Define the directory to view.

  $files = scandir($dir); // Read all the images into an array.

  // Display each image caption as a link to the JavaScript function:
  foreach ($files as $image) {

    if (substr($image, 0, 1) != '.') { // Ignore anything starting with a period.

      // Get the image's size in pixels:
      $image_size = getimagesize ("$dir/$image");

      // Make the image's name URL-safe:
      $image_name = urlencode($image);

      // Get file size
      $file_size = round( (filesize("$dir/$image")/1024) )."kb";

      // Get file upload date
      $image_date = date('F d, Y H:i:s', filemtime("$dir/$image"));

      // Print the information:
      // echo "<li><a href=\"javascript:create_window('$image_name',
      // $image_size[0],$image_size[1])\">$image</a></li>\n";

      // echo "<li><a href=\"#\"
      //    onclick=\"create_window('$image_name',$image_size[0],
      // $image_size[1])\">$image</a></li>\n";
      echo "<li><a href='#' data-image-name='$image_name'
              data-image-width='$image_size[0]'
              data-image-height='$image_size[1]'>$image</a>
              $file_size ($image_date)
            </li>";
    } // End of the IF.

  } // End of the foreach loop.
  ?>
</ul>
<script src="js/function1.js"></script>
</body>
</html>