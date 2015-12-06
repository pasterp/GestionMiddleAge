<?php
include_once('./modele/Technologie.php');
include_once('./modele/joueur.php');
include_once('./modele/authentification.php');


if (estAuthentifier()) {
    global $currentJoueur;
    $tc = $currentJoueur->getTechLink();
    $titre="Recherches Technologiques";
    $tech1 = Technologie::Technologies();
    $techConnues = array();
    $techInconnues = array();
    foreach ($tech1 as $t){
        $b = false;
        foreach($tc as $m){
            if ($t->getIdTech() == $m[0]){
                $b = true;
            }
        }
        if($b){
            array_push($techConnues, $t);
        }else{
            array_push($techInconnues, $t);
        }
    }
}else{
    retourEnTerresConnues();
}


	include_once('./vue/Technologie.php');