<?php include_once('vue/header.php'); ?>



<form id="inscription" method="post" action="#">
		<div>
			<label for="pseudoJoueur"> Votre Pseudo: </label>
			<input type="text" name="pseudoJoueur" id="pseudoJoueur"/>
			<label for="mdpJoueur">Mot de Passe </label>
			<input type="password" name="mdpJoueur" id="mdpJoueur" />
			<label for="mdp2Joueur">Confirmation </label>
			<input type="password" name="mdp2Joueur" id="mdp2Joueur"/>
		</div>

		<div>
			<label for="mailJoueur">Mail Joueur:</label>
			<input type="email" name="mailJoueur" id="mailJoueur"/>
		</div>

		<div>
			<label for="sexeJoueur">Sexe: </label>
			<input type="checkbox" name="homme" value="homme"><label>homme</label>
			<input type="checkbox" name="femme" value="femme"><label>femme</label>
			<label>Date de naissance: </label>
			<input type="text" id="jour" maxlength="2" size="2" value="jour"/>
			<select name="mois">
				<optgroup>
					<option value="1" >Janvier</option>
					<option value="2" >Février</option>
					<option value="3" >Mars</option>
					<option value="4" >Avril</option>
					<option value="5" >Mai</option>
					<option value="6" >Juin</option>
					<option value="7" >Juillet</option>
					<option value="8" >Aout</option>
					<option value="9" >Septembre</option>
					<option value="10" >Octobre</option>
					<option value="11" >Novembre</option>
					<option value="12" >Décembre</option>
				</optgroup>
<input type="text" name="annee" maxlength="4" size="4" value="annee"/>	
</select>
		</div>


		<div>
			<input type="submit" name="inscription" value="S'inscrire"/>
			<input type="reset" name="annuler" value="Annuler"/>
		</div>
</form>


<?php include_once('vue/footer.php'); ?>