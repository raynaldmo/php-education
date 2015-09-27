<?php
$myImage = imagecreate( 200, 100 );
$myGray = imagecolorallocate( $myImage, 204, 204, 204 );
$myBlack = imagecolorallocate( $myImage, 0, 0, 0 );
imageellipse( $myImage, 90, 60, 160, 50, $myBlack );
header( "Content-type: image/png" );
imagepng( $myImage );
imagedestroy( $myImage );
?>
