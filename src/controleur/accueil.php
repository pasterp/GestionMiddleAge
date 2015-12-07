<?php

include_once('./modele/get_statistiques.php');
include_once('./modele/ressource.php');


$titre = "Accueil";
$nbJoueurs = get_nbJoueurs();

$t = Ressource::Ressources();

include_once('./vue/accueil.php');
