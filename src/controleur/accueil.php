<?php

include_once('./modele/get_statistiques.php');
include_once('./modele/ressource.php');
include_once('./modele/Unite.php');
include_once('./modele/Technologie.php');
include_once('./modele/Batiment.php');


$titre = "Accueil";
$nbJoueurs = get_nbJoueurs();
$dernierinscrit = get_dernierInscrit();
$info = "Le dernier membre à nous avoir rejoint est : ".$dernierinscrit.".";

$t = Ressource::Ressources();

include_once('./vue/accueil.php');


