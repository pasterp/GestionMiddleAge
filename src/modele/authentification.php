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

function connexion(){
	//need to be tiona (be tune hahaha)
	return false;
}

function retourEnTerresConnues(){
	header('Location: index.php');
} 