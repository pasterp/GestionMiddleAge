<?php

include_once('./modele/get_statistiques.php');
include_once('./modele/ressource.php');
include_once('./modele/joueur.php');

$titre = "Accueil";
$nbJoueurs = get_nbJoueurs();
$dernierinscrit = end(Joueur::Joueurs());
$info = "Le dernier membre à nous avoir rejoint est : ".$dernierinscrit->getPseudo().".";

$t = Ressource::Ressources();

include_once('./vue/accueil.php');

