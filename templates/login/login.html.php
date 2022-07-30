<?php include '../templates/header.html.php' ?>

<main>

    <form class="container" method="post" action="">
        <div class="row">
            <h1 class="col-12 text-center">LogiN</h1>
        </div>
        <div class="row">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input value="<?php filter_var($form['email'], FILTER_SANITIZE_FULL_SPECIAL_CHARS); ?>" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                <div class="text-danger"><?= $notValidMail ?></div>

            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                <div class="text-danger"><?= $notValidPassword ?></div>


            </div>
        </div>
        <button type="submit" class="btn btn-primary">Confirme</button>

        </div>
        <!-- <img class="position-absolute top-50 start-50 translate-middle" src="<?= $form['image'] ?>" /> -->
    </form>

</main>

<?php include '../templates/footer.html.php' ?>