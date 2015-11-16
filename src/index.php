<?php
include_once('modele/configuration.php');
include_once('modele/connexion_sql.php');

if ($bdd == false || isMaintenance()) {
	include_once('vue/maintenance.php');
}
else {
	if( !isset($_GET['page']) ||
		$_GET['page'] == "index" || 
		$_GET['page'] == 'accueil'){
	    
	    include_once('controleur/accueil.php');


	}
	else if (isset($_GET['page']) && $_GET['page'] == 'login') {
		# Page de co
	}
	else if (isset($_POST['page']) && $_POST['page'] == 'postLogin') {
		# ou envoie le login
	}	
	else if (isset($_GET['page']) && $_GET['page'] == 'postLogin') {
		# on on affiche les messages d'erreur ou les messages de ok
	} 
	else if (isset($_GET['page']) && $_GET['page'] == 'inscription') {
		# page d'inscription
	} 
	else if (isset($_GET['page']) && $_GET['page'] == 'postInscription') {
		# on on affiche les messages d'erreur ou les messages de ok
	}
	else if (isset($_POST['page']) && $_POST['page'] == 'postInscription') {
		# ou l'on envoie le formulaire
	}
	else if (isset($_GET['page']) && $_GET['page'] == 'profile') {
		# profile d'un joueur (maybe pas tout afficher de son état ?) possibilité d'attaque ?
	}
	else if (isset($_GET['page']) && $_GET['page'] == 'liste_batiments') {
		# obvious
	}
	else if (isset($_GET['page']) && $_GET['page'] == 'batiment') {
		# Page d'un batiment : etat (prod actuelle), upgrade (cout + durée)
	}
	else if (isset($_GET['page']) && $_GET['page'] == 'liste_unites') {
		# obvious
	}
	else if (isset($_GET['page']) && $_GET['page'] == 'liste_technologies') {
		# liste des technologies acquises puis des technologies à venir (grisé)
	}
	else if (isset($_GET['page']) && $_GET['page'] == 'technologie') {
		# Affiche la technologie et auxquelles elle mène (et ses dépendances)
	}
	else if (isset($_GET['page']) && $_GET['page'] == 'carte') {
		# Affichage de la carte (liens vers les profiles depuis les cases des gens)
	}
	else if (isset($_GET['page']) && $_GET['page'] == 'management') {
		# management général (production actuelle, pleins de cvaleurs et tout et tout)
	}
	else if (isset($_GET['page']) && $_GET['page'] == 'liste_attaques') {
		# obvious
	}
	else if (isset($_GET['page']) && $_GET['page'] == 'attaque') {
		# Etat d'une attaque
	}





	else {
		$titre = "Je pense que vous êtes perdu...";
		include_once('vue/page404.php');
	}
}

