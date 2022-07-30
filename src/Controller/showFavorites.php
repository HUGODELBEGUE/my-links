<?php

include '../src/Service/getAllFavorites.php';

function showFavorites(): void

{
    if (array_key_exists("user", $_SESSION)) {

        $title = " FavoriTes";
        $dbh = getConnexion();
        $allFavorites = getAllFavorites();
    } else {
        header("Location: /");
        exit;
    }
    include '../templates/favorites/showFavorites.html.php';
}
