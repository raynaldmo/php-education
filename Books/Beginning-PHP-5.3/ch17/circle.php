<?php
$myImage = imagecreate( 500, 300 );
$myGray = imagecolorallocate( $myImage, 204, 204, 204 );
$myBlack = imagecolorallocate( $myImage, 255, 100, 0 );
imagefilledellipse( $myImage, 250, 150, 200, 200, $myBlack );
header( "Content-type: image/png" );
imagepng( $myImage );
imagedestroy( $myImage );
?>
