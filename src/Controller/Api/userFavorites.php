<?php

include '../src/service/getFavorites.php';

function userFavorites()

{
    if(array_key_exists("user", $_SESSION)) {

        $favorites = getFavorites();
        header("Content-Type: application/json");
        echo json_encode($favorites);
    } else {
        header("Location: /");
        exit;
    }

}