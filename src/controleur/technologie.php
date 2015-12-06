<?php
	include_once('./modele/Technologie.php');


	$titre="Mes technologies";
	$tech = Technologie::Technologies();

	include_once('./vue/Technologie.php');