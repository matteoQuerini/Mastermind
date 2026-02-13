<?php
session_start();
require_once 'tools.php';

if(!isset($_SESSION['loggato'])){
    header("Location: index.html");
    exit;
}

// Inizializzazione minima se si accede direttamente alla pagina
if (!isset($_SESSION['guess'])) { 
    $_SESSION['guess'] = []; 
    }
if (!isset($_SESSION['storico'])) {
     $_SESSION['storico'] = []; 
     }
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mastermind - Gioco</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="dashboard-container">
        <div class="dashboard-header">
            <h1>Mastermind </h1>
            <div class="buttons">
                <form action="inputManagement.php" method="post">
                    <button type="submit" name="action" value="reset" class="reset-btn">Nuova Partita</button>
                </form>
                <button class="logout-btn" onclick="window.location.href='logout.php';">Esci</button>
                <form action="inputManagement.php" method="post">
                <button type="submit" name="action" value="undo" class="undo-btn">Annulla Ultimo</button>
                </form>
            </div>
            <form action="inputManagement.php" method="post">
                    <button type="submit" name="action" value="undo" class="undo-btn">Annulla Ultimo</button>
            </form>
        </div>

        <div class="campo">
            <h3>Il tuo tentativo attuale:</h3>
            <div class="celle">
                <?php
                //inizio ciclo per iterare i colori
                //controla con l'operatore ternario se esiste un colore in posizione i
                //se esiste assegna a colore il valore corrispondende
                //se non esiste gli assegna una stirnga vuota
                 
                for($i = 0; $i < 4; $i++){
                    $colore = isset($_SESSION['guess'][$i]) ? $_SESSION['guess'][$i] : '';
                    echo '<div class="cella ' . $colore . '"></div>';
                }
                ?>
            </div>

            <div class="controls">
                <!-- Il valore di value è quello che inviamo col from action="..."-->
                <!-- per controllare senza l'uso di javascript che pulsante l'utente ha cliccato -->
                <form action="inputManagement.php" method="post" class="color-picker">
                    <button type="submit" name="colore" value="rosso" class="btn-rosso">Rosso</button>
                    <button type="submit" name="colore" value="verde" class="btn-verde">Verde</button>
                    <button type="submit" name="colore" value="blu" class="btn-blu">Blu</button>
                    <button type="submit" name="colore" value="giallo" class="btn-giallo">Giallo</button>
                </form>
                
                
            </div>
        </div>

        <hr>

        <div class="storico-container">
            <h3>Cronologia Tentativi</h3>
            <?php if (empty($_SESSION['storico'])): ?>
                <p>Nessun tentativo effettuato. Inizia a scegliere i colori!</p>
            <?php else: ?>
                <?php 
                // Visualizziamo l'ultimo tentativo in alto
                $storicoRovesciato = array_reverse($_SESSION['storico']);
                foreach ($storicoRovesciato as $tentativo): 
                ?>
                    <div class="riga-storico">
                        <div class="mini-celle">
                            <?php foreach ($tentativo['combinazione'] as $c): ?>
                                <div class="mini-cella <?php echo $c; ?>"></div>
                            <?php endforeach; ?>
                        </div>
                        <div class="risultato-testo">
                            <strong>Neri:</strong> <?php echo $tentativo['punteggio']['corretti']; ?> (Posizione OK) | 
                            <strong>Bianchi:</strong> <?php echo $tentativo['punteggio']['presenti']; ?> (Solo Colore)
                        </div>
                    </div>
                    <?php 
                    // Messaggio di vittoria se l'utente ha fatto 4 neri
                    if ($tentativo['punteggio']['corretti'] == 4): ?>
                        <script>
                            alert("Complimenti, hai vinto!");
                        </script>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>