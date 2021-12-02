<!DOCTYPE html>
<html lang="fr">
  <head>
      <meta charset="utf-8"> 
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>GDC - Guide</title>
      <?php include("assets/include/head.php");?>
      
  </head>

  <body>
  <?php
  $this->load->view("include/visitor_counter.php");
  ?>
   
      <!-- navbar tout en haut en bleu -->
      <?php $this->load->view("include/navbar.php");?>
      <!-- fin navbar tout en haut en bleu -->


    <!-- main body -->
  
    <div class="web-only">
    <?php foreach($single as $guide) { ?>
         <a href="<?php echo site_url('Guide_Controller/listeguide');?>/<?php echo $guide->ID_RUBRIQUE;?>" class="btn" style="margin-left:3%;margin-top: 2%;" type = "button">Retour</a><br /><br />
    <?php } ?>
    <div class="container">
      <div class="row">
        <div class="col-10" style="margin:auto">
       
      
    
          <div class="card" style="margin-bottom: 10%">
            <?php foreach($singlechapitre as $souschapitre) { ?>
              
              <h5 class="titre-souschapitre text-center"><?php echo $souschapitre->NOM_CHAPITRE;?></h5>
            <?php } ?>   
            
            <div class="row">
              <?php foreach($listecontenus as $contents) { ?>
                <div class="col-12 text-center">
                     <a href="<?php echo site_url('Guide_Controller/sousguide');?>/<?php echo $contents->ID_SOUSCHAPITRE;?>" class="question"><p id="positionquestion"><i class="fa fa-check" style="color: rgb(53, 140, 237)"></i> <?php echo $contents->NOM_SOUSCHAPITRE;?></p>
                     </a>
                </div>
              <?php } ?>
              <div class="col-12 text-center" style="margin-bottom:3%">
              <?php if($contents->IMAGE_SOUSCHAPITRE2 != null || $contents->IMAGE_SOUSCHAPITRE != null) { ?>
              <img  src="<?php echo base_url();?>assets/image/<?php echo $contents->IMAGE_SOUSCHAPITRE;?>" class="img-fluid question-guide col-3">
              <img  src="<?php echo base_url();?>assets/image/<?php echo $contents->IMAGE_SOUSCHAPITRE2;?>" class="img-fluid question-guide col-3">
              <?php } ?>
              </div>
            </div>
          </div>
    
         
        </div>
      </div>
    </div>

    </div>
    <div class="mobile-only">
    <?php foreach($single as $guide) { ?>
         <a href="<?php echo site_url('Guide_Controller/listeguide');?>/<?php echo $guide->ID_RUBRIQUE;?>" class="btn" style="margin-left:3%;margin-top: 2%;margin-bottom: -10%" type = "button">Retour</a><br /><br />
    <?php } ?>
    <div class="col-12 wrapper-guides">
       
      
    
       <div class="liste-sous-chapitre" style="margin-bottom: 10%">
         <?php foreach($singlechapitre as $souschapitre) { ?>
           
           <h5 class="titre-souschapitre text-center"><?php echo $souschapitre->NOM_CHAPITRE;?></h5>
         <?php } ?>   
         
         <div class="row">
           <?php foreach($listecontenus as $contents) { ?>
             <div class="col-12 text-center">
                  <a href="<?php echo site_url('Guide_Controller/sousguide');?>/<?php echo $contents->ID_SOUSCHAPITRE;?>" class="question"><p id="positionquestion"><i class="fa fa-check" style="color: rgb(53, 140, 237)"></i> <?php echo $contents->NOM_SOUSCHAPITRE;?></p>
                  </a>
             </div>
           <?php } ?>
           <div class="col-12 text-center">
           <?php if($contents->IMAGE_SOUSCHAPITRE2 != null || $contents->IMAGE_SOUSCHAPITRE != null) { ?>
           <img  src="<?php echo base_url();?>assets/image/<?php echo $contents->IMAGE_SOUSCHAPITRE;?>" class="img-fluid question-guide col-5">
           <img  src="<?php echo base_url();?>assets/image/<?php echo $contents->IMAGE_SOUSCHAPITRE2;?>" class="img-fluid question-guide col-5">
           <?php } ?>
           </div>
         </div>
       </div>
 
      
     </div></div>
  

    
  </body>
  <footer>
      <?php include("assets/include/footer.php");?>
  </footer>
</html>