<?php include_once('./vue/header.php');
	include_once('./controleur/carte.php');
/*
	foreach ($cases as $c) { 
	?>

<div class="row">
<div class="small-6 large-12 columns">
<div class="panel">
<div class="row">
<h1><?php foreach ($installe as $i) {
	if ($i->getIdCase() == $c->getIdCase()){
		foreach ($joueur as $j) {
			if ($j->getId() == $i->getIdJoueur()){
				echo $j->getPseudo();
			?> 
</h1>
<div class="row">
<div class="small-4 columns">
	<img src= "<?php echo $j->getImage();?>" />
</div>
<div class="small-8 columns">
<h3>Localisation: </h3>
<h4>X: 
	<?php echo $c->getX(); ?>
</h4>
<h4>Y: 
	<?php echo $c->getY(); ?>
</h4>

</div>
</div>
</div>
</div>
</div>
</div>
<?php } } } } } */?>
<?php include_once('./vue/footer.php'); ?>