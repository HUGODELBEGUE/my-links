<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--La balise $title montre l'emplacement de la variable-->
    <title><?= $title ?></title>
    <link rel="stylesheet" type="text/css" href="/node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="https://github.com/favicon.ico">
    <style>
        body {
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }

        li {
            list-style-type: none;
        }
    </style>
</head>

<body class="d-flex min-vh-100 flex-column">
    <header>

        <?php include '../templates/navbar.html.php' ?>

    </header>