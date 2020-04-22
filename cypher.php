<?php
session_start();
//tableau OneCharacter
$a = "abcdefghijklmnopqrstuvwxyz";
//tableau digraph
$b = array('TH', 'HE', 'IN', 'ER', 'AN', 'RE', 'ND', 'AT', 'ON', 'NT', 'HA', 'ES', 'ST', 'EN', 'ED', 'TO', 'IT', 'OU', 'EA', 'HI', 'IS', 'OR');
//alphabet
$c = "abcdefghijklmnopqrstuvwxyz";


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
        $nbrelettre = substr_count($texte, $lettre);//nbre occurence
        
        $count[$i]['nbrelettre'] = $nbrelettre;
        $count[$i]['lettre'] = $lettre;
        $character[$lettre] = $nbrelettre; 
    }
    $_SESSION['character'] = $character;
    //var_dump($_SESSION['character']); //ar_dump($character);
    return array_multisort($_SESSION['character'], SORT_DESC);
}

function OccurenceDigraph(){ //occurence count digraph
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

if(isset($_POST['text'])){ /// if cypher text exist
    $_SESSION['originalText'] = $_POST['text'];
    $texte = $_POST['text'];
    $texte = strtoupper($texte);
    $_SESSION['text'] = $texte;
    $taillemot = strlen($texte);
    $oneCharacter = serialize(OccurenceOneCharacter());
    $digraph = OccurenceDigraph();
}
if(isset($_SESSION['text']) && isset($_POST['swap'])){ //remplacement one character
    $one = $_SESSION['text'];
    $_SESSION['text'] = str_replace($_POST['replace'], $_POST['with'], $_SESSION['text']); //remplacement des lettre
    //var_dump($_SESSION['text']); var_dump($_POST['replace']); var_dump($_POST['with']);
}
?>