<?php 


include_once('modele/authentification.php');

	if (estAuthentifier()) {
		retourEnTerresConnues();
	}

	if(isset($_POST['pseudoJoueur']) && isset($_POST['mdpJoueur'])){
		$_SESSION['fpseudoJoueur']="";
		$user = $_POST['pseudoJoueur'];
		$mdp  = $_POST['mdpJoueur'];

		if( connexion($user, $mdp) )
		{
			//Connexion réussie
			$cook = generateCookie($user,$mdp);

			$_SESSION['connexion'] = $cook;
			
			if (isset($_POST['resterCo'])) {
				setcookie('connexion', $cook, time()+3600);
			}
			retourEnTerresConnues();

		}else{
			//Connexion échouée
			$_SESSION['fpseudoJoueur']=$user;
		}
	}

	$warn = "Identifiants invalides !";

	include_once './vue/login.php';
