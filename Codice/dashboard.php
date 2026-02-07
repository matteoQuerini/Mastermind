<?php

session_start();

if(isset($_SESSION['loggato'])){
    echo "Benvenuto";


} else {
    header("Location: index.html");
}


?>