<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 1/19/15
 * Time: 12:34 PM
 */

$firstName = $_GET["firstName"];
$homePage = $_GET["homePage"];
$favoriteSport = $_GET["favoriteSport"];

echo "<dl>";
echo "<dt>First name:</dt><dd>$firstName</dd>";
echo "<dt>Home page:</dt><dd>$homePage</dd>";
echo "<dt>Favorite sport:</dt><dd>$favoriteSport</dd>";
echo "</dl>";