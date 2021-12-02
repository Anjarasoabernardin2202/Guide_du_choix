<!DOCTYPE html>
<html lang="fr">
  <head>
      <meta charset="utf-8"> 
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>GDC - Commune</title>
      <?php include("assets/include/head.php");?>
      
  </head>
    
  
  <body>
  <?php
  $this->load->view("include/visitor_counter.php");
  ?>
     <!-- navbar tout en haut en bleu -->
     <?php $this->load->view("include/navbar1");?>
     
    <!-- fin navbar tout en haut en bleu -->

    <!-- navbar principal -->
        <?php $this->load->view("include/header_rubriques.php");?>
       
    <!-- fin navbar principal -->

    


      <!-- arborescence du site -->
      <nav  aria-label="breadcrumb">
        <ol class="breadcrumb py-0 bleuu">
          <li class="breadcrumb-item"><a class="arborescence" href="<?php echo site_url("Accueil_Controller/");?>">Accueil</a></li>
            <li class="breadcrumb-item"><a class="arborescence " href="<?php echo site_url("Pays_Controller/pays");?>">Pays</a></li>
          
            <?php foreach($singlepays as $pays) { ?>
              <li class="breadcrumb-item"><a class="arborescence " href="<?php echo site_url("Rubrique_Controller/listerubriques/1")?>"><?php echo $pays->NOM_PAYS;?></a></li>
            <?php } ?>
            <li class="breadcrumb-item"><a class="arborescence " href="<?php echo site_url("Commune_Controller/liste/1")?>">Commune</a></li>
                <?php foreach($single as $com) { ?>
            <li class="breadcrumb-item"><a class="arborescence " href="#"><?php echo $com->NOM_COMMUNE;?></a></li>

                <?php } ?>
        </ol>
      </nav>
      <!-- arborescence du site -->

      <!-- main body -->
      
        <div class="container" style="margin-top:5%;">
            <div class="row">
                <div class="col-8" style="margin:auto">
                    <div class="card">
                        <div class="container" style="margin-top:3%">
                            <div class="row">
                                <div class="col-12">
                        
                        <?php foreach($single as $commune) { ?>
                          <?php $alphabet = substr($commune->NOM_COMMUNE,0,1);?>
                          <?php if($alphabet === 'A') { ?>
                           <p class="text-center"><img style="width:auto;height:100px" src="<?php echo base_url();?>/assets/image/<?php echo $commune->LOGO_COMMUNE;?>"> Commune urbaine d'<a href="<?php echo site_url("Commune_Controller/detail")?>/1/<?php echo $commune->ID_COMMUNE;?>"><?php echo $commune->NOM_COMMUNE;?></a></p>
                          <?php } else { ?>
                            <p class="text-center"><img style="width:auto;height:100px" src="<?php echo base_url();?>/assets/image/<?php echo $commune->LOGO_COMMUNE;?>"> Commune urbaine de <a href="<?php echo site_url("Commune_Controller/detail")?>/1/<?php echo $commune->ID_COMMUNE;?>"><?php echo $commune->NOM_COMMUNE;?></a></p>

                           <?php } ?>
                          
                            <!-- <div class="text-center"> -->
                        <!-- </div> -->
                           <?php } ?> 
                           <p class="text-align:justify;margin-top:3%;margin-right:2%;margin-left:2%">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        
            </div>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
            </div>
      
      
        
    
      <!-- fin main body -->
      


      
      
  </body>
  <footer style="margin-top: 200px">
        <?php include("assets/include/footer.php");?>
  </footer>

</html>