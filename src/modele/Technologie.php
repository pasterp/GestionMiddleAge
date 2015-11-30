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

		public static function Technologie($id){
			$req = "SELECT idTech, nomTech, descriptionTech, image FROM TECHNOLOGIE WHERE idTech='".$id."'";
			global $bdd;
			$req = $bdd->query($req);
			$req = $req->fetch();
			return $req;
		}

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
	$truc = new Technologie(1);
?>