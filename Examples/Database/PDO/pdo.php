<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 1/17/15
 * Time: 3:07 PM
 */

// dsn = Database Source Name
$dsn = "mysql:host=192.168.0.252;dbname=mysql";
$username = "test";
$password = "test";

try {
  $conn = new PDO( $dsn, $username, $password );
  $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
} catch ( PDOException $e ) {
  echo "Connection failed: " . $e->getMessage();
}

$query = "SELECT host, user FROM user";

echo "<ul>";

try {
  $rows = $conn->query( $query );
  foreach ( $rows as $row ) {
    echo "<li>Host => " . $row["host"] . ", User => ". $row["user"] . "</li>";
  }
} catch ( PDOException $e ) {
  echo "Query failed: " . $e->getMessage();
}

echo "</ul>";
$conn = null;