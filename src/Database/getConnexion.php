<?php

function getConnexion(): PDO
{

    return new PDO(
        "mysql:host=localhost:3306;dbname=my_links;charset=UTF8",
        "root",
        "",
    );
}
