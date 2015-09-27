<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 2/11/15
 * Time: 5:29 PM
 */

// $file = $_SERVER['PHP_SELF'] . '?show';
// echo "<a href='$file'>View page source</a>";

echo "<a href={$_SERVER['PHP_SELF']}" . '?show>View page source</a>';

if (isset($_GET['show'])) {
  echo '<p>Page source</p><br>';
}