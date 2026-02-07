<?php
/*funzione per la generazione casuale dei colori*/ 
$arrayColori = array("rosso", "verde", "blu", "giallo");

function getRandomColor($arrayColori){
    $colori_da_Indovinare = array();

    for($i = 0; $i < 4; $i++){
        $randomInt = random_int(0, 3);
        $colori_da_Indovinare[$i] = $arrayColori[$randomInt];
    }

    return $colori_da_Indovinare;
}

/* funzione di print colori necessaria in fase di sviluppo - temporanea*/
function printArray($array){
    for($i = 0; $i < count($array); $i++){
        echo $array[$i] . " ";
    }
}

$randomColors = getRandomColor($arrayColori);
printArray($randomColors);
/*---------------------------------------------------------------------------------------*/ 
?>
