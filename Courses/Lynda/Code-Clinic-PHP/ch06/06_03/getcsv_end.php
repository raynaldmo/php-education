<?php
ini_set('auto_detect_line_endings', '1');
$file = fopen('_assets/first_semester.csv', 'r');
while (($data = fgetcsv($file)) !== false) {
    echo implode(' | ', $data) . '<br>';
}
fclose($file);