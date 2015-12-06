<?php
	include_once('./modele/connexion_sql.php');

	class Attaque{
		private $idAttaquant, $idDefenseur, $puissance, $tempsAttaque;
		function __construct()
		{
			$ctp = func_num_args();
	    	$args = func_get_args();
	    	if ($ctp == 1) {
	    		if (is_array($args[0])) {
	    			$this->hydrate($args[0]);
	    		}else{
	    			$this->hydrate($this->Attaque($args[0]));
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

		public static function Attaque($id){
			$req = "SELECT idAttaquant, idDefenseur, puissance, tempsAttaque FROM ATTAQUE WHERE idAttaquant='".$id."'";
			global $bdd;
			$req = $bdd->query($req);
			$req = $req->fetch();
			return $req;
		}

		public static function Attaques(){
		//Methode statique retournant toutes les attaques existantes

			$req = 'SELECT * FROM ATTAQUE';
			global $bdd;
			$req = $bdd->query($req);
			$req = $req->fetchAll();

			$liste = array();
			foreach ($req as $row) {
				$b = new Attaque($row);
				array_push($liste, $b);
			}
			return $liste;
		}

		// getters

		public function getIdAttaquant(){
			return $this->idAttanquant;
		}

		public function getIdDefenseur(){
			return $this->idDefenseur;
		}

		public function getPuissance(){
			return $this->puissance;
		}

		public function getTempsAttaque(){
			return $this->tempsAttaque;
		}

		$truc = new Attaque(1);
	}
?>