<?php
function getRandomPassword($pswLength)
{
    $permittedChars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@#!$%&?';
    $password = '';

    for ($i = 0; $i < $pswLength; $i++) {
        $index = mt_rand(0, strlen($permittedChars) - 1);
        if (!str_contains($password, $permittedChars[$index])) {
            $password .= $permittedChars[$index];
        }
    }

    return $password;
}
