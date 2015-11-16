<?php

include_once('./modele/get_statistiques.php');
include_once('./modele/authentification.php');

$titre = "Accueil";
$nbJoueurs = get_nbJoueurs();
$dernierinscrit = get_dernierInscrit();

include_once('./vue/accueil.php');

