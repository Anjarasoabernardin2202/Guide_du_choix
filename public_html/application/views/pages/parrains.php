<!DOCTYPE html>
<html lang="fr">
  <head>
      <meta charset="utf-8"> 
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>GDC - Liste des parrains</title>
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
 
    

    <!-- arborescence du site -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb py-0 bleuu">
        <li class="breadcrumb-item"><a class="arborescence " href="<?php echo site_url('Accueil_Controller/');?>">Accueil</a></li>
        <li class="breadcrumb-item"><a class="arborescence " href="#">Parrains internationaux</a></li>
      </ol>
    </nav>
    <!-- arborescence du site -->
  <div class="wrapper-rubriques" style="margin-top:5%">
    <div class="liste-parrains">
    <?php foreach($liste as $parrains) { ?>
                <div class="card" style="margin-bottom:2%;height:200px">
                <div class="container">
                  <div class="row">
               
                      <div class="col-4">
                      <img class="img-parrain"  src="<?php echo base_url();?>/assets/image/<?php echo $parrains->IMAGE_PARTENAIRE;?>">

                      </div>
                      <div class="col-8">
                        <h3 class="titre-parrain"><?php echo $parrains->NOM_PARTENAIRE?></h3>
                        <p class="text-parrain"><?php echo $parrains->INTRODUCTION_PARTENAIRE;?></p>
                      </div>
                    </div>
                
                </div>
                  
            </div>
            <?php } ?>
</div>

  </div>
   

 
        
      <!-- fin partenaires -->

      <footer>
        <?php include("assets/include/footer.php");?>
      </footer>
  </body>
</html>