<?php include_once('vue/header.php'); ?>

<div class="row">
	<div class=""></div>
	<div class="">
		<form id="login" method="post" action="#">
		<fieldset><legend>Connexion</legend>
				<div class="row">
					<label for="pseudoJoueur">Pseudo</label>
					<input type="text" name="pseudoJoueur" id="pseudoJoueur"/>
					<label for="mdpJoueur">Mot de Passe</label>
					<input type="password" name="mdpJoueur" id="mdpJoueur" />
					<label for="resterCo">
				      	<input type="checkbox" id="resterCo" value="resterCo" /> Rester connecté</label>
					<input class="" type="submit" name="login" value="Connexion"/>
				</div>
			</fieldset>
		</form>
	</div>
	<div class=""></div>
</div>
<?php include_once('vue/footer.php'); ?>
