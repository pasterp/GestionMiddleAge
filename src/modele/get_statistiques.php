<?php

function get_nbJoueurs(){
    //Exemple pour récupérer le nombre de joueurs inscrits #test
    global $bdd;

    $req = "SELECT COUNT(idJoueur) FROM JOUEUR";
    $req = $bdd->query($req);
    $req = $req->fetch()[0];
    return $req;
}

function get_dernierInscrit(){
	global $bdd;

	$req = "SELECT pseudoJoueur FROM JOUEUR ORDER BY idJoueur DESC LIMIT 0,1";
	$req = $bdd->query($req);
	$req = $req->fetch()[0];

	return $req;
}
