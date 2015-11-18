<?php include_once('vue/header.php'); ?>

<form id="inscription" method="post" action="index.php">
	<input type="hidden" name="page" value="postInscription" />
	<fieldset><legend>Informations publiques</legend>
	<div class="row">
		<div class="large-8 medium-8 small-12 columns">
	      <div class="row">
	        <div class="large-2 medium-2 small-12 columns show-for-large-up">
	          <label for="pseudoJoueur" class="right inline">Pseudo</label>
	        </div>
	        <div class="large-6 medium-6 small-12 columns left">
	          <input type="text" name="pseudoJoueur" id="pseudoJoueur" placeholder="Votre pseudonyme">
	        </div>
	      </div>
	    </div>
	</div>
	<div class="row">
	    <div class="large-8 medium-8 columns">
	      <div class="row">
	        <div class="large-2 medium-2 small-12 columns show-for-large-up">
	          <label for="mdpJoueur" class="right inline">Mot de passe</label>
	        </div>
	        <div class="large-5 medium-5 small-12 columns">
	          <input type="password" id="mdpJoueur" name="mdpJoueur" id="mdpJoueur" placeholder="Mot de passe" />
	        </div>
	        <div class="large-5 medium-5 small-12 columns">
				<input type="password" name="mdp2Joueur" id="mdp2Joueur" placeholder="Confirmation" />
	        </div>
	      </div>
	    </div>
	</div>

	</fieldset>

	<fieldset><legend>Informations privées</legend>
		<div class="row">
			<div class="large-8 medium-8 small-12 columns">
		      <div class="row">
		        <div class="large-2 medium-2 small-12 columns show-for-large-up">
		          <label for="mailJoueur" class="right inline">Email</label>
		        </div>
		        <div class="large-6 medium-6 small-12 columns left">
		          <input type="email" name="mailJoueur" id="mailJoueur" placeholder="Votre email">
		        </div>
		      </div>
		    </div>
		</div>
		<div class="row">
			<div class="large-8 medium-8 small-12 columns">
		      <div class="row">
		        <div class="large-2 medium-2 small-12 columns show-for-large-up">
		          <label for="" class="right inline">Sexe</label>
		        </div>
		        <div class="large-6 medium-6 small-12 columns left">
		        	<input id="homme" type="radio" name="sexe" value="homme" checked="checked"><label for="homme" class="inline">homme</label>
					<input id="femme" type="radio" name="sexe" value="femme"><label for="femme" class="inline">femme</label>
		        </div>
		      </div>
		    </div>
		</div>
		<div class="row">
			<div class="large-8 medium-8 small-12 columns">
		      	<div class="row">
			        <div class="large-2 medium-2 small-12 columns">
			        	<label for="jour" class="inline">Anniversaire</label>
			        </div>
			        <div class="large-6 medium-6 small-12 columns left">
				        <div class="row">
				        	<div class="large-3 medium-3 small-12 columns">
					        	<input name="jour" type="text" id="jour" maxlength="2" size="2" placeholder="01"/>
					        </div>
					        <div class="large-5 medium-5 small-12 columns">
						        <select name="mois">
									<option value="1" >Janvier	</option>
									<option value="2" >Février	</option>
									<option value="3" >Mars		</option>
									<option value="4" >Avril	</option>
									<option value="5" >Mai		</option>
									<option value="6" >Juin		</option>
									<option value="7" >Juillet	</option>
									<option value="8" >Aout		</option>
									<option value="9" >Septembre</option>
									<option value="10">Octobre	</option>
									<option value="11">Novembre	</option>
									<option value="12">Décembre	</option>
								</select>
							</div>
							<div class="large-4 medium-4 small-12 columns">
								<input type="text" name="annee" maxlength="4" size="4" placeholder="2000"/>
		        			</div>
		        		</div>	
		        	</div>
	      		</div>
	    	</div>
		</div>
	</fieldset>

	<input type="submit" class="button right" value="S'inscrire">

</form>


<?php include_once('vue/footer.php'); ?>