<?php

function get_nbJoueurs(){
    //Exemple pour récupérer le nombre de joueurs inscrits #test

    global $bdd;

    $req = "SELECT COUNT(idJoueur) FROM JOUEUR";
    $req = $bdd->query($req);
    $req = $req->fetch()[0];
    return $req;
}

>
