<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tab-separated Values</title>
    <link rel="stylesheet" type="text/css" href="tabs.css">
</head>
<body>
<?php include '../includes/csv_functions.php';
$cars = extractCsv('cars_tab.csv', 0, "\t");
?>
<table>
    <tr>
        <th>Make</th>
        <th>Year</th>
        <th>Price</th>
        <th>Mileage</th>
        <th>Description</th>
    </tr>
    <?php foreach($cars as $car) { ?>
    <tr>
        <td><?php echo $car['make']; ?></td>
        <td><?php echo $car['yearmade']; ?></td>
        <td>$<?php echo number_format($car['price'], 2); ?></td>
        <td><?php echo number_format($car['mileage']); ?></td>
        <td><?php echo $car['description']; ?></td>
    </tr>
    <?php } ?>
</table>
</body>
</html>