<?php include '../templates/header.html.php' ?>

    <nav class="navbar navbar-light bg-dark container-fluid justify-content-end">
        <a class="btn btn-outline-success me-2" href="/showFavorites?button=newest">
            Newest
        </a>
        <a class="btn btn-outline-danger me-2" href="/showFavorites?button=older">
            Older
        </a>
    </nav>

    <main>
<!--         <iframe width="560" height="315" src="https://www.youtube.com/embed/OZLUa8JUR18" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>-->
            <div class="row">
                <h1 class="col-12 text-center">FavoriTes</h1>
            </div>

        <ul class="favoriteContainer">

            <?php foreach ($allFavorites as $lien) : ?>

                <li>
                    <div class="link card border-warning mb-3" style="max-width: 18rem;">
                        <div class="card-body">
                            <a class="card-title fs-3 text-decoration-none fw-bold" href="<?= $lien['href'] ?>"
                               target=" _blank"><img src="?" alt=""/>
                                <?= $lien["title"] ?>
                            </a>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a class="btn btn-danger" href="/addFavorite?favorites=<?= $lien['href'] ?>">Add</a>
                        </div>
                    </div>
                </li>

            <?php endforeach; ?>

        </ul>

        <div class="spinner-container text-center d-none">
            <div class="spinner-grow text-danger" style="width: 3rem; height: 3rem;" role="status"></div>
            <div class="sr-only">Loading...</div>
        </div>

    </main>

    <script>
        const getFavoritesUser = () => {
           let userFavorites = []
            const xhr = new XMLHttpRequest();
            xhr.open("GET", "/api/userFavorites", false)
            xhr.onload = () => {
                const data = JSON.parse(xhr.response);
               userFavorites = data;
            }
            xhr.send();
            return userFavorites;
        };

        const onScroll = () => {
            if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight - 1) {
                document.querySelector(".spinner-container").classList.remove("d-none");
                creatList();
                window.removeEventListener("scroll", onScroll);
            }
        };

        const creatList = () => {
            const xhr = new XMLHttpRequest();
            xhr.open("GET", `/api/showFavorites?offset=${document.querySelectorAll(".link").length}`);
            xhr.onload = () => {
                const data = JSON.parse(xhr.response);
                document.querySelector(".spinner-container").classList.add("d-none");
                const favoriteContainer = document.querySelector("main .favoriteContainer");
                data.forEach((value, key) => {
                    favoriteContainer.innerHTML += getHTMLFavorite(value);
                });
                if (0 !== data.length) {
                window.addEventListener("scroll", onScroll);
                }
            };
            xhr.send();
        };

        const getHTMLFavorite = (favorite) => {
            return `
             <li>
                    <div class="link card border-warning mb-3" style="max-width: 18rem;">
                        <div class="card-body">
                            <a class="card-title fs-3 text-decoration-none fw-bold" href="${favorite.href}"
                               target=" _blank"><img src="?" alt=""/>
                                ${favorite.title}
                            </a>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a class="btn btn-danger" href="/addFavorite?favorites=">Add</a>
                        </div>
                    </div>
                </li>
                `;
        };

        window.addEventListener("scroll", onScroll);
    </script>

<?php include '../templates/footer.html.php' ?>