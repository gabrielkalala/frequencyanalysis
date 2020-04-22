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
        
        //$count[$i]['nbrelettre'] = $nbrelettre;
        //$count[$i]['lettre'] = $lettre;
        $character[$lettre] = $nbrelettre; 
    }
    $_SESSION['character'] = $character;
    $_SESSION['selectCharacter'] = $character;
    return array_multisort($_SESSION['character'], SORT_DESC);
}

function OccurenceDigraph(){ //occurence count digraph
    global $texte, $empiler, $counterdigraph, $taillemot;
    for ($i = 0; $i < $taillemot; $i++) {
        $digraph = substr($texte, $i, 2);
        $digraph = str_replace('  ', '', $digraph); //supprimer space
        $digraph = str_replace(' ', '', $digraph);//supprimer space
        if(strlen($digraph)>1){ //ssi la taille est egal 2
            if (stristr($empiler, $digraph) === FALSE) { //extraire une chaine
                $nbredigraph = substr_count($texte, $digraph);
                $counterdigraph[$i]['nbredigraph'] = $nbredigraph;
                $counterdigraph[$i]['digraph'] = $digraph;
                $empiler = $empiler . $digraph;
            }
        }
        $digraphs[$digraph] = $nbredigraph;
    }
    $_SESSION['digraphs'] = $digraphs;
    $_SESSION['selectDigraphs'] = $digraphs;
    return array_multisort($_SESSION['digraphs'], SORT_DESC);     
}

if(isset($_POST['text'])){ /// if cypher text exist
    $_SESSION['originalText'] = $_POST['text'];
    $texte = $_POST['text'];
    $texte = strtoupper($texte);
    $_SESSION['text'] = $texte;
    $taillemot = strlen($texte);
    $oneCharacter = serialize(OccurenceOneCharacter());
    $digraph = serialize(OccurenceDigraph());
}

if(isset($_SESSION['text']) && isset($_POST['swap'])){ //remplacement one character
    $one = $_SESSION['text'];
    $_SESSION['text'] = str_replace($_POST['replace'], $_POST['with'], $_SESSION['text']); //remplacement des lettre
    //delete replace character
    unset($_SESSION['selectCharacter'][$_POST['replace']]);
    $a = str_replace($_POST['with'], '', $a);
}

if (isset($_SESSION['text']) && isset($_POST['swapD'])) { //remplacement Digraphs
    $one = $_SESSION['text'];
    $_SESSION['text'] = str_replace($_POST['replaceD'], $_POST['withD'], $_SESSION['text']); //remplacement des lettre
    //delete replace digraphs
    unset($_SESSION['selectDigraphs'][$_POST['replaceD']]);
}
?>