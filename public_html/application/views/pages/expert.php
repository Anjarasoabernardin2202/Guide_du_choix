<!DOCTYPE html>
<html lang="fr">
  <head>
      <meta charset="utf-8"> 
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>GDC - Expert</title>
      <?php include("assets/include/head.php");?>
  </head>
    
  
  <body>
  <?php
  $this->load->view("include/visitor_counter.php");
  ?>
     <!-- navbar tout en haut en bleu -->
     <?php $this->load->view("include/navbar");?>
    <!-- fin navbar tout en haut en bleu -->

    <!-- navbar principal -->
        <?php include("assets/include/header.php");?>
    <!-- fin navbar principal -->

  
    
             

      <!-- arborescence du site -->
      <nav  aria-label="breadcrumb">
        <ol class="breadcrumb py-0 bleuu">
          <li class="breadcrumb-item"><a class="arborescence" href="<?php echo site_url("Accueil_Controller/");?>">Accueil</a></li>
          <li class="breadcrumb-item"><a class="arborescence" href="#">Expert</a></li>

      
        </ol>
      </nav>
      <!-- arborescence du site -->

      <!-- main body -->

      <div class="web-only">
      <div class="container" style="margin-top:5%;">
<div class="row">
  <?php foreach($single as $expert) { ?>
  <div class="col-4 " style="margin:auto">
          <img src="<?php echo base_url()?>/assets/image/<?php echo $expert->LOGO_EXPERT;?>">
          </div>
  </div>
  <div class="row" style="margin-top:3%;margin-bottom:3%;">
            <figure class="col m-1 card text-center taille-expert2" >
              <span class="expert  fa fa-list"></span>
              <h4 class="expert">Informations</h4>
              <?php echo $expert->INFORMATION_EXPERT;?>
            </figure>
            <figure class="col m-1 card text-center taille-expert2">
              <span class="expert fa fa-map-marker"></span>
              <h4 class="expert">Coordonnées</h4>
              <?php echo $expert->COORDONNEES;?>

            </figure>
            <figure class="col m-1  card text-center taille-expert2">
              <span class="expert fa fa-file"></span>
              <h4 class="expert">Devis</h4>
              <?php echo $expert->DEVIS;?>

            </figure>

</div>
  <?php } ?>
      </div>
  </div>
  <div class="mobile-only">
      <div class="container" style="margin-top:5%;">
<div class="row">
  <?php foreach($single as $expert) { ?>
  <div class="col-4" >
          <img src="<?php echo base_url()?>/assets/image/<?php echo $expert->LOGO_EXPERT;?>">
          </div>
  </div>
  <div class="row" style="margin-top:3%;margin-bottom:3%;">
            <figure class="col-12 card text-center taille-expert2" >
              <span class="expert  fa fa-list"></span>
              <h4 class="expert">Informations</h4>
              <?php echo $expert->INFORMATION_EXPERT;?>
            </figure>
            <figure class="col-12 card text-center taille-expert2">
              <span class="expert fa fa-map-marker"></span>
              <h4 class="expert">Coordonnées</h4>
              <?php echo $expert->COORDONNEES;?>

            </figure>
            <figure class="col-12  card text-center taille-expert2">
              <span class="expert fa fa-file"></span>
              <h4 class="expert">Devis</h4>
              <?php echo $expert->DEVIS;?>

            </figure>

</div>
  <?php } ?>
      </div>
  </div>

      <!-- fin main body -->

      <!-- partenaire -->
  
      <!-- fin partenaire -->
      
      <footer>
        <?php include("assets/include/footer.php");?>
      </footer>
  </body>
</html>