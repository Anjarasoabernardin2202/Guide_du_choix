<!DOCTYPE html>
<html lang="fr">
  <head>
      <meta charset="utf-8"> 
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>GDC - Guides des metiers</title>
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


      <!-- main body -->
       <!-- sommaire vers citemetiers (le groupe des metiers) -->

      <a href="<?php echo site_url('Citemetiers_Controller/liste/1');?>" class="btn" style="margin-left:7%;margin-top:1%;height:40px" type="submit">Retour</a>
      
        <div class="container web-only" style="margin-top:3%;">
            <div class="row">
                <div class="col-12" style="margin:auto">
                    <div class="card" style="background-color:rgba(135, 206, 250,0.3);">
                        <div class="container" style="margin-top:3%">
                            <div class="row">
                                <div class="col-12">

                                  <?php if($idmetier ==1){?> 


                        <h5 style="color:rgb(78;78;78)"class="titre-liste-guides text-center">Liste de nos guides metiers des secteurs agricoles,agro-alimentaires et environnement</h5>
                        
                        <div class="col-10" style="margin:auto;">
                        
                        <p style="color:#007bff"> Biologiste<br><a href="<?php echo site_url('Citemetiers_Controller/detail1');?>/1" class="guide"> Lire la suite ==> </a> </p>

                        <p style="color:#007bff"> Ingénieur Agronome<br><a href="<?php echo site_url('Citemetiers_Controller/detail1');?>/2" class="guide">  Lire la suite ==></a> </p>

                        <p style="color:#007bff"> Technicien industries, agroalimentaires<br><a href="<?php echo site_url('Citemetiers_Controller/detail1');?>/3" class="guide"> Lire la suite ==> </a> </p>

                        <p style="color:#007bff"> Ingénieur / Master en agroalimentaire<br><a href="<?php echo site_url('Citemetiers_Controller/detail1');?>/4" class="guide"> Lire la suite ==></a> </p>

                        <p style="color:#007bff"> Eco-conseiller / Consultant écologie<br><a href="<?php echo site_url('Citemetiers_Controller/detail1');?>/5" class="guide"> Lire la suite ==></a> </p>

                        <p style="color:#007bff"> Ingénieur en environnement<br><a href="<?php echo site_url('Citemetiers_Controller/detail1');?>/6" class="guide"> Lire la suite ==> </a> </p>
                                
                                <?php } else if ($idmetier ==3) {?>
                        <h5 style="color:rgb(78;78;78)"class="titre-liste-guides text-center">Liste de nos guides metiers des secteurs technologiques informatiques, communications et informatiques</h5>
                        
                        <div class="col-10" style="margin:auto;">
                        
                        <p style="color:#007bff"> Ingénieur Informatique Industrielle<br><a href="<?php echo site_url('Citemetiers_Controller/detail1');?>/7" class="guide"> Lire la suite ==> </a> </p>

                        <p style="color:#007bff"> Ingénieur Big Data<br><a href="<?php echo site_url('Citemetiers_Controller/detail1');?>/8" class="guide">  Lire la suite ==></a> </p>

                        <p style="color:#007bff"> Ingénieur Informaticien<br><a href="<?php echo site_url('Citemetiers_Controller/detail1');?>/9" class="guide"> Lire la suite ==> </a> </p>

                        <p style="color:#007bff"> Administrateur de base de données<br><a href="<?php echo site_url('Citemetiers_Controller/detail1');?>/10" class="guide"> Lire la suite ==></a> </p>

                        <p style="color:#007bff"> Administrateur systèmes et réseaux<br><a href="<?php echo site_url('Citemetiers_Controller/detail1');?>/11" class="guide"> Lire la suite ==></a> </p>

                        <p style="color:#007bff"> Architecte de réseau<br><a href="<?php echo site_url('Citemetiers_Controller/detail1');?>/12" class="guide"> Lire la suite ==> </a> </p>

                        <p style="color:#007bff"> Intégrateur Web<br><a href="<?php echo site_url('Citemetiers_Controller/detail1');?>/13" class="guide"> Lire la suite ==> </a> </p>

                        <p style="color:#007bff"> Technicien de réseau<br><a href="<?php echo site_url('Citemetiers_Controller/detail1');?>/14" class="guide"> Lire la suite ==></a> </p>

                        <p style="color:#007bff"> Web Designer<br><a href="<?php echo site_url('Citemetiers_Controller/detail1');?>/15" class="guide"> Lire la suite ==></a> </p>

                        <p style="color:#007bff"> Web Master<br><a href="<?php echo site_url('Citemetiers_Controller/detail1');?>/16" class="guide"> Lire la suite ==> </a> </p>     
                                
                                <?php } else if ($idmetier ==2) {?>
                        <h5 style="color:rgb(78;78;78)"class="titre-liste-guides text-center">Liste de nos guides metiers du secteur médical et soins</h5>
                        
                        <div class="col-10" style="margin:auto;">
                        
                        <p style="color:#007bff"> Aide-soignant / Aide-soignante<br><a href="<?php echo site_url('Citemetiers_Controller/detail1');?>/17" class="guide"> Lire la suite ==> </a> </p>

                        <p style="color:#007bff"> Technicien en analyses biomédicales / Technicienne en analyses biomédicales<br><a href="<?php echo site_url('Citemetiers_Controller/detail1');?>/18" class="guide">  Lire la suite ==></a> </p>

                        <p style="color:#007bff"> Infirmier / Infirmière<br><a href="<?php echo site_url('Citemetiers_Controller/detail1');?>/19" class="guide"> Lire la suite ==> </a> </p>

                        <p style="color:#007bff"> Sage-Femme<br><a href="<?php echo site_url('Citemetiers_Controller/detail1');?>/20" class="guide"> Lire la suite ==></a> </p>
                              
                         </div>
                              <?php } else if ($idmetier ==4) {?>

                                <?php }?>
                       
                        
            </div>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
            </div>
      
      <div class="container mobile-only" style="margin-top:3%;">
            <div class="row">
                <div class="col-11" style="margin:auto">
                    <div class="card" style="background-color:rgba(135, 206, 250,0.3);">
                        <div class="container" style="margin-top:3%">
                            <div class="row">
                                <div class="col-12">
                                   <?php if($idmetier ==1){?> 

                        <h6 style="color:rgb(78;78;78)"class="titre-liste-guides text-center">Liste de nos guides metiers des secteurs Agricoles / agro-alimentaires / Environnement</h6>
                        
                        <div style="margin:auto;">
                        
                        <p style="color:#007bff;font-size: 13px"> Biologiste<br><a href="<?php echo site_url('Citemetiers_Controller/detail1');?>/1');?>" class="guide" style="font-size: 12px"> Lire la suite ==> </a> </p>

                        <p style="color:#007bff;font-size: 13px"> Ingénieur Agronome<br><a href="<?php echo site_url('Citemetiers_Controller/detail1');?>/2');?>" class="guide" style="font-size: 12px">  Lire la suite ==></a> </p>

                        <p style="color:#007bff;font-size: 13px"> Technicien industries, agroalimentaires<br><a href="<?php echo site_url('Citemetiers_Controller/detail1');?>/3');?>" class="guide" style="font-size: 12px"> Lire la suite ==> </a> </p>

                        <p style="color:#007bff;font-size: 13px"> Ingénieur / Master en agroalimentaire<br><a href="<?php echo site_url('Citemetiers_Controller/detail1');?>/4');?>" class="guide" style="font-size: 12px"> Lire la suite ==></a> </p>

                        <p style="color:#007bff;font-size: 13px"> Eco-conseiller / Consultant écologie<br><a href="<?php echo site_url('Citemetiers_Controller/detail1');?>/5');?>" class="guide" style="font-size: 12px"> Lire la suite ==></a> </p>

                        <p style="color:#007bff;font-size: 13px"> Ingénieur en environnement<br><a href="<?php echo site_url('Citemetiers_Controller/detail1');?>/6');?>" class="guide" style="font-size: 12px"> Lire la suite ==> </a> </p>
                                        
                                        <?php } else if ($idmetier ==2) {?>
                             
                                <?php } ?>  
                             
                        </div>
                        
            </div>
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
