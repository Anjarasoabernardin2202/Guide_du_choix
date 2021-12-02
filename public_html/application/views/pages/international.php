<!DOCTYPE html>
<html lang="fr">
  <head>
      <meta charset="utf-8"> 
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>GDC - Liste des sponsors</title>
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
 

    <!-- arborescence du site -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb py-0 bleuu">
        <li class="breadcrumb-item"><a class="arborescence " href="<?php echo site_url('Accueil_Controller/');?>">Accueil</a></li>
        <li class="breadcrumb-item"><a class="arborescence " href="#">Sponsor</a></li>

        
      </ol>
    </nav>
    <!-- arborescence du site -->
 
    <div class="col-12 wrapper-equipe" style="margin-bottom:35%">
       
        <div class="equipe" style="margin-top:3%">
          <div class="col-12">
          <div class="col-4 " style="margin-left:32%">
          <img src="<?php echo base_url("assets/image/parrain.png")?>">
          </div>
          <div class="row" style="margin-top:3%;margin-bottom:3%;">
            <figure class="col-4 card text-center taille-expert2" >
              <span class="expert  fa fa-list"></span>
              <h4 class="expert">Informations</h4>
            </figure>
            <figure class="col-4 card text-center taille-expert2">
              <span class="expert fa fa-map-marker"></span>
              <h4 class="expert">Coordonnées</h4>
            </figure>
            <figure class="col-4  card text-center taille-expert2">
              <span class="expert fa fa-file"></span>
              <h4 class="expert">Devis</h4>
            </figure>

</div>
          </div>
        </div>
  
        
      </div>


        
      <!-- fin partenaires -->

      <footer>
        <?php include("assets/include/footer.php");?>
      </footer>
  </body>
</html>