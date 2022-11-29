<?php
/* 
Milestone 1
Creare un form che invii in GET la lunghezza della password. Una nostra funzione utilizzerà questo dato per generare una password casuale (composta da lettere, lettere maiuscole, numeri e simboli) da restituire all’utente. Scriviamo tutto (logica e layout) in un unico file index.php 

Milestone 2
Verificato il corretto funzionamento del nostro codice, spostiamo la logica in un file functions.php che includeremo poi nella pagina principale

Milestone 3 (BONUS)
Gestire ulteriori parametri per la password: quali caratteri usare fra numeri, lettere e simboli.
Possono essere scelti singolarmente (es. solo numeri) oppure possono essere combinati fra loro (es. numeri e simboli, oppure tutti e tre insieme). Dare all’utente anche la possibilità di permettere o meno la ripetizione di caratteri uguali.
*/

include __DIR__ . '/functions.php';

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

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: cadetblue;
        }

        .my_container {
            max-width: 70%;
            margin: auto;
        }

        .p_label {
            padding-top: calc(0.375rem + 1px);
        }
    </style>
</head>

<body>
    <div class="my_container text-center">
        <h1 class="text-white mt-5 mb-4">Strong Password Generator</h1>
        <h3 class="mb-5">Genera una password sicura</h3>
        <form action="index.php" method="post" class="my_container text-start">
            <div class="row row-cols-2 g-3 align-items-center">
                <div class="col-8">
                    <label for="length" class="col-form-label">Inserisci la lunghezza della password da generare:</label>
                </div>
                <div class="col-4">
                    <input type="number" class="form-control" name="length" id="length">
                </div>
                <div class="col-8 align-self-start">
                    <label for="rep" class="col-form-label">Consenti ripetizioni di uno o più caratteri</label>
                </div>
                <div class="col-4">
                    <div class="form-check p_label">
                        <input class="form-check-input" type="radio" name="rep" value="true" checked>
                        <label class="form-check-label" for="rep">Sì</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="rep" value="false">
                        <label class="form-check-label" for="rep">No</label>
                    </div>
                    <div class="form-check pt-4">
                        <input class="form-check-input" type="checkbox" name="letters" id="letters">
                        <label class="form-check-label" for="letters">Lettere</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="numbers" id="numbers">
                        <label class="form-check-label" for="numbers">Numeri</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="symbols" id="symbols">
                        <label class="form-check-label" for="symbols">Simboli</label>
                    </div>
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Invia</button>
                    <button type="reset" class="btn btn-secondary">Annulla</button>
                </div>
            </div>
        </form>
        <?php if (isset($_POST['length'])) {
            if ($_POST['length'] > 0) { ?>
                <h2>LA TUA PASSWORD è: <?= $randomPsw; ?></h2>
            <?php } else { ?>
                <h3>Inserisci una lunghezza corretta</h3>
        <?php }
        } ?>
    </div>



    <!-- Boostrap Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>