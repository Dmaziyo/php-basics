<?php
$config = require 'config.php';

$title = "My notes";

$db = new Database($config['database']);

$currentUserId = 1;

$note = $db->query('select * from notes where id = :id', ['id' => $_GET["id"]])->fetch();

if (! $note) {
    abort();
}
if ($note['user_id'] !== $currentUserId) {
    abort(Response::FORBIDDEN);
}

require "views/note.view.php";
