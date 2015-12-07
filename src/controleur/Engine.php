<?php

include_once('./modele/joueur.php');
include_once('./modele/connexion_sql.php');

<<<<<<< HEAD
=======
/**
 * Created by PhpStorm.
 * User: pascal
 * Date: 06/12/15
 * Time: 16:44
 */
>>>>>>> a876ec07832338aee38c33981e6854ab1b76477f
// $diff=0;
// if(file_exists ('./updated.db')){
//   $t = file('./updated.db')[0];
//   $t2 = time();

//   $need = false;
//   //15 minutes = 900s
//   while ($t2-$t >= 900) {
//     $need = true;
//     $info = "Mise à jour effectuée !";
//     //On a besoin de la liste de tous les joueurs
//     $joueurs = Joueur::Joueurs();

//     foreach ($joueurs as $joueur) {
//       //Pour chaque joueur on va executer chacune des actions nécessaires
//       $joueur->nextCycle();
//     }

//     $t = $t + 900;
//     $diff = $t2-$t;
//   }

//   if($need){
//     $lastUpdate = fopen('./updated.db', 'w');
//     fwrite($lastUpdate, time()-$diff);
//     fclose($lastUpdate);
//   }
// }else {
//   $warn = "Initialisation du timer...";
//   $lastUpdate = fopen('./updated.db', 'w');
//   fwrite($lastUpdate, time()-$diff);
//   fclose($lastUpdate);
// }

global $bdd;

$req = "SELECT * FROM ENGINE_DB WHERE id=1";
$req = $bdd->query($req);
$req = $req->fetch();

$diff=0;
if($req['data'] != 0){
  $t = $req['data'];
  $t2 = time();

  $need = false;
  //15 minutes = 900s
  while ($t2-$t >= 900) {
    $need = true;
    $info = "Mise à jour effectuée !";
    //On a besoin de la liste de tous les joueurs
    $joueurs = Joueur::Joueurs();

    foreach ($joueurs as $joueur) {
      //Pour chaque joueur on va executer chacune des actions nécessaires
      $joueur->nextCycle();
    }

    $t = $t + 900;
    $diff = $t2-$t;
  }

  if($need){
    $req2 = "UPDATE ENGINE_DB SET data='".(time()-$diff)."'";
    $bdd->exec($req2);
  }
}else {
  $warn = "Initialisation du timer...";
  $req2 = "UPDATE ENGINE_DB SET data='".(time()-$diff)."'";
  $bdd->exec($req2);
<<<<<<< HEAD
}
=======
}
>>>>>>> a876ec07832338aee38c33981e6854ab1b76477f
