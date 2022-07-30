<?php

function deleteFavorite()
{
    include '../src/Service/getFavorites.php';
    $id = filter_input(INPUT_GET, "favorites");
    if ($id !== null) {
        $dbh = getConnexion();
        $sth = $dbh->prepare("DELETE
                                        FROM user_favorites
                                        WHERE favorites_id = :deleteFav AND user_id = :user_id;
                                        DELETE
                                        FROM favorites
                                        WHERE favorites.id = :deleteFav");
        $sth->execute([
            ":deleteFav" => $id,
            ":user_id" => $_SESSION['user']['id']
        ]);
    }
    header("Location: /");
    exit;
}
