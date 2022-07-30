<?php

include '../src/Service/saveUser.php';
include '../src/Service/getForm.php';
include '../src/Service/isSubmit.php';
include '../src/Service/isValid.php';



function signup()
{
    if (array_key_exists("user", $_SESSION)) {
        header("Location: /");
        exit;
    }

    $title = " SignUP";

    $form = getForm();
    $notValidMail = null;
    $notValidPassword = null;
    // On crée une variable qui créer le fichier codé en md5
    // $filename = '../vars/' . md5($form['email']) . '.json';
    // On crée une variable qui cherche si le fichier est déjà existant
    // $fileExists = is_file($filename);

    if (
        isSubmit($form['email'], $form['password'])
        && isValid($form, $notValidMail, $notValidPassword)
    ) {
        try {
            // Création du fichier user
            saveUser($form['email'], $form['password']);
            // Redirection au fichier login
            header("Location: /login");
            exit;
        } catch (PDOException $e) {
            var_dump($e);
            $notValidMail = "Email existe déjà";
        }
    }

    include '../templates/signup/signup.html.php';
}
