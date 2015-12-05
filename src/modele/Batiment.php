<?php
	include_once('./modele/connexion_sql.php');

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

		public static Batiments(){
		//Methode statique retournant tous les batiments existantes

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