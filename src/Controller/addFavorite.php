<?php

include '../src/Database/getConnexion.php';


// Ajoute un favorite à la Base De Données
function addFavorite()
{
    $url = filter_input(INPUT_GET, "favorites");
    $userLogin = array_key_exists("user", $_SESSION);

    if ($userLogin === false) {
        header("Location: /");
        exit;
    }
    if (filter_var($url, FILTER_VALIDATE_URL)) {
        $source = file_get_contents($url);
        $title = explode("<title>", $source);
        $dbh = getConnexion();

        $dbh->beginTransaction();
        try {
            $sth = $dbh->prepare("INSERT INTO `favorites`"
                . "(`href`, `title`, `description`)"
                . "VALUES (:href, :title, :description)");

            $sth->execute([
                "href" => $url,
                "title" => explode("</title>", $title[1])[0],
                "description" => "??",
               // "preview" => "??"
            ]);
            $sth = $dbh->prepare("INSERT INTO `user_favorites`"
                . "(`user_id`, `favorites_id`)"
                . "VALUES (:user_id, :favorites_id)");
            $sth->execute([
                ":user_id" => $_SESSION['user']['id'],
                ":favorites_id" => $dbh->lastInsertId()
            ]);
            $dbh->commit();
        } catch (Throwable $e) {
            $dbh->rollBack();
        }
    } else {
        $_SESSION["error"] = "! URL non Valide !";
    }
    header("Location: /");
    exit;
}
