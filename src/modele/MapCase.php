<?php

include_once('./modele/connexion_sql.php');
include_once ('./modele/ressource.php');

class MapCase {

	private $x, $y, $idCase;

	function __construct(int $a, int $b, int $id){
		$this->x = $a;
		$this->y = $b;
		$this->idCase = $id;
	}

	public function setX(int $a){
		$this->x = $a;
	}

	public function setY(int $a){
		$this->y = $a;
	}

	public function setIdCase(int $id){	
		$this->idCase = $id;
	}

	public function getX(){
		return $this->x;
	}

	public function getY(){
		return $this->y;
	}

	public function getIdCase(){
		return $this->idCase;
	}
	
	public function hydrate(array $donnees){
		foreach ($donnees as $key => $value) {
			$method = 'set'.ucfirst($key);

			if (method_exists($this, $method)){
				$this->$method($value);
			}
		}
	}

	public function save(){
		global $bdd;
		if ($this->idCase == NULL){
			//Nouvelle entrée
			$datas = array($this->x, $this->y);
			$req = $bdd->prepare('INSERT INTO MAPCASE(CoordX, CoordY) VALUES(?, ?)');
			$req->execute($datas);
			$this->idCase = $bdd->lastInsertId();
		}else{
			//Update de l'entrée
			$datas = array($this->x, $this->y, $this->idCase);
			$req = $bdd->prepare('INSERT INTO MAPCASE(idCase, CoordX, CoordY VALUES(?, ?, ?)');
			$req->execute($datas);
		}
	}
}