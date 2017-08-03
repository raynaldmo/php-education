<?php
// declare(strict_types=1);

function doubleIt(int $value) : int {
    return $value * 2;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Scalar type hinting</title>
</head>
<body>
<form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
    <p><label>Enter an integer: </label>
       <input type="number" name="integer">
    </p>
    <p><input type="submit" name="submit" value="Submit"></p>
</form>
<?php
if (isset($_POST['submit'])) {
    echo '<p>Double that number is ' . doubleIt($_POST['integer']) . '</p>';
}
?>
</body>
</html>