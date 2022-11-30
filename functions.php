<?php
session_start();

$letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$numbers = '0123456789';
$symbols = '@#!$%&?';

$characters = '';

if (isset($_GET['letters'])) {
    // var_dump('vuole lettere');
    $characters .= $letters;
}
if (isset($_GET['numbers'])) {
    // var_dump('vuole numeri');
    $characters .= $numbers;
}
if (isset($_GET['symbols'])) {
    //var_dump('vuole simboli');
    $characters .= $symbols;
}

if (isset($_GET['rep'])) {
    //var_dump($_GET['rep']);
    $randomPsw = getRandomPassword($_GET['length'], $characters, $_GET['rep']);
}

if (isset($_GET['length']) > 0) {
    header('Location: ./password.php');
}

if (isset($randomPsw)) {
    $_SESSION["passGen"] = $randomPsw;
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
