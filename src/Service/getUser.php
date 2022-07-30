<?php

function getUser($email)
{
    include '../src/Database/getConnexion.php';

    $dbh = getConnexion();
    $sth = $dbh->prepare("SELECT `id`, `email`,`password`
                                FROM `user` 
                                WHERE `email` = :email");
    $sth->execute([
        ":email" => $email,
    ]);
    $user = $sth->fetch(PDO::FETCH_ASSOC);

    return $user;
}
