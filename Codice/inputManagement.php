<?php
session_start();
require_once 'tools.php';

$counterTentativi = count($_SESSION['storico']); // Conta i tentativi fatti finora

// 1. Inizializzazione del gioco
if (!isset($_SESSION['segreto'])) {
    $_SESSION['segreto'] = getRandomColor($arrayColori);
    $_SESSION['guess'] = [];
    $_SESSION['storico'] = [];
}

// esegue un controllo sul parametro action
//se vale reset significa che l'utente ha cliccato su quel pulsante
//ed imposta l'array vuoto riportando l'urente a dashboard
if (isset($_POST['action']) && $_POST['action'] === 'reset') {
    $_SESSION['guess'] = [];
    $_SESSION['storico'] = [];
    $_SESSION['segreto'] = getRandomColor($arrayColori); // Genera un nuovo codice
    header("Location: dashboard.php");
    exit;
}

// Gestione del tasto ANNULLA
if (isset($_POST['action']) && $_POST['action'] === 'undo') {
    if (!empty($_SESSION['guess'])) {
        array_pop($_SESSION['guess']); // Rimuove l'ultimo colore inserito
    }
    header("Location: dashboard.php");
    exit;
}

//se in color c'è un valore significa che l'utente ha cliccato uno dei pulsanti
if (isset($_POST['colore'])) {

    //operazioni di sanificazione dell'input impostando in miniscolo e togliendo spazzi
    $colore = strtolower(trim($_POST['colore']));

    // Verifica che il colore sia valido e che non abbiamo già 4 colori
    if (in_array($colore, $arrayColori) && count($_SESSION['guess']) < 4) {
        //[] è l'operatore di push    
        $_SESSION['guess'][] = $colore;
    }

    // 4. CONTROLLO AUTOMATICO: se arriviamo a 4 colori, verifichiamo il tentativo
    if (count($_SESSION['guess']) === 4) {
        $risultato = checkGuess($_SESSION['segreto'], $_SESSION['guess']);

        // Salviamo il tentativo e il risultato nello storico
        $_SESSION['storico'][] = [
            'combinazione' => $_SESSION['guess'],
            'punteggio' => $risultato
        ];

        // Svuotiamo l'array temporaneo per il prossimo tentativo
        $_SESSION['guess'] = [];


        if (count($_SESSION['storico']) >= 8) {
            $_SESSION['guess'] = [];
            $_SESSION['storico'] = [];
            $_SESSION['segreto'] = getRandomColor($arrayColori);
            echo '<script>alert("Hai perso, il gioco verrà resettato!"); window.location.href = "dashboard.php";</script>';
            exit;
        }
        // Se si accede al file senza POST, torna in dashboard
        header("Location: dashboard.php");
        exit;
    }

    header("Location: dashboard.php");
    exit;
}
