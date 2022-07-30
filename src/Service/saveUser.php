<?php

include '../src/Database/getConnexion.php';

function saveUser(
    string $email,
    string $password
): bool {

    // Connection mySQL
    $dbh = getConnexion();

    // Préparer ma requête
    $sth = $dbh->prepare("INSERT INTO `user`"
        . "(`email`, `password`)"
        . "VALUES (:email, :password)");


    // Executer ma requête
    $sth->execute([
        ":email" => $email,
        ":password" => password_hash($password, PASSWORD_DEFAULT)
    ]);

    return true;
}
