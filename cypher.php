<?php
$count = array();
$alphabet = "abcdefghijklmnopqrstuvwxyz";
$alpha = strtoupper($alphabet);
$_POST['cryptext']='hvg bfy fc y tg y yh se  awer rt  yth 6y uy uk pl c x  gbh gn';
$texte = $_POST['cryptext'];
$texte = strtoupper($texte);
$tailleaphabet = strlen($alpha);

function OccurenceOneCharacter(){ //cmpte nombre d'occurence
    global $tailleaphabet, $alpha, $texte, $count; 
    for ($i = 0; $i < $tailleaphabet; $i++) { 
        $lettre = substr($alpha, $i, 1);
        $nbrelettre = substr_count($texte, $lettre);

        $count[$i]['nbrelettre'] = $nbrelettre;
        $count[$i]['lettre'] = $lettre; 
    }
    return array_multisort($count, SORT_DESC);
}
OccurenceOneCharacter();
?>