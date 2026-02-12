<?php

session_start();

if(isset($_SESSION['loggato'])){
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
            <h1>Benvenuto in Mastermind! 🎯</h1>
        </div>

        <div class="dashboard-content">
            <div class="welcome-card">
                <h2>🎮 Sei pronto a giocare?</h2>
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
</body>
</html>

<?php
} else {
    header("Location: index.html");
}
?>