<?php

session_start();

if(isset($_SESSION['loggato'])){
    echo "Benvenuto";

    echo '<a href="logout.php"><button type="button">Logout</button></a>';

} else {
    header("Location: index.html");
}


?>