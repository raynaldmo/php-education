	<!doctype html>
	<html lang="en">
	<head>
	    <meta charset="utf-8">
	    <title>Handling Exceptions</title>
	</head>
	<body>
	<?php # write_to_file.php

	// Load the class definition:
	require('WriteToFile.php');

	// Start the try...catch block:
	try {
    
	    // Create the object:
	    $fp = new WriteToFile('data.txt');
    
	    // Write the data:
	    $fp->write('This is a line of data.');
    
	    // Close the file:
	    $fp->close();
    
	    // Delete the object:
	    unset($fp);

	    // If we got this far, everything worked!
	    echo '<p>The data has been written.</p>';

	} catch (Exception $e) {
	    echo '<p>The process could not be completed because the script:<b><em>
	    ' .
        $e->getMessage() . '</b></em></p>';
	}

	echo '<p>This is the end of the script.</p>';

	?>
	</body>
	</html>