<?php
/*funzione per la generazione casuale dei colori*/ 
$arrayColori = array("", "verde", "blu", "giallo");

function getRandomColor($arrayColori){
    $colori_da_Indovinare = array();

    for($i = 0; $i < 4; $i++){
        $randomInt = random_int(0, 3);
        $colori_da_Indovinare[$i] = $arrayColori[$randomInt];
    }

    return $colori_da_Indovinare;
}



/*funzione che controlla se i colori sono presenti nell'array e se sono nella posizione corretta*/
function checkGuess($randomColors, $userAnswer) {
    $posizioniCorrette = 0; 
    $soloPresenti = 0;      

    $tempSegreto = $randomColors;
    $tempUser = $userAnswer;

    /* controllo se i colori sono nella posizione corretta*/
    /*in caso assegno valore null alla posizione dell'array per evitare il conteggio nella seconda fase*/
    for ($i = 0; $i < 4; $i++) {
        if ($tempUser[$i] === $tempSegreto[$i]) {
            $posizioniCorrette++;
        
            $tempSegreto[$i] = null;
            $tempUser[$i] = null;
        }
    }

    /*controllo se i colori sono presenti nell'array da indovinare ma non nella posizione giusta*/
    for ($i = 0; $i < 4; $i++) {
        /* Salta se l'elemento è già stato verificato*/
        if ($tempUser[$i] === null) continue;

        for ($j = 0; $j < 4; $j++) {
            if ($tempSegreto[$j] !== null && $tempUser[$i] === $tempSegreto[$j]) {
                $soloPresenti++;
                $tempSegreto[$j] = null; /*assegno a null per escluderlo dalla ricerca*/ 
                break; 
            }
        }
    }

    return [
        'corretti' => $posizioniCorrette,
        'presenti' => $soloPresenti
    ];
}



?>




