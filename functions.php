<?php
$letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$numbers = '0123456789';
$symbols = '@#!$%&?';


$characters = '';

if (isset($_POST['letters'])) {
    // var_dump('vuole lettere');
    $characters .= $letters;
}
if (isset($_POST['numbers'])) {
    // var_dump('vuole numeri');
    $characters .= $numbers;
}
if (isset($_POST['symbols'])) {
    //var_dump('vuole simboli');
    $characters .= $symbols;
}
//var_dump($_POST['length']);
//var_dump($characters);
//var_dump($_POST['rep']);
if (isset($_POST['rep'])) {
    //var_dump($_POST['rep']);
    $randomPsw = getRandomPassword($_POST['length'], $characters, $_POST['rep']);
}

function getRandomPassword($pswLength, $permittedChars, $reps)
{
    $password = '';

    for ($i = 0; $i < $pswLength; $i++) {
        $index = mt_rand(0, strlen($permittedChars) - 1);
        if ($reps) {
            if (!str_contains($password, $permittedChars[$index])) {
                $password .= $permittedChars[$index];
            } else {
                $i--;
            }
        } else {
            $password .= $permittedChars[$index];
        }
    }

    return $password;
}
