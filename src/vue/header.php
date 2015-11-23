<!DOCTYPE html>
<html class="no-js" lang="fr">
<head>
    <meta charse="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php if(isset($titre)){echo $titre;}else{echo $titreSite;} ?></title>
	<link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
</head>
<body>

<nav class="top-bar" data-topbar role="navigation">
  <ul class="title-area">
    <li class="name">
      <h1><a href="index.php"><?php echo $titreSite; ?></a></h1>
    </li>
    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  </ul>
	
  <section class="top-bar-section">
    <ul class="right">
<?php if (estAuthentifier()): ?>
      <li class="has-dropdown">
        <a href="#">Mon compte( <?php echo $currentJoueur->getPseudo(); ?> )</a>
        <ul class="dropdown">
          <li><a href="#">Mes informations</a></li>
          <li><a href="index.php?page=logout">Déconnexion</a></li>
        </ul>
      </li>
<?php else: ?>
	<li><a href="index.php?page=inscription">Inscription</a></li>
	<li><a href="index.php?page=login">Connexion</a></li>
<?php endif ?>
    </ul>


    <ul class="left">
      <li><a href="#">#1</a></li>
    </ul>
  </section>
</nav>

<div class="row">
	<div class="large-8 small-12 small-centered large-centered columns ">
		<?php if (isset($alert)) { ?>

			<div data-alert class="alert-box alert radius">
			<?php echo $alert; ?>
			  <a href="#" class="close">&times;</a>
			</div>

		<?php } ?>

		<?php if (isset($succes)) { ?>

			<div data-alert class="alert-box success radius">
			<?php echo $succes; ?>
			  <a href="#" class="close">&times;</a>
			</div>
			
		<?php } ?>

		<?php if (isset($warn)) { ?>

			<div data-alert class="alert-box warning radius">
			<?php echo $warn; ?>
			  <a href="#" class="close">&times;</a>
			</div>
			
		<?php } ?>

		<?php if (isset($info)) { ?>

			<div data-alert class="alert-box info radius">
			<?php echo $info; ?>
			  <a href="#" class="close">&times;</a>
			</div>
			
		<?php } ?>
	</div>
</div>

	<div class="row">