<!DOCTYPE html>
<html lang="fr">
  <head>
      <meta charset="utf-8"> 
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>GDC - Sponsor</title>
      <?php include("assets/include/head.php");?>
    
  </head>
    
  
  <body>
  <?php
  $this->load->view("include/visitor_counter.php");
  ?>
    <!-- navbar tout en haut en bleu -->
    <?php $this->load->view("include/navbar.php");?>
     
    <!-- fin navbar tout en haut en bleu -->

    <?php if($idpays!=null){?>
      <?php $this->load->view("include/header_rubriques.php");?>
      <nav  aria-label="breadcrumb">
        <ol class="breadcrumb py-0 bleuu">
          <li class="breadcrumb-item"><a class="arborescence" href="<?php echo site_url("Accueil_Controller/");?>">Accueil</a></li>
          <?php foreach($singlepays as $pays) { ?>
            <li class="breadcrumb-item" style="margin-left:-3px"><a  class="arborescence" style="margin-left:-5px" href="<?php echo site_url('Pays_Controller/pays');?>">Pays</a></li>
            <li class="breadcrumb-item" style="margin-left:-3px"><a  class="arborescence" style="margin-left:-5px" href="<?php echo site_url('Rubrique_Controller/listerubriques');?>/<?php echo $pays->ID_PAYS;?>"><?php echo $pays->NOM_PAYS;?></a></li>
          <?php } ?>
          <li class="breadcrumb-item"><a class="arborescence" href="#">Sponsor</a></li>

      
        </ol>
      </nav>

    <?php } else{ ?>
        <?php include("assets/include/header.php");?>
        <nav  aria-label="breadcrumb">
        <ol class="breadcrumb py-0 bleuu">
          <li class="breadcrumb-item"><a class="arborescence" href="<?php echo site_url("Accueil_Controller/");?>">Accueil</a></li>
          <li class="breadcrumb-item"><a class="arborescence" href="#">Sponsor</a></li>

      
        </ol>
      </nav>
    <?php } ?>
 
   <div class="web-only">
      <div class="container" style="margin-top:5%;">
<div class="row">
  <?php foreach($single as $sponsor) { ?>
  <div class="col-4 " style="margin:auto">
          <img src="<?php echo base_url()?>/assets/image/<?php echo $sponsor->IMAGE_SPONSOR;?>">
          </div>
  </div>
  <div class="row" style="margin-top:3%;margin-bottom:3%;">
            <figure class="col m-1 card text-center taille-expert2" >
              <span class="expert  fa fa-list"></span>
              <h4 class="expert">Informations</h4>
              <?php echo $sponsor->INFORMATION_SPONSOR;?>
            </figure>
            <figure class="col m-1 card text-center taille-expert2">
              <span class="expert fa fa-map-marker"></span>
              <h4 class="expert">Coordonnées</h4>
              <?php echo $sponsor->COORDONNEES;?>

            </figure>
            <figure class="col m-1  card text-center taille-expert2">
              <span class="expert fa fa-file"></span>
              <h4 class="expert">Devis</h4>
              <?php echo $sponsor->DEVIS;?>

            </figure>

</div>
  <?php } ?>
      </div>
  </div>
  <div class="mobile-only">
      <div class="container" style="margin-top:5%;">
<div class="row">
  <?php foreach($single as $sponsor) { ?>
  <div class="col-4" >
          <img src="<?php echo base_url()?>/assets/image/<?php echo $sponsor->IMAGE_SPONSOR;?>">
          </div>
  </div>
  <div class="row" style="margin-top:3%;margin-bottom:3%;">
            <figure class="col-12 card text-center taille-expert2" >
              <span class="expert  fa fa-list"></span>
              <h4 class="expert">Informations</h4>
              <?php echo $sponsor->INFORMATION_SPONSOR;?>
            </figure>
            <figure class="col-12 card text-center taille-expert2">
              <span class="expert fa fa-map-marker"></span>
              <h4 class="expert">Coordonnées</h4>
              <?php echo $sponsor->COORDONNEES;?>

            </figure>
            <figure class="col-12  card text-center taille-expert2">
              <span class="expert fa fa-file"></span>
              <h4 class="expert">Devis</h4>
              <?php echo $sponsor->DEVIS;?>

            </figure>

</div>
  <?php } ?>
      </div>
  </div>

      <!-- partenaires  -->

        
      <!-- fin partenaires -->

      <footer>
        <?php include("assets/include/footer.php");?>
      </footer>
  </body>
</html>