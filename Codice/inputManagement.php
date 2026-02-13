<?php
session_start();
require_once 'tools.php'; 

// 1. Inizializzazione del gioco
if (!isset($_SESSION['segreto'])) {
    $_SESSION['segreto'] = getRandomColor($arrayColori);
    $_SESSION['guess'] = [];
    $_SESSION['storico'] = [];
}

// 2. Gestione del RESET
if (isset($_POST['action']) && $_POST['action'] === 'reset') {
    $_SESSION['guess'] = [];
    $_SESSION['storico'] = [];
    $_SESSION['segreto'] = getRandomColor($arrayColori); // Genera un nuovo codice
    header("Location: dashboard.php");
    exit;
}

// 3. Gestione dell'inserimento COLORE
if (isset($_POST['colore'])) {
    $colore = strtolower(trim($_POST['colore']));

    // Verifica che il colore sia valido e che non abbiamo già 4 colori
    if (in_array($colore, $arrayColori) && count($_SESSION['guess']) < 4) {
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
    }

    header("Location: dashboard.php");
    exit;
}

// Se si accede al file senza POST, torna in dashboard
header("Location: dashboard.php");
exit;
