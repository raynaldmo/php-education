<?php
// index.php
$connection = new PDO("mysql:host=localhost;dbname=blog", 'test', 'test');

$result = $connection->query('SELECT post_id, post_title FROM posts');
?>

<!DOCTYPE html>
<html>
<head>
  <title>List of Posts</title>
</head>
<body>
<h1>List of Posts</h1>
<ul>
  <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
    <li>
      <a href="/show.php?id=<?= $row['post_id'] ?>">
        <?= $row['post_title'] ?>
      </a>
    </li>
  <?php endwhile ?>
</ul>
</body>
</html>

<?php
$connection = null;
?>
