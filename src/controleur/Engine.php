<?php
/**
 * Created by PhpStorm.
 * User: pascal
 * Date: 06/12/15
 * Time: 16:44
 */

//On a besoin de la liste de tous les joueurs
$joueurs = Joueur::Joueurs();

foreach ($joueurs as $joueur) {
  //Pour chaque joueur on va executer chacune des actions nécessaires
  $joueur->nextCycle();
}
