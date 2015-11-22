<?php include_once('vue/header.php'); ?>
	<?php if(!estAuthentifier()){ ?>
    <p>Déjà plus de <?php echo $nbJoueurs; ?> inscrits !</p>
    <?php }else{ ?>

    <h4>Ressources disponibles en jeu:</h4><ul>
	<?php foreach ($t as $key => $value) {
		echo "<li><span>".$value[1]." : </span> ".$value[2]."</li>";
	}  ?>
    </ul>

    <?php } ?> 
<?php include_once('vue/footer.php'); ?>