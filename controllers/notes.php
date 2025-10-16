<?php
$config = require 'config.php';

$title = "My notes";

// $id = $_GET['id'];

$db = new Database($config['database']);

$notes = $db->query('select * from notes where user_id = 1')->fetchAll();


require "views/notes.view.php";
