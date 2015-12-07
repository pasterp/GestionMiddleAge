<?php include_once('vue/header.php'); ?>


<?php foreach ($techConnues as $te) {
    ?>
<div class="row">
<div class="small-6 large-12 columns">
<div class="panel">
<div class="row">
  <h1><?php echo ucfirst($te->getNomTech());?></h1>
            <hr>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <img src="<?php echo $te->getImage();?>" /> </div>
            <div class="small-8 columns">
              <h4> Coût de la Technologie:</h4>
              <p>test</p>
              <h5> Description:</h5>
              <p><?php echo ucfirst($te->getDescriptionTech());?></p>
            </div>
          </div>
  </div>
</div>
</div>
<?php } ?>

<?php foreach ($techInconnues as $te) {
    ?>
    <div class="row">
        <div class="small-6 large-12 columns">
            <div class="panel">
                <div class="row">
                    <h1 style="color: lightgrey" title="Vous n'avez pas encore découvert cette technologie"><i class="step fi-alert"> </i><?php echo ucfirst($te[0]->getNomTech());?></h1>
                    <hr>
                </div>
                <div class="row" >
                    <div class="small-4 columns">
                        <img style="opacity: 0.4" src="<?php echo $te[0]->getImage();?>" /> </div>
                    <div class="small-8 columns" >
                        <h4 style="color: lightgrey"> Coût de la Technologie:</h4>

                        <p style="color: lightgrey">
                        <span>
                          <?php foreach ($te[1] as $rez) {
                            $rezA = new Ressource($rez[1]);
                            echo "<span>".$rez[0]."</span><img src=\"".$rezA->getImage()."\" style=\"width:35px; height:35px; opacity: 0.4\"  title=\"".$rezA->getNomRessource()."\" />";
                          } ?>
                        </span>
                        </p>
                        <h5 style="color: lightgrey"> Description:</h5>
                        <p style="color: lightgrey"><?php echo ucfirst($te[0]->getDescriptionTech());?></p>
                    </div>
                </div>
                <a href="index.php?page=post_tech&tech=create&id=<?php echo $te[0]->getIdTech(); ?>" class="button">Ajouter</a>
            </div>
        </div>
    </div>
<?php } ?>

<?php include_once('vue/footer.php'); ?>