<?php
/* 
Milestone 1
Creare un form che invii in GET la lunghezza della password. Una nostra funzione utilizzerà questo dato per generare una password casuale (composta da lettere, lettere maiuscole, numeri e simboli) da restituire all’utente. Scriviamo tutto (logica e layout) in un unico file index.php 
*/
function getRandomPassword($pswLength)
{
    $permittedChars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@#!$%&?';
    $password = '';

    for ($i = 0; $i < $pswLength; $i++) {
        $index = mt_rand(0, strlen($permittedChars) - 1);
        $password .= $permittedChars[$index];
    }

    return $password;
}

$randomPsw = getRandomPassword($_GET['length']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Generator</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <form action="index.php" method="get">
        <label for="length">Inserisci la lunghezza della password da generare:</label>
        <input type="number" name="length" id="length">
        <div>
            <button type="submit">Invia</button>
            <button type="reset">Annulla</button>
        </div>
    </form>
    <?php if (isset($_GET['length'])) {
        if ($_GET['length'] > 0) { ?>
            <h1>LA TUA PASSWORD è: <?= $randomPsw; ?></h1>
        <?php } else { ?>
            <h2>Inserisci una lunghezza corretta</h2>
    <?php }
    } ?>

</body>

</html>