<?php

include_once('./modele/connexion_sql.php');
include_once ('./modele/ressource.php');

class EstInstalle{

	private $idJoueur, $idCase;

	function __construct($idJ, $idC){
		$this->idJoueur = $idJ;
		$this->idCase = $idC;
	}

	public function setIdJoueur(int $idJ){
		$this->idJoueur = $idJ;
	}

	public function setIdCase(int $idC){
		$this->idcase = $idC;
	}

	public function getIdJoueur(){
		return $this->idJouer;
	}

	public function getIdCase(){
		return $this->idCase;
	}

	public function hydrate(array $data){
		foreach ($data as $key => $value) {
			$method = 'set'.ucfirst($key);
		}

		if (method_exists($this, $method)){
			$this->$method($value);
		}
	}
}