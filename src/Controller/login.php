<?php


include '../src/Service/getUser.php';
include '../src/Service/getForm.php';
include '../src/Service/isValid.php';
include '../src/Service/isSubmit.php';
include '../src/Service/correctPassword.php';


function login()
{
    if (array_key_exists("user", $_SESSION)) {
        header("Location: /");
        exit;
    }

    $title = " LogiN";

    $form = getForm();
    $notValidMail = null;
    $notValidPassword = null;
    $filename = '../vars/' . md5($form['email']) . '.json';


    if (
        isSubmit($form['email'], $form['password'])
        && isValid($form, $notValidMail, $notValidPassword)
    ) {


        $user = getUser($form['email']);


        if (correctPassword($user, $form['password'])) {

            session_start();
            $_SESSION['user'] = $user;


            header("Location: /");
            exit;
        }
    } else if (isSubmit($form['email'], $form['password'])) {

        $notValidPassword = "Identifiants invalides";
    }
    include '../templates/login/login.html.php';
}
