<?php include_once('vue/header.php'); ?>

<div class="row">
  <div class="large-6 small-11 small-centered large-centered columns text-center">
  	<form id="login" method="post" action="#">
		<fieldset><legend>Connexion</legend>
			<div class="row">
				<label for="pseudoJoueur">Pseudo</label>
				<input type="text" name="pseudoJoueur" id="pseudoJoueur" placeholder="Pseudonyme" />
				<label for="mdpJoueur">Mot de Passe</label>
				<input type="password" name="mdpJoueur" id="mdpJoueur" placeholder="Mot de passe" />
				<label for="resterCo" class=""><input type="checkbox" id="resterCo" value="resterCo" /> Rester connecté</label>
				<input class="button" type="submit" name="login" value="Connexion"/>
			</div>
		</fieldset>
	</form>
  </div>
</div>

<?php include_once('vue/footer.php'); ?>


<!-- <form id="login" method="post" action="#">
		<fieldset><legend>Connexion</legend>
				<div class="row">
					<label for="pseudoJoueur">Pseudo</label>
					<input type="text" name="pseudoJoueur" id="pseudoJoueur"/>
					<label for="mdpJoueur">Mot de Passe</label>
					<input type="password" name="mdpJoueur" id="mdpJoueur" />
					<label for="resterCo"><input type="checkbox" id="resterCo" value="resterCo" /> Rester connecté</label>
					<input class="button" type="submit" name="login" value="Connexion"/>
				</div>
			</fieldset>
		</form> -->