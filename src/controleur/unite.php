<?php 
	include_once('./modele/ressource.php');
	include_once('./modele/Unite.php');

	$titre="Mes unités";
	$res = Ressource::Ressources();
	$uni = Unite::Unites();

	include_once('./vue/Unite.php');
?>