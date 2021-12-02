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
      <div class="web-only">
    <?php $this->load->view('include/header_rubriques.php');?>
</div>

    <!-- main body -->
    <div class="web-only">
    <?php foreach($single as $guide) { ?>
    <a href="<?php echo site_url('Guide_Controller/detailguide');?>/<?php echo $guide->ID_GUIDE;?>/1" class="btn" style="margin-left: 1%;margin-top:2%;" type = "button">Retour</a><br /><br />
    <div class="container" style="margin-bottom:8%;">
      <div class="row">
        <div class="col-7" style="margin:auto">
          <div class="card" >
          
   
        
   
            <h5 class="titre-detail-guide" style="color:gray;text-align:center;margin-top:30px;"><?php echo $guide->NOM_GUIDE;?></h5>
            <?php } ?>
            <ul style="list-style-type:none;text-align:center">
            <?php if($listechapitres != null){?>
              <li class="actualite" id="essentiel" >L'essentiel en quelques questions</li>
              <?php foreach($listechapitres as $chapitre) { ?>
              <li>
            
              <?php if($chapitre['SOUS_CHAPITRE'] != NULL) { ?>
      
      <a href="<?php echo site_url('Guide_Controller/guide');?>/<?php echo $chapitre['ID_GUIDE'];?>/<?php echo $chapitre['NUMERO_CHAPITRE']?>/1" id="essentiel" style="text-decoration:none;" class="chapitre" id="essentiel"><?php echo $chapitre['NUMERO_CHAPITRE'];?> - <?php echo $chapitre['NOM_CHAPITRE'];?></a>
   
     <?php } else{  ?>
       <a href="<?php echo site_url("Guide_Controller/sousguide")?>/<?php echo $chapitre['ID_CHAPITRE']?>" id="essentiel" style="text-decoration:none;" class="chapitre" id="essentiel"><?php echo $chapitre['NUMERO_CHAPITRE'];?> - <?php echo $chapitre['NOM_CHAPITRE'];?></a>
     <?php } ?>
            
                </li>
         
                  <?php } ?>
                        <?php } ?>
                        <?php if($points != null) { ?> 
                  <li class="actualite "  id="essentiel" >L'essentiel en quelques points</li>
              <?php foreach($points as $point) { ?>
              <li>
            
              <?php if($point['SOUS_CHAPITRE'] != NULL) { ?> 
               <a href="<?php echo site_url('Guide_Controller/guide');?>/<?php echo $point['ID_GUIDE'];?>/<?php echo $point['NUMERO_CHAPITRE']?>/1" style="text-decoration:none;" class="chapitre" id="essentiel"><?php echo $point['NUMERO_CHAPITRE'];?> - <?php echo $point['NOM_CHAPITRE'];?></a>
   
              <?php } else { ?>
                <a href="<?php echo site_url("Guide_Controller/sousguide")?>/<?php echo $point['ID_CHAPITRE']?>" style="text-decoration:none;" class="chapitre" id="essentiel"><?php echo $point['NUMERO_CHAPITRE'];?> - <?php echo $point['NOM_CHAPITRE'];?></a>
              <?php } ?>
             
                </li>
            
                  <?php } ?>
                        <?php } ?>
                       
              <li class="actualite" id="essentiel" >Autres articles de nos experts</li> 
              <?php foreach($listearticles as $article) { ?>
              <li>
                <a href="<?php echo site_url("Guide_Controller/sousguide")?>/<?php echo $article['ID_CHAPITRE']?>" id="essentiel" style="text-decoration:none;" class="chapitre" id="essentiel"><?php echo $article['NOM_CHAPITRE'];?></a>
                </li>
                 
                  <?php } ?>  
                 
            </ul>
          </div>

       </div>
      </div>
    </div>
   
           </div>
           </div>
    <div class="mobile-only">
    
    <div class="col-12 wrapper-guides" style="margin-bottom: 25%">
       <div class="liste-detail-guide">
       <?php foreach($single as $guide) { ?>

      <a href="<?php echo site_url('Guide_Controller/detailguide');?>/<?php echo $guide->ID_GUIDE;?>/1" class="btn mobile-only" style="margin-left: 1%;margin-top:2%;" type = "button">Retour</a><br /><br />

         <h5 class="titre-detail-guide" style=""><?php echo $guide->NOM_GUIDE;?></h5>
         <?php } ?>
         <ul style="list-style-type:none;">
         <?php foreach($listechapitres as $chapitre) { ?>
           <li>
        
           <?php if($chapitre['SOUS_CHAPITRE'] != NULL) { ?>
            <a href="<?php echo site_url('Guide_Controller/guide');?>/<?php echo $chapitre['ID_GUIDE'];?>/<?php echo $chapitre['NUMERO_CHAPITRE']?>/1" id="essentiel" style="text-decoration:none;" class="chapitre" id="essentiel"><?php echo $chapitre['NUMERO_CHAPITRE'];?> - <?php echo $chapitre['NOM_CHAPITRE'];?></a>

<?php } else{ ?>
  <a href="<?php echo site_url("Guide_Controller/sousguide")?>/<?php echo $chapitre['ID_CHAPITRE']?>" style="text-decoration:none;" class="chapitre" id="essentiel"><?php echo $chapitre['NUMERO_CHAPITRE'];?> - <?php echo $chapitre['NOM_CHAPITRE'];?></a>
<?php } ?>

<li>

     
             </li>
      
               <?php } ?>
               <?php if($points != null) { ?> 
               <li class="actualite "  id="essentiel" >L'essentiel en quelques points</li>
           <?php foreach($points as $point) { ?>
           <li>
          
           <?php if($point['SOUS_CHAPITRE'] != NULL) { ?>
            <a href="<?php echo site_url('Guide_Controller/guide');?>/<?php echo $point['ID_GUIDE'];?>/<?php echo $point['NUMERO_CHAPITRE']?>/1" style="text-decoration:none;" class="chapitre" id="essentiel"><?php echo $point['NUMERO_CHAPITRE'];?> - <?php echo $point['NOM_CHAPITRE'];?></a>

           <?php } else{ ?> 
             <a href="<?php echo site_url("Guide_Controller/sousguide")?>/<?php echo $point['ID_CHAPITRE']?>" style="text-decoration:none;" class="chapitre" id="essentiel"><?php echo $point['NUMERO_CHAPITRE'];?> - <?php echo $point['NOM_CHAPITRE'];?></a>
           <?php } ?>
       
             </li>
         
               <?php } ?>
                     <?php } ?>
                     <li class="actualite" id="essentiel" >Autres articles de nos experts</li> 
           <?php foreach($listearticles as $article) { ?>
           <li>
             <a href="<?php echo site_url("Guide_Controller/sousguide")?>/<?php echo $article['ID_CHAPITRE']?>" id="essentiel" style="text-decoration:none;" class="chapitre" id="essentiel"><?php echo $article['NOM_CHAPITRE'];?></a>
             </li>
              
               <?php } ?>  
        
         
                
         </ul>
       </div>
     </div>
    </div>
   
         

   
        
    <footer >
      <?php include("assets/include/footer.php");?>
    </footer>
  </body>
</html>