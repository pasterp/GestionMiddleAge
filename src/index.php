 <?php
error_reporting(E_ALL);
session_start();
include_once('modele/configuration.php');
include_once('modele/connexion_sql.php');

if ($bdd == false || isMaintenance()) {
	$warn = "Le site est actuellement indisponible, veuillez nous en escusez...";
	include_once('vue/maintenance.php');
}
else {
 	include_once('./controleur/Engine.php');
	
	if( !isset($_POST['page']) && (!isset($_GET['page']) ||
		$_GET['page'] == "index" ||
		$_GET['page'] == 'accueil')){

	    include_once('controleur/accueil.php');


	}
	else if (isset($_GET['page']) && $_GET['page'] == 'login') {
		# Page de co
		include_once('controleur/login.php');
	}
	else if (isset($_POST['page']) && $_POST['page'] == 'postLogin') {
		# ou envoie le login
		include_once 'controleur/login_post.php';
	}
	else if (isset($_GET['page']) && $_GET['page'] == 'inscription') {
		# page d'inscription
		include_once('controleur/inscription.php');
	}
	else if (isset($_GET['page']) && $_GET['page'] == 'postInscription') {
		# on on affiche les messages d'erreur ou les messages de ok
	}
	else if (isset($_POST['page']) && $_POST['page'] == 'postInscription') {
		# ou l'on envoie le formulaire
		include_once('controleur/inscription_post.php');
	}
	else if (isset($_GET['page']) && $_GET['page'] == 'logout') {
		# Deconnexion
		include_once('controleur/logout.php');
	}
	else if (isset($_GET['page']) && $_GET['page'] == 'profile') {
		# profile d'un joueur (maybe pas tout afficher de son état ?) possibilité d'attaque ?
	}
	else if (isset($_GET['page']) && $_GET['page'] == 'batiment') {
		# obvious
        include_once("controleur/batiment.php");
	}
	else if (isset($_GET['page']) && $_GET['page'] == 'liste_unites') {
		# obvious
		include_once('controleur/unite.php');
	}
	else if (isset($_GET['page']) && $_GET['page'] == 'technologie') {
        # liste des technologies acquises puis des technologies à venir (grisé)
        include_once('controleur/technologie.php');
	}
	else if (isset($_GET['page']) && $_GET['page'] == 'liste_technologies') {
		include_once ('controleur/post_tech.php');
	}
	else if (isset($_GET['page']) && $_GET['page'] == 'carte') {
		# Affichage de la carte (liens vers les profiles depuis les cases des gens)
        include_once("controleur/carte.php");
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
		$info = "La page recherchée n'a pas pu être trouvée...";
		$titre = "Je pense que vous êtes perdu...";
		include_once('vue/page404.php');
	}
}
