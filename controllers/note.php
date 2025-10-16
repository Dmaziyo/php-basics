<?php
$config = require 'config.php';

$title = "My notes";

$db = new Database($config['database']);

$note = $db->query('select * from notes where id = :id', ['id' => $_GET["id"]])->fetch();

require "views/note.view.php";
