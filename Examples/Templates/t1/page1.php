<?php
$page_title = 'Page 1';
include ('includes/header.html');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // process post request
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
  // process get request
}

?>

<h1><?=$page_title?></h1>

<?php
include ('includes/footer.html');
?>