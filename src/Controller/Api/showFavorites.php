<?php

include '../src/Service/getAllFavorites.php';

function showFavorites(): void

{
    if (array_key_exists("user", $_SESSION)) {

        $title = " FavoriTes";
        $dbh = getConnexion();
        $offset = filter_input(INPUT_GET, "offset");
        if (null === $offset) {
            $offset = 0;
        }
        $allFavorites = getAllFavorites($offset);
        header("Content-Type: application/json");
        echo json_encode($allFavorites);
    } else {
        header("Location: /");
        exit;
    }
}

