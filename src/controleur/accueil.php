<?php

include_once('./modele/get_statistiques.php');

$titre = "Accueil";
$nbJoueurs = get_nbJoueurs();
$dernierinscrit = get_dernierInscrit();

$info = "Le dernier membre à nous avoir rejoint est : ".$dernierinscrit.".";

include_once('./vue/accueil.php');

