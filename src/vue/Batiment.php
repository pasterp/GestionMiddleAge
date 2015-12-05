<?php include_once('vue/header.php'); ?>
<?php foreach ($uni as $row)
$idBatiment, $nomBatiment, $descriptionBatiment, $niveauBatiment, $idType, $image;
$batimentJoueur = new Batiment($row['idBatiment'])?>
<div class="row">
<div class="small-6 large-12 columns">
<div class="panel">
<div class="row">
  <h1><?php echo $batimentJoueur->getNomBatiment();?></h1>
            <hr>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <img src="<?php echo $batimentJoueur->getImage();?>" /> </div>
            <div class="small-8 columns">
              <h4> Coût du Batiment: <?php echo $batimentJoueur->getIdType();?> </h4>
              <p>test</p>
              <h5> Description:</h5>
              <p><?php echo $batimentJoueur->getDescriptionBatiment();?></p>
            </div>
          </div>
  </div>
</div>
</div>
<?php}?>
<?php include_once('vue/footer.php'); ?>