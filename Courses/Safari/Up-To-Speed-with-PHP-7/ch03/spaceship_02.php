<?php
$file = new SplFileObject('names.csv');

// Discard the column headers
$file->getCurrentLine();

// Build a multidimensional array of the remaining lines
while (!$file->eof()) {
    $line = $file->fgetcsv();
    // Ignore empty lines
    if (!is_null($line[0])) {
        $names[] = $line;
    }
}

// Display the names
foreach ($names as $name) {
    echo implode(' ', $name) . '<br>';
}