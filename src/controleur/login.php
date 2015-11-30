<?php

$titre = "Connexion";
if (estAuthentifier()) {
		retourEnTerresConnues();
}else{
	include_once('./vue/login.php');
}