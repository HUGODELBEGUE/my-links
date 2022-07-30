<?php


session_start();

// On appele le fichier "routes"
$routeList = require('../config/routes.php');
// Récupaire le chemin
$url = filter_input(INPUT_SERVER, "PATH_INFO");

if ($url === null) {
    $url = '/';
}
foreach ($routeList as $key => $route) {
    if ($url === $key) {
        include "../src/Controller/" . $route['controller'];
        $route['action']();
    }
}
