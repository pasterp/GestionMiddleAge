<?php

include_once('./modele/get_statistiques.php');

$titre = "Accueil";
$nbJoueurs = get_nbJoueurs();

include_once('./vue/accueil.php');

