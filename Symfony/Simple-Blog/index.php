<?php
// index.php - controller
ini_set('display_errors', '1');


require_once 'model.php';
$posts = get_all_posts();

// include the HTML presentation code
require_once 'templates/list.php';
