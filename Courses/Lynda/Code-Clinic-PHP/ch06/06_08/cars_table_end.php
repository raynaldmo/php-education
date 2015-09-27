<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tab-separated Values</title>
    <link rel="stylesheet" type="text/css" href="tabs.css">
</head>
<body>
<?php require_once 'includes/csv_functions.php';
$options['delimiter'] = "\t";
echo tableFromCsv('cars_tab.csv', true, $options);
?>
</body>
</html>