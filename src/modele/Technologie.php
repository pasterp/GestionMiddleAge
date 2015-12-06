<?php

	include_once('./modele/connexion_sql.php');

	class Technologie{
		private $idTech, $nomTech, $descriptionTech, $image;

		function __construct()
		{
			$ctp = func_num_args();
	    	$args = func_get_args();
	    	if ($ctp == 1) {
	    		if (is_array($args[0])) {
	    			$this->hydrate($args[0]);
	    		}else{
	    			$this->hydrate($this->Technologie($args[0]));
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

		public static function Technologies(){
		//Methode statique retournant toutes les technologies existantes

			$req = 'SELECT * FROM TECHNOLOGIE';
			global $bdd;
			$req = $bdd->query($req);
			$req = $req->fetchAll();

			$liste = array();
			foreach ($req as $row) {
				$b = new Technologie($row);
				array_push($liste, $b);
			}
			return $liste;
		}

		public static function Technologie($id){
			$req = "SELECT idTech, nomTech, descriptionTech, image FROM TECHNOLOGIE WHERE idTech='".$id."'";
			global $bdd;
			$req = $bdd->query($req);
			$req = $req->fetch();
			return $req;
		}

		// getters

		public function getIdTech(){
			return $this->idTech;
		}

		public function getNomTech(){
			return $this->nomTech;
		}

		public function getDescriptionTech(){
			return $this->descriptionTech;
		}

		public function getimage(){
			return $this->image;
		}

		// setters

		public function setIdTech($i){
			$this->idJoueur = (int) $i;
		}

		public function setNomTech($n){
			$this->nomTech = strtolower($n);
		}

		public function setDescriptionTech($d){
			$this->descriptionTech = strtolower($d);
		}
		
		public function setimage($p){
			$this->image = $p;
		}
	}
?>