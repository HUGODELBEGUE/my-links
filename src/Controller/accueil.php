<?php

include '../src/Service/getFavorites.php';
include '../src/Controller/deleteFavorite.php';


function accueil()
{
    // On déclare la variable $title pour varier les titres des onglets
    $title = "MyLinKS";

    if (!array_key_exists("user", $_SESSION)) {
        header("Location: /signup");
        exit;
    }

    if (array_key_exists("error", $_SESSION)) {
        unset($_SESSION["error"]);
    }

    $favorites = getFavorites();

    include '../templates/accueil/accueil.html.php';
}
