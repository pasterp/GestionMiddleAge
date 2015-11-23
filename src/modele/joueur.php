<?php


include_once('./modele/connexion_sql.php');
//include_once('./modele/case.php');

/**
* Classe gérant la représentation d'un utilisateur (idJoueur, pseudoJoueur, sexeJoueur, dateNaissanceJoueur, motdepasseJoueur, mailJoueur, image, date_inscripion, date_last_connection)
*/
class Joueur
{
	private $id, $pseudo, $sexe, $anniv, $mail, $image;

	private $case;

	function __construct($_id="", $_pseudo="", $_sexe="", $_anniv="", $_mail="", $_image="")
	{
		$this->id=$_id;
		$this->pseudo=$_pseudo;
		$this->sexe=$_sexe;
		$this->anniv=$_anniv;
		$this->mail=$_mail;
		$this->image=$_image;
	}

	public static function Joueurs(){
		//Methode statique retournant toutes les joueurs existants
		$req = 'SELECT idJoueur, pseudoJoueur, sexeJoueur, dateNaissanceJoueur, mailJoueur, image FROM JOUEUR';
		global $bdd;
		$req = $bdd->query($req);
		$req = $req->fetchAll();

		$liste = array();
		foreach ($req as $row) {
			$j = new Joueur($row['pseudoJoueur'], $row[1], $row[2], $row[3], $row[4], $row[5]);
			array_push($liste, $j);
		}
		return $liste;
	}

	public function getPseudo(){
		return $this->pseudo;
	}

}
