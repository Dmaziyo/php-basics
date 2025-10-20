<?php

$config = require 'config.php';
$title  = "Create note";
$method = $_SERVER['REQUEST_METHOD'];
$errors = [];

if ($method == 'POST') {
    $maxLength = 20;
    $db   = new Database($config['database']);
    $body = $_POST['body'];
    // 判断为空
    if (isset($body)) {
        $errors['body'] = 'the content should not be empty';
    }
    // 长度校验
    if (strlen($body)>$maxLength) {
        $errors['body'] = "length should not be over $maxLength";
    }


    if (count($errors) === 0) {
        $notes = $db->query("INSERT INTO notes (body,user_id) VALUES (:body,:user_id)", ['body' => $_POST['body'], 'user_id' => 1]);
        routeToController('/notes', $routes);
    }

}

require "views/notes-create.view.php";
