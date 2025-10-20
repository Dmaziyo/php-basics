<?php

$config = require 'config.php';
$title  = "Create note";
$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
    $db    = new Database($config['database']);
    $notes = $db->query("INSERT INTO notes (body,user_id) VALUES (:body,:user_id)", ['body' => $_POST['body'], 'user_id' => 1]);
    routeToController('/notes', $routes);
}

require "views/notes-create.view.php";
