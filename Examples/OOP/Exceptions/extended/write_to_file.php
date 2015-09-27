<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Extending Exceptions</title>
</head>
<body>
<?php # write_to_file.php

// Load the class definition:
require 'FileException.php';
require 'WriteToFile.php';

try {
   
    // Create the object:
    $fp = new WriteToFile('data.txt', 'w');
   
    // Write the data:
    $fp->write('This is a line of data.');
   
    // Close the file:
    $fp->close();
   
    // Delete the object:
    unset($fp);

    // If we got this far, everything worked!
    echo '<p>The data has been written.</p>';

} catch (FileException $e) {
    echo '<p>The process could not be completed. Debugging information:<br>' .
      $e->getMessage() . '<br>' . $e->getDetails() . '</p>';
}

echo '<p>This is the end of the script.</p>';

?>
</body>
</html>