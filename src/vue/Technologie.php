<?php include_once('vue/header.php'); ?>
<?php foreach ($tech as $row)
$technologieJoueur = new Technologie($row['idTechnologie'])?>
<div class="row">
<div class="small-6 large-12 columns">
<div class="panel">
<div class="row">
  <h1><?php echo $row['nomTechnologie'];?></h1>
            <hr>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <img src="<?php echo $technologieJoueur->getImage();?>" /> </div>
            <div class="small-8 columns">
              <h4> Coût de la Technologie:</h4>
              <p>test</p>
              <h5> Description:</h5>
              <p><?php echo $technologieJoueur->getDescriptionTech();?></p>
            </div>
          </div>
  </div>
</div>
</div>
<?php}?>
<?php include_once('vue/footer.php'); ?>