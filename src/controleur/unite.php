<?php 
	include_once('./modele/ressource.php');
	include_once('./modele/Unite.php');
	include_once('./modele/authentification.php');


	if (estAuthentifier()) {
    global $currentJoueur;
    $uc = $currentJoueur->getIdUnite();
    $titre="Mes Unités";
	$uni = Unite::Unites();
    $uniConnues = array();
    $uniInconnues = array();
    foreach ($uni as $u){
        $b = false;
        foreach($uc as $m){
            if ($u->getIdUnite() == $m[0]){
                $b = true;
            }
        }
        if($b){
            array_push($uniConnues, $uni);
        }else{
            array_push($uniInconnues, $uni);
        }
    }

}else{
    retourEnTerresConnues();
}


	include_once('./vue/Unite.php');
?>