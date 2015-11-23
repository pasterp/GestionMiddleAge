<?php


include_once('./modele/connexion_sql.php');
include_once('./modele/joueur.php');

function estAuthentifier(){
	if (isset($_SESSION['connexion']) or isset($_COOKIE['connexion']) && validateCookie($_COOKIE['connexion'])) {

		global $currentJoueur;
		$currentJoueur = new Joueur($_SESSION['idJoueur']);

		return true;
	}else{
		return false;
	}
}

function deconnexion(){
	setcookie('connexion',"byebye",time()-1);
	session_destroy();
	session_start();
}

function connexion($user, $mdp){
	global $bdd;


	$req = $bdd->prepare("SELECT idJoueur FROM JOUEUR WHERE pseudoJoueur=:user AND motdepasseJoueur=:pass");
	$req->execute(array( 'user' => $user,
						 'pass' => $mdp));
	$id = $req->fetchAll()[0][0];
	$_SESSION['idJoueur'] = $id;

	if ($id > 0) {
		return true;
	}else{
		return false;
	}
}

function generatePassword($mdp){
	return md5($mdp, $salt);
}

function retourEnTerresConnues(){
	header('Location: index.php');
} 

function validateCookie($cookie){
	if (true) {
		$_SESSION['connexion'] = $_COOKIE['connexion']; 

		//set  l'id du joueur actuel !

		return true;
	}
}

function generateCookie($user, $mdp){
	return base64_encode($user.' '.md5($mdp, $salt));
}