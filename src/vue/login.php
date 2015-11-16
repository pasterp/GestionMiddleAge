<?php include_once('vue/header.php'); ?>

	<div>
		<form id="login" method="post" action="#">
			<div>
				<label for="pseudoJoueur">Pseudo</label>
				<input type="text" name="pseudoJoueur" id="pseudoJoueur"/>
				<label for="mdpJoueur">Mot de Passe</label>
				<input type="password" name="mdpJoueur" id="mdpJoueur" />
			</div>
			
			<div>
				<input type="submit" name="login" value="Connexion"/>
				<input type="reset" name="annuler" value="Annuler"/>
			</div>
		</form>
	</div>
<?php include_once('vue/footer.php'); ?>
