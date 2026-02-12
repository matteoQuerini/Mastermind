<?php

session_start();

if(!isset($_SESSION['loggato'])){
    header("Location: index.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mastermind</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="dashboard-container">
        <div class="dashboard-header">
            <h1>Benvenuto in Mastermind!</h1>
        </div>

        <div class="dashboard-content">
            <div class="welcome-card">
                <h2>Sei pronto a giocare?</h2>
                <p>
                    Hai accesso al gioco Mastermind! La tua missione è indovinare il codice segreto 
                    in pochi tentativi. Ogni tentativo ti darà indizi sul codice che devi scoprire.
                </p>
                <p>
                    <strong>Come funziona:</strong><br>
                    • Il codice è composto da 4 colori<br>
                    • I colori disponibili sono: Rosso, Verde, Blu, Giallo<br>
                    • Hai un numero limitato di tentativi<br>
                    • Gli indizi ti aiuteranno a indovinare il codice corretto
                </p>
                
                <button class="logout-btn" onclick="window.location.href='logout.php';">Esci dal gioco</button>
            </div>
        </div>
    </div>

    <div class="campo">
        <section class="griglia-colori">
            <div class="celle">
                <?php 

                //controllo dell'esistenza di un array guess nella sessione
                //se esiste lo assegna alla variabile userGuess
                //altrimenti gli assegna uno vuoto
                if (isset($_SESSION['guess'])) {
                   $userGuess = $_SESSION['guess'];
                } else {
                    $userGuess = [];
                }

                //inizio ciclo per iterare i colori
                //controla con l'operatore ternario se esiste un colore in posizione i
                //se esiste assegna a colore il valore corrispondende
                //se non esiste gli assegna una stirnga vuota
                for($i = 0; $i < 4; $i++){
                    $colore = isset($_SESSION['guess'][$i]) ? $_SESSION['guess'][$i] : '';
                    echo '<div class="cella ' . $colore . '" data-index="' . $i . '"></div>';                }
                ?>
            </div>


             <div class="controls">

                <!-- Il valore di value è quello che inviamo col from action="..."-->
                <!-- per controllare senza l'uso di javascript che pulsante l'utente ha cliccato -->

                <form action="inputManagement.php" method="post">
                    <button type="submit" name="colore" value="rosso" class="bottone-rosso">Rosso</button>
                </form>
                <form action="inputManagement.php" method="post">
                    <button type="submit" name="colore" value="verde" class="bottone-verde">Verde</button>
                </form>
                <form action="inputManagement.php" method="post">
                    <button type="submit" name="colore" value="blu" class="bottone-blu">Blu</button>
                </form>
                <form action="inputManagement.php" method="post">
                    <button type="submit" name="colore" value="giallo" class="bottone-giallo">Giallo</button>
                </form>

                <form action="inputManagement.php" method="post">
                    <button type="submit" name="action" value="reset" class="reset-btn">Reset</button>
                </form>
            </div>
        </section>
    </div>
</body>
</html>
