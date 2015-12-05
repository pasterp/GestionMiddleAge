<?php
	include_once('./modele/Attaque.php');

	$titre="Mes attaques";
	$att = Attaque::Attaques();

	include_once('./vue/Attaque.php');
?>