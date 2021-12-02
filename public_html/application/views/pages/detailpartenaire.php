<!DOCTYPE html>
<html lang="fr">
  <head>
      <meta charset="utf-8"> 
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>GDC - Parrain</title>
      <?php include("assets/include/head.php");?>
  </head>

  <body>
  <?php
  $this->load->view("include/visitor_counter.php");
  ?>
    <!-- navbar tout en haut en bleu -->
      <?php $this->load->view("include/navbar1.php");?>
    <!-- fin navbar tout en haut en bleu -->

    <!-- navbar principal -->
      <?php include("assets/include/header.php");?>   
    <!-- fin navbar principal -->

    
      <?php $this->load->view('include/nouveautes');?>
   

    <!-- arborescence du site -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb py-0 bg-custom-gray">
        <li class="breadcrumb-item"><a class="arborescence " href="<?php echo site_url('Accueil_Controller/');?>">Accueil</a></li>
        <?php foreach($single as $partner) { ?>
          <div class="row d-flex ml-auto flex-wrap">
              <div class="col-md-12">
                <h5 class="web-only titre"><?php echo $partner->NOM_PARTENAIRE;?></h5>
              </div>
          </div>
        <?php } ?>
      </ol>
    </nav>
    <!-- fin arborescence du site -->

    <div class="wrapper-single">
      <div class="cardnouveaute">
        <?php foreach($single as $partner) { ?>
        <img class="img-partenaire-single" src="<?php echo base_url();?>/assets/image/<?php echo $partner->IMAGE_PARTENAIRE;?>">
        <h5 class="titre-parrain-single text-center"><?php echo $partner->NOM_PARTENAIRE;?></h5>
          <p class="text-parrain-single "> 
            <?php echo $partner->INTRODUCTION_PARTENAIRE;?>
            <?php echo $partner->DESCRIPTION_PARTENAIRE;?>
          </p>
        <?php } ?>
      </div>
      <div class="web-only">
        <div class="actualite-guides">
          <h5 class="actualite">Actualités</h5>
            <div class="row ">
              <div class="col-1">
                <?php foreach($nouveaute as $news) { ?> 
                  <a href="<?php echo site_url("Actualite_Controller/actualite")?>/<?php echo $news->ID_PUB;?>"><img class="img-actualite" src="<?php echo base_url()?>/assets/image/<?php echo $news->IMAGE_PUB;?>"></a>
                <?php } ?>
                </div>
            </div>
          </div>
        </div>
    </div>


    <!-- partenaires  -->
    <?php $this->load->view('include/parrain');?>
    <!-- fin partenaires -->
    
    <footer>
      <?php include("assets/include/footer.php");?>
    </footer>
  </body>
</html>