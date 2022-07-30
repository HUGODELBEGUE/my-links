<nav class="navbar navbar-expand-md navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand fs-2 fw-bold" href="">MyLinkS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link active btn-lg btn-info font-monospace" aria-current="page" href="/">Links</a>
                </li>

                <?php if (!array_key_exists('user', $_SESSION)) : ?>
                    <li class="nav-item">
                        <a class="nav-link btn-lg btn-warning font-monospace" href="/signup">SignUp</a>
                    </li>
                <?php endif; ?>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle btn-lg btn-secondary" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        MENU
                    </a>
                    <ul class="dropdown-menu text-center" aria-labelledby="navbarDropdown">

                        <?php if (!array_key_exists('user', $_SESSION)) : ?>
                            <li><a class="dropdown-item fs-5 font-monospace" href="/login">Login</a></li>
                        <?php endif; ?>

                        <?php if (array_key_exists("user", $_SESSION)) : ?>
                            <li><a class="dropdown-item fs-5 font-monospace" href="/logout">Logout</a></li>
                        <?php endif; ?>


                    </ul>
                </li>

                <?php if (array_key_exists('user', $_SESSION)) : ?>
                    <li class="nav-item">
                        <a class="nav-link btn-lg btn-warning font-monospace" href="/showFavorites">FavoriTes</a>
                    </li>
                <?php endif; ?>

            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>