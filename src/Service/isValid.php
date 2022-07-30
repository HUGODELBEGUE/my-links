<?php


function isValid(array &$form, &$notValidMail, &$notValidPassword): bool
{

    if ("" === $form['email']) {
        $notValidMail = "Donne ton mail stp";
    } elseif ($form['email'] && !filter_var($form['email'], FILTER_VALIDATE_EMAIL)) {
        $notValidMail = "Mail non Valide";
    }

    if ("" === $form['password']) {
        $notValidPassword = "Donne ton code stp";
    } elseif ($form['password'] && 6 > strlen($form['password'])) {
        $notValidPassword = "Minimum 6 caractères";
    }

    if (
        $notValidMail === null
        && $notValidPassword === null
    ) {
        return true;
    }
    return false;
}
