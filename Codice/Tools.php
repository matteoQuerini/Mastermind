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
/*funzione che controlla se i colori della risposta dell'utente sono presenti nell'array
e in caso se sono nella posizione corretta*/
function checkUserAnswer($randomColors , $UserAnswer){
    for($j = 0; $j < 4; $j++){
    for($i = 0; $i < 4; $i++){
     if($randomColors[$i] ==  $UserAnswer[$j]){
        
     }
    }
}

}
?>
