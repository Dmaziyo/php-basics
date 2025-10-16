<?php
$url = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/'      => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/notes' => 'controllers/notes.php',
    '/note'  => 'controllers/note.php',
];

function abort($code = Response::NOT_FOUND)
{

    http_response_code($code);
    require "views/$code.php";
    die();
}

function routeToController($url, $routes)
{
    if (array_key_exists($url, $routes)) {
        require $routes[$url];
    } else {
        abort(Response::NOT_FOUND);
    }
}

routeToController($url, $routes);
