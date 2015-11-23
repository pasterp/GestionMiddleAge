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
			print_r($req);
			return $req;
		}

		private function getIdTech(){
			return $this->idTech;
		}

		private function getNomTech(){
			return $this->nomTech;
		}

		private function getdescriptionTech(){
			return $this->descriptionTech;
		}

		private function getimage(){
			return $this->image;
		}

		private function setIdTech($i){
			$this->idJoueur = (int) $i;
		}

		private function setNomTech($n){
			$this->nomTech = strtolower($n);
		}

		private function setdescriptionTech($d){
			$this->descriptionTech = strtolower($d);
		}
		
		private function setimage($p){
			$this->image = $p;
		}
	}
?>