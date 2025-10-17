<?php
$config = require 'config.php';

$title = "My notes";

$db = new Database($config['database']);

$currentUserId = 1;

$note = $db->query('select * from notes where id = :id', ['id' => $_GET["id"]])->fetchOrAbort();

authorize($note['user_id'] !== $currentUserId);

require "views/note.view.php";
