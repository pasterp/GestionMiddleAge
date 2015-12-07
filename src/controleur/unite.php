<?php 
	include_once('./modele/ressource.php');
	include_once('./modele/Unite.php');
	include_once('./modele/authentification.php');


	if (estAuthentifier()) {
    global $currentJoueur;
    $uc = $currentJoueur->getIdUnite();
    $titre="Mes Unités";
	$uni = Unite::Unites();
}else{
    retourEnTerresConnues();
}


	include_once('./vue/Unite.php');
?>