<?php
session_start();

// esegue un controllo sul parametro action
//se vale reset significa che l'utente ha cliccato su quel pulsante
//ed imposta l'array vuoto riportando l'urente a dashboard
if (isset($_POST['action']) && $_POST['action'] === 'reset') {
    $_SESSION['guess'] = [];
    header("Location: dashboard.php");
    exit;
}


//se in color c'è un valore significa che l'utente ha cliccato uno dei pulsanti
if (isset($_POST['colore'])) {

    //operazioni di sanificazione dell'input impostando in miniscolo e togliendo spazzi
    $colore = strtolower(trim($_POST['colore']));

    if (($colore === 'rosso' || $colore === 'verde' || $colore === 'blu' || $colore === 'giallo') && count($_SESSION['guess']) < 4) {
        //[] è l'operatore di push
        $_SESSION['guess'][] = $colore;
    }
    header("Location: dashboard.php");
    exit;
}

header("Location: dashboard.php");
exit;