<?php include_once('vue/header.php'); ?>
	<?php if(!estAuthentifier()){ ?>
    <p>Déjà plus de <?php echo $nbJoueurs; ?> inscrits !</p>
    <?php }else{ ?>

    <h4>Ressources disponibles en jeu:</h4><ul>
	<?php foreach ($t as $value) {
		echo "<li style='list-style-type: none;margin-bottom:5px;'><img src='".$value[3]."' style='width:45px; height:45px;' />".$value[1]." : <span style='font-style:italic;'>".$value[2]."</span></li>";
	}  ?>
    </ul>

    <?php } ?> 
<?php include_once('vue/footer.php'); ?>