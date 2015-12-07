<?php include_once('vue/header.php'); ?>

<?php foreach ($uni as $unite) {
    ?>
<div class="row">
<div class="small-6 large-12 columns">
<div class="panel">
<div class="row">
  <h1><?php echo ucfirst($unite->getNomUnite());?></h1>
            <hr>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <img src="<?php echo $unite->getImage();?>" /> </div>
            <div class="small-8 columns">
              <h4> Coût de l'unité:</h4>
              <p>test</p>
              <h5> Description:</h5>
              <p><?php echo ucfirst($unite->getDescriptionUnite());?></p>
              <h5> Puissance:</h5>
              <p><?php echo $unite->getPuissance();?></p>
            </div>
          </div>
  </div>
</div>
</div>
<?php}?>
<?php include_once('vue/footer.php'); ?>
