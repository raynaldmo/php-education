<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 1/19/15
 * Time: 12:28 PM
 */
$firstName = "Jon";
$homePage = "http://www.example.com/Jon";
$favoriteSport = "Ice Hockey";
$queryString = "firstName=" . urlencode( $firstName ) . "&amp;homePage=" .
  urlencode( $homePage ) . "&amp;favoriteSport=" . urlencode( $favoriteSport );
echo '<p><a href="info.php?' . $queryString . '">Find out more info on
 '. $firstName. '</a></p>';

$fields = array (
  "firstName" => "Raynald",
  "homePage" => "http://www.example.com/Raynald",
  "favoriteSport" => "Basketball"
);
echo '<p><a href="info.php?' . htmlspecialchars( http_build_query
  ( $fields ) ) . '">Find out more info on '. $fields['firstName'].'</a></p>';