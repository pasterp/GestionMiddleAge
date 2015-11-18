<?php 


	include_once './modele/authentification.php';

	if(isset($_POST['pseudoJoueur']) && isset($_POST['mdpJoueur'])){
		
		$user = $_POST['pseudoJoueur'];
		$mdp  = $_POST['mdpJoueur'];

		if( connexion($user, $mdp) )
		{
			//Connexion réussie
			echo "ok";
		}else{
			//Connexion échouée
			echo "pas ok";
		}

	}else{
		//Connexion échouée
		echo "pas ok";
	}