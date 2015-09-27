<?php
/**
 * Created by PhpStorm.
 * User: raynald
 * Date: 5/21/15
 * Time: 10:34 AM
 */

$input = file_get_contents("php://input");
file_put_contents("php://output", $input);
?>