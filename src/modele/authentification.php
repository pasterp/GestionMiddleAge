<?php

function estAuthentifier(){
	if (isset($_SESSION['connexion'])) {
		return true;
	}else{
		return false;
	}
}

function deconnexion(){
	session_destroy();
	session_start();
}

function connexion($user, $mdp){
	global $bdd;

	// $mdp = md5($mdp, $salt);
	$req = $bdd->prepare("SELECT idJoueur FROM JOUEUR WHERE pseudoJoueur=:user AND motdepasseJoueur=:pass");
	$req->execute(array( 'user' => $user,
						 'pass' => $mdp));
	$nb = $req->fetchColumn();
	
	if ($nb > 0) {
		return true;
	}else{
		return false;
	}

}

function retourEnTerresConnues(){
	header('Location: index.php');
} 