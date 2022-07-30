<?php

include '../src/Database/getConnexion.php';

function getAllFavorites(int $offset = 0): array
{
    $button = filter_input(INPUT_GET, "button");
    $dbh = getConnexion();

    if ($button === "newest") {
        $sort = "asc";
    } elseif ($button === "older" || $button === null) {
        $sort = "desc";
    }
    $sth = $dbh->prepare("SELECT `id`, `href`, `title`
                                        FROM `favorites`
                                        GROUP BY `href`
                                        ORDER BY `id`
                                        $sort
                                        LIMIT 3
                                        OFFSET $offset");
    $sth->execute();
    $allFavorites = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $allFavorites;
}
