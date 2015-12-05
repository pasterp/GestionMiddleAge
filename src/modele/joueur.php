<?php

/*
Toute les partie en commentaire sont des ajouts à vérifiés
*/

include_once('./modele/connexion_sql.php');
include_once ('./modele/ressource.php');
/*--------------------------------------
include_once('./modele/Unite.php');
include_once('./modele/Batiment.php');
---------------------------------------*/
//include_once('./modele/case.php');

/**
* Classe gérant la représentation d'un utilisateur (idJoueur, pseudoJoueur, sexeJoueur, dateNaissanceJoueur, motdepasseJoueur, mailJoueur, image, date_inscripion, date_last_connection)
*/
class Joueur
{
	private $idJoueur, $pseudoJoueur, $sexeJoueur, $dateNaissanceJoueur, $mailJoueur, $image, $motdepasseJoueur;

	private $case;

	function __construct()
	{
		$ctp = func_num_args();
    	$args = func_get_args();

    	if ($ctp == 1) {
    		if (is_array($args[0])) {
    			$this->hydrate($args[0]);
    		}else{
    			$this->hydrate($this->Joueur($args[0]));
    		}
    	}
		
	}

	public function hydrate(array $donnees)
	{
	  foreach ($donnees as $key => $value)
	  {
	    $method = 'set'.ucfirst($key);
	    if (method_exists($this, $method)){
	      	$this->$method($value);
	    }
	  }
	}

	public static function Joueur($id){
		$req = "SELECT idJoueur, pseudoJoueur, sexeJoueur, dateNaissanceJoueur, mailJoueur, image, motdepasseJoueur FROM JOUEUR WHERE idJoueur='".$id."'";
		global $bdd;
		$req = $bdd->query($req);
		$req = $req->fetch();
		return $req;
	}

	public static function Joueurs(){
		//Methode statique retournant tous les joueurs existants
		$req = 'SELECT idJoueur, pseudoJoueur, sexeJoueur, dateNaissanceJoueur, mailJoueur, image, motdepasseJoueur FROM JOUEUR ORDER BY date_inscripion';
		global $bdd;
		$req = $bdd->query($req);
		$req = $req->fetchAll();

		$liste = array();
		foreach ($req as $row) {
			$j = new Joueur($row);
			array_push($liste, $j);
		}
		return $liste;
	}

	public function save(){
		global $bdd;
		if ($this->idJoueur == NULL) {
			$donnees = array( $this->pseudoJoueur, $this->sexeJoueur, $this->dateNaissanceJoueur, $this->mailJoueur, $this->image, $this->motdepasseJoueur);
			//On a pas d'id donc c'est une nouvelle entrée !
			$req = $bdd->prepare('INSERT INTO JOUEUR(pseudoJoueur, sexeJoueur, dateNaissanceJoueur, mailJoueur, image, date_inscripion, date_last_connection, motdepasseJoueur) VALUES(?, ?, ?, ?, ?, NOW(), NOW(), ? ) ');
			$req->execute($donnees);
			$this->idJoueur=$bdd->lastInsertId();
			$this->genRessourcesLink();
		}else{
			//Sinon c'est que l'on update
			$req = $bdd->prepare('UPDATE JOUEUR SET pseudoJoueur=?, sexeJoueur=?, dateNaissanceJoueur=?, mailJoueur=?, image=?, date_last_connection=NOW(), motdepasseJoueur=? where idJoueur=?');
			$req->execute(array( $this->pseudoJoueur, $this->sexeJoueur, $this->dateNaissanceJoueur, $this->mailJoueur, $this->image, $this->idJoueur,$this->motdepasseJoueur));
		}
	}

	// lien de tables

	public function genRessourcesLink(){
		global $bdd;
		foreach (Ressource::Ressources() as $row) {
			$req = "INSERT INTO POSSEDE_RESSOURCE(idJoueur, idRessource, quantite) VALUES ('".$this->idJoueur."', '".$row['idRessource']."', 500)";
			$req = $bdd->exec($req);
		}
	}

	public function getRessourcesLink(){
		$etatsRessources = array();
		global $bdd;
		$req = "SELECT quantite, idRessource FROM POSSEDE_RESSOURCE WHERE idJoueur='".$this->idJoueur."'";
		$req = $bdd->query($req);
		$req = $req->fetchAll();

		return $req;
	}

	/*--------------------------------------------------
	public function genUniteLink(){
		global $bdd;
		foreach (Unite::Unites() as $row) {
			$req = "INSERT INTO POSSEDE_UNITE(idJoueur, idUnite, quantite) VALUES ('".$this->idJoueur."', '".$row['idUnite']."', 0)";
			$req = $bdd->exec($req);
		}
	}

	public function getUniteLink(){
		$etatsUnites = array();
		global $bdd;
		$req = "SELECT quantite, idUnite FROM POSSEDE_UNITE WHERE idJoueur ='".$this->idJoueur."'";
		$req = $bdd->query($req);
		$req = $req-> fetchAll();

		return $req;
	}

	public function genBatimentLink(){
		global $bdd;
		foreach (Batiment::Batiments() as $row) {
			$req = "INSERT INTO POSSEDE_BATIMENT(idJoueur, idBatiment) VALUES ('".$this->idJoueur."', '".$row['idBatiment']."')";
			$req = $bdd->exec($req);
		}
	}
	
	public function getBatimentLink(){
		$etatsUnites = array();
		global $bdd;
		$req = "SELECT idBatiment FROM POSSEDE_BATIMENT WHERE idJoueur ='".$this->idJoueur."'";
		$req = $bdd->query($req);
		$req = $req-> fetchAll();

		return $req;
	}
	---------------------------------------------------------*/

	// getters

	public function getPseudo(){return ucfirst($this->pseudoJoueur);}

	public function getMailJoueur(){return $this->mailJoueur;}

	public function getImage(){return $this->image;}

	public function getSexe(){return $this->sexeJoueur;}

	public function getDateNaissanceJoueur(){return $this->dateNaissanceJoueur;}

	public function getId(){return $this->idJoueur;}

	// setters

	public function setPseudoJoueur($p){
		$this->pseudoJoueur = strtolower($p);
	}

	public function setMailJoueur($m){
		$this->mailJoueur = strtolower($m);
	}

	private function setIdJoueur($i){
		$this->idJoueur = (int) $i;
	}

	public function setSexeJoueur($v){
		$this->sexeJoueur = $v;
	} 

	public function setDateNaissanceJoueur($v){
		$this->dateNaissanceJoueur = $v;
	}
	public function setMotdepasseJoueur($mdp){
		$this->motdepasseJoueur = $mdp;
	}
	public function setImage($v){
		$this->image = $v;
	}

}
