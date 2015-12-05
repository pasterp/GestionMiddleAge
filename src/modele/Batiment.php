<?php

	/*
	Toute les partie en commentaire sont des ajouts à vérifiés
	*/

	include_once('./modele/connexion_sql.php');
	/*------------------------------
	include_once ('./modele/ressource.php');
	include_once('./modele/Unite.php');
	------------------------------*/

	class Batiment{
		private $idBatiment, $nomBatiment, $descriptionBatiment, $niveauBatiment, $idType, $image;
		function __construct()
		{
			$ctp = func_num_args();
	    	$args = func_get_args();
	    	if ($ctp == 1) {
	    		if (is_array($args[0])) {
	    			$this->hydrate($args[0]);
	    		}else{
	    			$this->hydrate($this->Batiment($args[0]));
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

		public static function Batiments(){
		//Methode statique retournant tous les batiments existants

			$req = 'SELECT * FROM BATIMENT';
			global $bdd;
			$req = $bdd->query($req);
			return $req->fetchAll();

			$liste = array();
			foreach ($req as $row) {
				$b = new Batiment($row);
				array_push($liste, $b);
			}
			return $liste;
		}
		public static function Batiment($id){
			$req = "SELECT idBatiment, nomBatiment, descriptionBatiment, niveauBatiment, idType, image FROM BATIMENT WHERE idBatiment='".$id."'";
			global $bdd;
			$req = $bdd->query($req);
			$req = $req->fetch();
			return $req;
		}

		// Liens des table pour batiment

		/*------------------------------------------
		public function genRessourcesLink(){
			global $bdd;
			foreach (Ressource::Ressources() as $row) {
				$req = "INSERT INTO COUTE_BATIMENT(quantite, idRessource, idBatiment) VALUES ( 500, '".$row['idRessource']."','".$this->idBatiment."')";
				$req = $bdd->exec($req);
			}
		}
		
		public function getRessourcesLink(){
			$etatsRessources = array();
			global $bdd;
			$req = "SELECT quantite, idRessource FROM COUTE_BATIMENT WHERE idBatiment='".$this->iBatiment."'";
			$req = $bdd->query($req);
			$req = $req->fetchAll();

			return $req;
		}

		public function genUpgradeLink(){
			global $bdd;
			foreach (Technologie::Technologies() as $row) {
				$req = "INSERT INTO UPGRADE_DEPEND(idBatiment, idTech) VALUES ('".$this->idBatiment."', '".$row['idTech']."')";
				$req = $bdd->exec($req);
			}
		}
		
		public function getUpgradeLink(){
			$etatsTechnologies = array();
			global $bdd;
			$req = "SELECT idTech FROM UPGRADE_DEPEND WHERE idBatiment='".$this->iBatiment."'";
			$req = $bdd->query($req);
			$req = $req->fetchAll();

			return $req;
		}

		public function genProdRessourceLink(){
			global $bdd;
			foreach (Ressource::Ressources() as $row) {
				$req = "INSERT INTO PRODUIT_RESSOURCE(quantite, idRessource, idBatiment) VALUES ( 500, '".$row['idRessource']."','".$this->idBatiment."')";
				$req = $bdd->exec($req);
			}
		}
		
		public function getProdRessourceLink(){
			$etatsRessources = array();
			global $bdd;
			$req = "SELECT quantite, idRessource FROM PRODUIT_RESSOURCE WHERE idBatiment='".$this->iBatiment."'";
			$req = $bdd->query($req);
			$req = $req->fetchAll();

			return $req;
		}

		public function genProdUniteLink(){
			global $bdd;
			foreach (Unite::Unites() as $row) {
				$req = "INSERT INTO PRODUIT_UNITE(quantite, idUnite, idBatiment) VALUES ( 0 , '".$row['idUnite']."','".$this->idBatiment."')";
				$req = $bdd->exec($req);
			}
		}
		
		public function getProdUniteLink(){
			$etatsUnites = array();
			global $bdd;
			$req = "SELECT quantite, idRessource FROM PRODUIT_RESSOURCE WHERE idBatiment='".$this->iBatiment."'";
			$req = $bdd->query($req);
			$req = $req->fetchAll();

			return $req;
		}

		----------------------------------------------------*/

		// getters

		public function getIdBatiment(){
			return $this->idBatiment;
		}

		public function getNomBatiment(){
			return $this->nomBatiment;
		}

		public function getDescriptionBatiment(){
			return $this->descriptionBatiment;
		}

		public function getNiveauBatiment(){
			return $this->niveauBatiment;
		}

		public function getIdType(){
			return $this->idType;
		}

		public function getImage(){
			return $this->image;
		}

		// setters

		public function setIdBatiment($i){
			$this->idBatiment = (int) $i;
		}

		public function setNomBatiment($n){
			$this->nomBatiment = strtolower($n);
		}

		public function setDescriptionBatiment($d){
			$this->descriptionBatiment = strtolower($d);
		}

		public function setNiveauBatiment($l){
			$this->niveauBatiment = (int) $l;
		}

		public function setIdtype($i1){
			$this->idType = (int) $i1;
		}

		public function setImage($p){
			$this->image = $p;
		}


	}
?>