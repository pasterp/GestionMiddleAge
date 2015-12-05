<?php 
	include_once('./modele/ressource.php');
	include_once('./modele/Batiment.php');

	$titre="Mes batiments";
	$res = Ressource::Ressources();
	$bat = Batiment::Batiments();

	include_once('./vue/Batiment.php');
?>