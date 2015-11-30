	<?php 

include_once('./modele/connexion_sql.php');

	class Ressource {
		private $id;
		private $nom;
		private $description;


		public static function Ressources(){
			//Methode statique retournant toutes les resosurces existantes
			$req = 'SELECT * FROM RESSOURCE';
			global $bdd;
			$req = $bdd->query($req);
			return $req->fetchAll();
		}

		
}