<?php


function isSubmit($email, $password)
{
    if (
        null !== $email &&
        null !== $password
    ) {
        return true;
    }
    return false;
}
