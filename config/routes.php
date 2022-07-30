<?php


return [
    "/" => [
        "controller" => "accueil.php",
        "action" => "accueil",
    ],
    "/signup" => [
        "controller" => "signup.php",
        "action" => "signup",
    ],
    "/login" => [
        "controller" => "login.php",
        "action" => "login",
    ],
    "/logout" => [
        "controller" => "logout.php",
        "action" => "logout",
    ],
    "/addFavorite" => [
        "controller" => "addFavorite.php",
        "action" => "addFavorite",
    ],
    "/deleteFavorite" => [
        "controller" => "deleteFavorite.php",
        "action" => "deleteFavorite",
    ],
    "/showFavorites" => [
        "controller" => "showFavorites.php",
        "action" => "showFavorites",
    ],
    "/api/showFavorites" => [
        "controller" => "Api/showFavorites.php",
        "action" => "showFavorites",
    ],
    "/api/userFavorites" => [
        "controller" => "Api/userFavorites.php",
        "action" => "userFavorites",
    ],
];


