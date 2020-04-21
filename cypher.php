<?php
$count = array();
$counterdigraph = array();
$alphabet = "abcdefghijklmnopqrstuvwxyz";
$alpha = strtoupper($alphabet);
$tailleaphabet = strlen($alpha);
$counterdigraph = array(); //conter digraph
$empiler = ""; //empiler digraph

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

function OccurenceDigraph(){
    global $texte, $empiler, $counterdigraph, $taillemot;
    for ($i = 0; $i < $taillemot; $i++) {
        $digraph = substr($texte, $i, 2);
        $digraph = str_replace(' ', '', $digraph);//supprimer space
        if(strlen($digraph)>1){ //ssi la taille est sup a 2
            if (stristr($empiler, $digraph) === FALSE) { //extraire une chaine
                $nbredigraph = substr_count($texte, $digraph);;
                $counterdigraph[$i]['nbredigraph'] = $nbredigraph;
                $counterdigraph[$i]['digraph'] = $digraph;
                $empiler = $empiler . $digraph;
            }
        }
    }
    return array_multisort($counterdigraph, SORT_DESC);     
}

if(isset($_POST['text'])){
    $texte = $_POST['text'];
    $texte = strtoupper($texte);
    $taillemot = strlen($texte);
    $oneCharacter = serialize(OccurenceOneCharacter());
    $digraph = OccurenceDigraph();
}
?>