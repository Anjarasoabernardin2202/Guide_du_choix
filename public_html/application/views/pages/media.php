<!DOCTYPE html>
<html lang="fr">
  <head>
      <meta charset="utf-8"> 
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>GDC - Liste des rubriques</title>
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
        <?php $this->load->view("include/header_rubriques.php");?>
       
    <!-- fin navbar principal -->

    


      <!-- arborescence du site -->
      <nav  aria-label="breadcrumb">
        <ol class="breadcrumb py-0 bleuu">
          <li class="breadcrumb-item"><a class="arborescence" href="<?php echo site_url("Accueil_Controller/");?>">Accueil</a></li>
            <li class="breadcrumb-item"><a class="arborescence " href="<?php echo site_url("Pays_Controller/pays");?>">Pays</a></li>
          

              <li class="breadcrumb-item"><a class="arborescence " href="<?php echo site_url('Rubrique_Controller/listerubriques/1');?>">Madagascar</a></li>
           
            <li class="breadcrumb-item"><a class="arborescence " href="<?php echo site_url("Pays_Controller/pays");?>">Média</a></li>

        </ol>
      </nav>
      <!-- arborescence du site -->

      <!-- main body -->
      
        
      
   <div class="container" style="margin-top:5%">
   <div class="row">
       <div class="col-4 card" style="margin-bottom:3%;height:420px">
       
       <p style="text-align:justify;margin-top:6%;margin-right:2%;margin-left:2%">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

       
       </div>
       <div class="col-8" >
       <video width="740" controls>
              <source src="<?php echo base_url();?>/assets/video/Billie Eilish - bad guy.mp4" type="video/mp4">
            </video>
       </div>
       <div class="col-4 card" style="margin-bottom:3%;">
       
       <p style="text-align:justify;margin-top:6%;margin-right:2%;margin-left:2%">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

       
       </div>
       <div class="col-8" >
       <audio width="740" controls>
              <source src="<?php echo base_url();?>/assets/video/interview2.mp3" type="audio/mp3">
</audio>
       </div>
   </div>
   </div>
    
      <!-- fin main body -->
      


      
      
  </body>
  <footer style="margin-top: 200px">
        <?php include("assets/include/footer.php");?>
  </footer>

</html>