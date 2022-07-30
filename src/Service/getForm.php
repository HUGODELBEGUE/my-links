<?php

function getForm()
{
    $form = [

        "email" => filter_input(INPUT_POST, "email"),
        "password" => filter_input(INPUT_POST, "password"),

    ];

    return $form;
}
