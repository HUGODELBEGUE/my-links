<?php

function correctPassword($user, $password)
{
    if (password_verify($password, $user['password'])) {
        return true;
    }
    return false;
}
