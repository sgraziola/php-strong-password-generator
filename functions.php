<?php
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
