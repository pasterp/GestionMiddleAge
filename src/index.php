<?php
include_once('modele/configuration.php');
include_once('modele/connexion_sql.php');

if ($bdd == false) {
	include_once('vue/maintenance.php');
}
else {
	if(!isset($_GET[0])){
	    include_once('controleur/accueil.php');
	}	
}

