<?php include '../templates/header.html.php' ?>

<main class="row">



    <div class="col-md-6 offset-md-3 text-center">

        <style>
            li:hover .trash {
                display: inline !important;
                color: brown;
            }
        </style>

        <ul>
            <form class="input-group flex-nowrap" method="get" action="/addFavorite">
                <span class="input-group-text" id="addon-wrapping">URL</span>
                <button>Add</button>
                <input type="text" name="favorites" class="form-control" placeholder="https://" aria-label="Username" aria-describedby="addon-wrapping">
            </form>


            <?php if (array_key_exists("error", $_SESSION)) : ?>
                <div class="text-warning bg-dark"><?= $_SESSION["error"] ?></div>
            <?php endif; ?>


            <!--PHP-->
            <?php foreach ($favorites as $lien) : ?>

                <!--HTML-->
                <li>
                    <a class="d-none trash bi bi-bag-x-fill" href="/deleteFavorite?favorites=<?= $lien['id']; ?>"></a>
                    <div>
                        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                            <div class="col p-4 d-flex flex-column position-static">
                                <strong class="d-inline-block mb-2 text-success">WELCOME</strong>
                                <h3 class="mb-0">MyLinkS</h3>
                                <p class="mb-auto fw-light fst-italic">Lorem ipsum dolor sit amet consectetur,
                                    adipisicing elit. Iste atque ea quis molestias.
                                    Fugiat pariatur maxime quis culpa corporis vitae repudiandae aliquam voluptatem
                                    veniam,
                                    est atque cumque eum delectus sint!</p>


                                <a class="fs-3 text-decoration-none fw-bold" href="<?= $lien['href'] ?>" target=" _blank">
                                    <img src="?" alt="" />
                                    <?= $lien["title"] ?>
                                    <!--PHP-->
                                </a>

                            </div>
                        </div>
                    </div>

                </li>

                <!--PHP-->
            <?php endforeach; ?>

            <!--HTML-->
        </ul>
    </div>


</main>

<?php include '../templates/footer.html.php' ?>