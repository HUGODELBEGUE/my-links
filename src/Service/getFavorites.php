<?php

include '../src/Database/getConnexion.php';


// Ajoute le favorite à la page accueil
function getFavorites()
{
    $dbh = getConnexion();
    $sth = $dbh->prepare("SELECT * 
                                FROM `user_favorites` 
                                JOIN `favorites`                                
                                ON `user_favorites`.`favorites_id` = `favorites`.`id`
                                WHERE `user_favorites`.`user_id` = :userinfo
                                ORDER BY `favorites`.`id` DESC");

    $sth->execute([
        ":userinfo" => $_SESSION['user']['id']
    ]);
    $favorites = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $favorites;
}
