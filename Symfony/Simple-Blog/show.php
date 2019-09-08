<?php
// show.php

ini_set('display_errors', '1');

require_once 'model.php';

$post = get_post_by_id($_GET['id']);

require 'templates/show.php';
