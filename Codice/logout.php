<?php
//riconnetto alla sessione per poterla distruggere
session_start();
//svuoto le variabili presenti nella sessione
session_unset();
//elimino la sessione
session_destroy();


header("Location: index.html");
exit;
?>