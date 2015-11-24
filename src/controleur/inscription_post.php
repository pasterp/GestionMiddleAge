<?php 

include_once('./modele/authentification.php');
include_once('./modele/joueur.php');

$estok = true;
$log = "";

		if (isset($_POST['pseudoJoueur'])) {
			$pseudoJoueur = $_POST['pseudoJoueur'];
		}
		else {
			$estok = false;
			$log.="\nErreur dans votre Pseudo";
		}
		if (isset($_POST['mdp2Joueur']) and isset($_POST['mdpJoueur'])) {
			$mdp2Joueur = generatePassword($_POST['mdp2Joueur']);
		}
		else {
			$estok = false;
			$log.="\nErreur de mot de passe!";
		}
		if (isset($_POST['mailJoueur'])) {
			$mailJoueur = $_POST['mailJoueur'];
		}
		else {
			$estok = false;
			$log.="\nErreur dans votre Mail";
		}
		if (isset($_POST['jour']) and is_numeric($_POST['jour'])) {
			$jour = ($_POST['jour']);
			if ($jour>0 and $jour<31) {
				$jour = $jour;	
			}
			else {
				$estok = false;
				$log.="\nErreur dans le jour de naissance";
			}
		}
		if (isset($_POST['annee']) and is_numeric($_POST['annee'])) {
			$annee=($_POST['annee']);
		}
		else {
			$estok = false;
			$log.="\nErreur dans l'année de naissance!";
		}
		if (isset($_POST['sexe'])) {
			$sexeJoueur = ($_POST['sexe']);
		}
		else {
			$estok =false;
			$log.="\nErreur dans le sexe!";
		}
		if ($estok and !(pasInscrit($pseudoJoueur,$mailJoueur))){
			$estok=false;
			$log.="\nVous êtes déjà inscrit!";
		}


if ($estok) {
	$dateNaissance = "".$jour."-".isset($_POST['mois'])."-".$annee."";
	$Joueur= new Joueur ();
	$Joueur->setPseudoJoueur($pseudoJoueur);
	$Joueur->setMailJoueur($mailJoueur);
	$Joueur->setSexeJoueur($sexeJoueur);
	$Joueur->setDateNaissanceJoueur($dateNaissance);
	$Joueur->setMotdepasseJoueur($mdp2Joueur);


	$Joueur->save();
	retourEnTerresConnues();
}else{
	$alert = $log;
	include_once('./vue/inscription.php');
}