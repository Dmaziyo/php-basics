<?php

$title = "Create note";
$method = $_SERVER['REQUEST_METHOD'];

if($method == 'POST') {
    dd($_POST);
}

require "views/notes-create.view.php";
