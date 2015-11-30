	<?php 

include_once('./modele/connexion_sql.php');

class Ressource {
	private $idRessource;
	private $nomRessource;
	private $descriptionRessource;
	private $image;

	function __construct()
	{
		$ctp = func_num_args();
    	$args = func_get_args();

    	if ($ctp == 1) {
    		if (is_array($args[0])) {
    			$this->hydrate($args[0]);
    		}else{
    			$this->hydrate($this->Ressource($args[0]));
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

	public static function Ressources(){
		//Methode statique retournant toutes les resosurces existantes
		$req = 'SELECT * FROM RESSOURCE';
		global $bdd;
		$req = $bdd->query($req);
		return $req->fetchAll();
	}

	public static function Ressource($id){
		$req = "SELECT * FROM RESSOURCE WHERE idRessource='".$id."'";
		global $bdd;
		$req = $bdd->query($req);
		$req = $req->fetch();
		return $req;
	}

	public function setIdRessource($i){
		$this->idRessource = $i;
	}
	public function getIdRessource(){
		return $this->idRessource;
	}

	public function setNomRessource($nomRessource){
		$this->nomRessource = $nomRessource;
	}
	public function getNomRessource(){
		return $this->nomRessource;
	}
	public function setDescriptionRessource($descriptionRessource){
		$this->descriptionRessource = $descriptionRessource;
	}
	public function getDescriptionRessource(){
		return $this->descriptionRessource;
	}
	
	public function setImage($image){
		$this->image = $image;
	}
	public function getImage(){
		return $this->image;
	}
	
	
	
	
}


/*	public function set€($€){
		$this->€ = $€;
	}
	public function get€(){
		return $this->€;
	} 
*/