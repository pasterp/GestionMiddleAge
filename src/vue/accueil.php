<?php include_once('vue/header.php'); ?>
	<?php if(!estInscrit()){ ?>
    <p>Déjà plus de <?php echo $nbJoueurs; ?> inscrits !</p>
    <p>Et le dernier à nous avoir rejoint est : <?php echo $dernierinscrit; ?>.</p>
    <?php }else{ ?>
    <p>Bon retour parmi nous très cher membre !</p>
    <?php } ?> 
<?php include_once('vue/footer.php'); ?>