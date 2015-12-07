<?php include_once('vue/header.php'); ?>
<?php foreach ($bat as $batimentJoueur) { ?>
<div class="row">
<div class="small-6 large-12 columns">
<div class="panel">
<div class="row">
  <h1><?php echo ucfirst($batimentJoueur->getNomBatiment()); ?></h1>
            <hr>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <img src="<?php echo $batimentJoueur->getImage();?>" /> </div>
            <div class="small-8 columns">
              <h4> Coût du Batiment: <?php echo $batimentJoueur->getIdType();?> </h4>
              <p>test</p>
              <h5> Description:</h5>
              <p><?php echo ucfirst($batimentJoueur->getDescriptionBatiment());?></p>
            </div>
          </div>
  </div>
</div>
</div>
<?php } ?>
<?php include_once('vue/footer.php'); ?>
