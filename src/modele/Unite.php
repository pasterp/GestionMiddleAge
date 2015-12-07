<?php

	/*
	Toute les partie en commentaire sont des ajouts à vérifiés
	*/

	include_once('./modele/connexion_sql.php');
	/*------------------------------------
	include_once ('./modele/ressource.php');
	include_once('./modele/Technologie.php');
	------------------------------------*/

	class Unite{

		private $idUnite, $nomUnite, $image, $descriptionUnite;

		function __construct()
		{
			$ctp = func_num_args();
	    	$args = func_get_args();
	    	if ($ctp == 1) {
	    		if (is_array($args[0])) {
	    			$this->hydrate($args[0]);
	    		}else{
	    			$this->hydrate($this->Unite($args[0]));
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

		public static function Unites(){
		//Methode statique retournant toutes les Unites existantes
		$req = 'SELECT * FROM UNITE';
		global $bdd;
		$req = $bdd->query($req);
    $req = $req->fetchAll();

		$liste = array();
		foreach ($req as $row) {
			$u = new UNITE($row);
			array_push($liste, $u);
		}
		return $liste;
	}

		public static function Unite($id){
			$req = "SELECT idUnite, nomUnite, image, descriptionUnite, puissanceUnite FROM UNITE WHERE idUnite='".$id."'";
			global $bdd;
			$req = $bdd->query($req);
			$req = $req->fetch();
			return $req;
		}

		// Liens de tables

		/*-------------------------------------------------

		public function genRessourcesLink(){
			global $bdd;
			foreach (Ressource::Ressources() as $row) {
				$req = "INSERT INTO COUTE_UNITE(idUnite, idRessource, quantite) VALUES ('".$this->idUnite."', '".$row['idRessource']."', 500)";
				$req = $bdd->exec($req);
			}
		}

		public function getRessourcesLink(){
			$etatsRessources = array();
			global $bdd;
			$req = "SELECT quantite, idRessource FROM COUTE_UNITE WHERE idUnite='".$this->idUnite."'";
			$req = $bdd->query($req);
			$req = $req->fetchAll();

			return $req;
		}

		public function genTechLink(){
			global $bdd;
			foreach (Technologie::Technologies() as $row) {
				$req = "INSERT INTO UNITE_DEPEND_DE(idUnite, idTech) VALUES ('".$this->idUnite."', '".$row['idTechnologie']."')";
				$req = $bdd->exec($req);
			}
		}

		public function getTechLink(){
			$etatsTechnologies = array();
			global $bdd;
			$req = "SELECT idTech FROM UNITE_DEPEND_DE WHERE idUnite='".$this->idUnite."'";
			$req = $bdd->query($req);
			$req = $req->fetchAll();

			return $req;
		}
		----------------------------------------------------*/

		// getters

		public function getIdUnite(){
			return $this->idUnite;
		}

		public function getNomUnite(){
			return $this->nomUnite;
		}

		public function getImage(){
			return $this->image;
		}
		public function getPuissance(){
			return $this->puissanceUnite;
		}

		public function getDescriptionUnite(){
			return $this->descriptionUnite;
		}

		// setters

		public function setIdUnite($i){
			$this->idUnite = (int) $i;
		}

		public function setPuissanceUnite($i){
			$this->puissanceUnite = (int) $i;
		}

		public function setNomUnite($n){
			$this->nomUnite = strtolower($n);
		}

		public function setImage($p){
			$this->image = $p;
		}

		public function setDescriptionUnite($d){
			$this->descriptionUnite = strtolower($d);
		}

	}
?>
