<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tab-separated Values</title>
    <link rel="stylesheet" type="text/css" href="tabs.css">
</head>
<body>
<?php include '../includes/csv_functions.php';
echo tableFromCsv('cars_tab.csv');
?>
</body>
</html>