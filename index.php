<?php
// require 'function.php';
// require 'router.php';

// connect to mysql
$dsn = "mysql:host=localhost;port=3306;dbname=php-course;charset=utf8mb4";

$pdo = new PDO($dsn,"root","root");

$statement = $pdo->prepare("select * from posts");
$statement->execute();

$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as $post) {
    echo "<li>{$post['title']}</li>";
}
