<?php include_once('vue/header.php'); ?>

<?php foreach ($uniConnues as $uni) {
    ?>
<div class="row">
<div class="small-6 large-12 columns">
<div class="panel">
<div class="row">
  <h1><?php echo ucfirst($uni->getNomUnite());?></h1>
            <hr>
          </div>
          <div class="row">
            <div class="small-4 columns">
              <img src="<?php echo $uni->getImage();?>" /> </div>
            <div class="small-8 columns">
              <h4> Coût de l'unité:</h4>
              <p>test</p>
              <h5> Description:</h5>
              <p><?php echo ucfirst($uni->getDescriptionUnite());?></p>
              <h5> Puissance:</h5>
              <p><?php echo $uni->getPuissance();?></p>
            </div>
          </div>
  </div>
</div>
</div>
<?php}?>

<?php foreach ($uniInconnues as $uni2) {
    ?>
    <div class="row">
        <div class="small-6 large-12 columns">
            <div class="panel">
                <div class="row">
                    <h1 style="color: lightgrey" title="Vous n'avez pas encore découvert cette technologie"><i class="step fi-alert"> </i><?php echo ucfirst($te->getNomTech());?></h1>
                    <hr>
                </div>
                <div class="row" >
                    <div class="small-4 columns">
                        <img style="opacity: 0.4" src="<?php echo $uni2->getImage();?>" /> </div>
                    <div class="small-8 columns" >
                        <h4 style="color: lightgrey"> Coût de la Technologie:</h4>
                        <p style="color: lightgrey">test</p>
                        <h5 style="color: lightgrey"> Description:</h5>
                        <p style="color: lightgrey"><?php echo ucfirst($uni2->getDescriptionUnite());?></p>
                    </div>
                </div>
                <?php if (ressourcesJoueur > $uni2->getRessUnite()){?>
                  <a href="index.php?page=post_action&action=create&id=1" class="button">Ajouter</a>
                  <?php
                  else {?>
                  <a class="disabled button" href="#">Ajouter</a>
                  <?php}
              }?>
            </div>
        </div>
    </div>
<?php } ?>
<?php include_once('vue/footer.php'); ?>