<!DOCTYPE html>
<html lang="fr">
  <head>
      <meta charset="utf-8"> 
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>GDC - L'équipe</title>
      <?php include("assets/include/head.php");?>
  </head>
    
  
  <body>
  <?php
  $this->load->view("include/visitor_counter.php");
  ?>
     <!-- navbar tout en haut en bleu -->
     <?php if($idpays!=null){?>
     <?php $this->load->view("include/navbar");?>
       
     <?php } else { ?>
     <?php $this->load->view("include/navbar1");?>
     <?php } ?>
    <!-- fin navbar tout en haut en bleu -->

    <!-- navbar principal -->
    <?php if($idpays!=null){?>
      <?php $this->load->view("include/header_rubriques.php");?>
      <nav  aria-label="breadcrumb">
        <ol class="breadcrumb py-0 bleuu">
          <li class="breadcrumb-item"><a class="arborescence" href="<?php echo site_url("Accueil_Controller/");?>">Accueil</a></li>
          <?php foreach($singlepays as $pays) { ?>
            <li class="breadcrumb-item" style="margin-left:-3px"><a  class="arborescence" style="margin-left:-5px" href="<?php echo site_url('Pays_Controller/pays');?>">Pays</a></li>
            <li class="breadcrumb-item" style="margin-left:-3px"><a  class="arborescence" style="margin-left:-5px" href="<?php echo site_url('Rubrique_Controller/listerubriques');?>/<?php echo $pays->ID_PAYS;?>"><?php echo $pays->NOM_PAYS;?></a></li>
          <?php } ?>
          <li class="breadcrumb-item"><a class="arborescence" href="#">Equipe</a></li>

      
        </ol>
      </nav>

    <?php } else{ ?>
        <?php include("assets/include/header.php");?>
        <nav  aria-label="breadcrumb">
        <ol class="breadcrumb py-0 bleuu">
          <li class="breadcrumb-item"><a class="arborescence" href="<?php echo site_url("Accueil_Controller/");?>">Accueil</a></li>
          <li class="breadcrumb-item"><a class="arborescence" href="#">Equipe</a></li>

      
        </ol>
      </nav>
    <?php } ?>
    <!-- fin navbar principal -->

  
    
             

      <!-- arborescence du site -->

     
      <!-- arborescence du site -->

      <!-- main body -->
      <div class="web-only">
      <?php if($type==1) { ?>
      <div class="container" style="margin-bottom:5%;">
        <div class="row">
          <div class="col-12" style="margin-top:3%;margin-bottom:2%">
          <h4 class="titre-equipe text-center">L'equipe internationale<h4>
</div>
 
<?php foreach($international as $inter) { ?>
          <div class="col m-1 card">
          <img class="img-equipe rounded-circle"  src="<?php echo base_url()?>/assets/image/<?php echo $inter->PROFIL_MEMBRE?>">

            <p class="text-center"><?php echo $inter->NOM_MEMBRE;?></p>
            <p class="introduction-equipe text-center"><?php echo $inter->POSTE?></p>
          </div>
          <?php } ?>
         
         
        </div>
      </div>

      <?php } ?>
      <?php if($type==2) { ?>
      <div class="container" style="margin-bottom:5%;">
        <div class="row">
          <div class="col-12" style="margin-top:3%;margin-bottom:2%">
          <h4 class="titre-equipe text-center">L'equipe de <?php echo $nompays;?><h4>
</div>
 

      <?php foreach($nationale as $nat){ ?>
          <div class="col m-1 card">
          <img class="img-equipe rounded-circle"  src="<?php echo base_url()?>/assets/image/<?php echo $nat->PROFIL_MEMBRE;?>">
          <p class="text-center"><?php echo $nat->NOM_MEMBRE;?></p>
            <p class="introduction-equipe text-center"><?php echo $nat->POSTE;?></p>
         
          </div>
          <?php } ?>
          
   
 
        </div>
      </div>
   
      <div class="container" style="margin-bottom:5%;">
        <div class="row">
          <div class="col-12" style="margin-top:3%;margin-bottom:2%">
          <h4 class="titre-equipe text-center">Nos stagiaires<h4>
</div>
 

      
         <?php foreach($stagiaire as $stage) { ?> 
          <div class="col-3 card" style="margin:auto">
          <img class="img-equipe rounded-circle"  src="<?php echo base_url()?>/assets/image/<?php echo $stage->PROFIL_MEMBRE;?>">

            
          <p class="text-center"><?php echo $stage->NOM_MEMBRE;?></p>
          <p class="introduction-equipe text-center"><?php echo $stage->POSTE;?></p>
          </div>
          <?php } ?>
        </div>
      </div>
      <?php } ?>
      <!-- fin main body -->
</div>

<div class="mobile-only">
      <?php if($type==1) { ?>
      <div class="container" style="margin-bottom:5%;">
        <div class="row">
          <div class="col-12" style="margin-top:3%;margin-bottom:2%">
          <h4 class="titre-equipe text-center">L'equipe internationale<h4>
</div>
 
        <?php foreach($international as $inter) { ?>
          <div class="col-6 card" style="margin:auto;">
          <img class="img-equipe2 rounded-circle"  src="<?php echo base_url()?>/assets/image/<?php echo $inter->PROFIL_MEMBRE;?>">

            <p class="text-center"><?php echo $inter->NOM_MEMBRE;?></p>
            <p class="introduction-equipe text-center"><?php echo $inter->POSTE;?></p>
          </div>
        <?php } ?>
         
       
        </div>
      </div>
      <?php } ?>
      <?php if($type==2) { ?>
      <div class="container" style="margin-bottom:5%;">
        <div class="row">
          <div class="col-12" style="margin-top:3%;margin-bottom:2%">
          <h4 class="titre-equipe text-center">L'equipe de <?php echo $nompays?><h4>
</div>
 

      <?php foreach($nationale as $nat) { ?>
          <div class="col-6 card" style="margin:auto;height:174px">
          <img class="img-equipe2 rounded-circle"  src="<?php echo base_url()?>/assets/image/<?php echo $nat->PROFIL_MEMBRE;?>">
          <p class="text-center"><?php echo $nat->NOM_MEMBRE;?></p>
            <p class="introduction-equipe text-center"><?php echo $nat->POSTE;?></p>
         
          </div>
      <?php } ?>
          

     
        </div>
      </div>
   
      <div class="container" style="margin-bottom:5%;">
        <div class="row">
          <div class="col-12" style="margin-top:3%;margin-bottom:2%">
          <h4 class="titre-equipe text-center">Nos stagiaires<h4>
</div>
 

      
         <?php foreach($stagiaire as $stage) { ?>
          <div class="col-12 card" style="margin:auto">
          <img class="img-equipe2 rounded-circle"  src="<?php echo base_url()?>/assets/image/<?php echo $stage->PROFIL_MEMBRE;?>">

            
          <p class="text-center"><?php echo $stage->NOM_MEMBRE;?></p>
          <p class="introduction-equipe text-center"><?php echo $stage->POSTE;?></p>
          </div>
         <?php } ?>
        </div>
      </div>
      <?php } ?>
      <!-- fin main body -->
</div>
      <!-- partenaire -->
      
      
      <footer>
        <?php include("assets/include/footer.php");?>
      </footer>
  </body>
</html>