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
		$id=$_id;
		$pseudo=$_pseudo;
		$sexe=$_sexe;
		$anniv=$_anniv;
		$mail=$_mail;
		$image=$_image;
	}

	public static function Joueurs(){
			//Methode statique retournant toutes les resosurces existantes
			$req = 'SELECT (idJoueur, pseudoJoueur, sexeJoueur, dateNaissanceJoueur, mailJoueur, image) FROM JOUEUR';
			global $bdd;
			$req = $bdd->query($req);
			$req = $req->fetchAll();

			$liste = array();
			foreach ($req as $row) {
				$j = new Joueur($row[0], $row[1], $row[2], $row[3], $row[4], $row[5]);
			}
		}

}
