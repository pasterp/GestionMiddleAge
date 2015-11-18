<?php 


	include_once './modele/authentification.php';

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
			$_SESSION['connexion'] = md5($user, $salt);
			retourEnTerresConnues();
		}else{
			//Connexion échouée
			$_SESSION['fpseudoJoueur']=$user;
		}

	}else{
		//Connexion échouée
		echo "pas ok";
	}
