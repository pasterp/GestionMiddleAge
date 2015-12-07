<?php 

	$titre = 'Carte du monde';
	
	include_once('./modele/MapCase.php');
	include_once('./modele/EstInstalle.php');
	$cases = MapCase::MapCase();
	$installe = EstInstalle::EstInstalle();
	echo "controller called";



include_once('./vue/carte.php');
?>