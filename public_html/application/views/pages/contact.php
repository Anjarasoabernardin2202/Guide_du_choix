<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GDC - Contact</title>
    <?php include("assets/include/head.php")?>
  </head>

  <body>
  <?php
  $this->load->view("include/visitor_counter.php");
  ?>
    <!-- navbar tout en haut en bleu -->
    <?php $this->load->view("include/navbar1.php");?>
  
    <?php include("assets/include/header.php");?>
      
    <!-- fin navbar principal --> 

  

    <!-- arborescence du site -->
      <nav  aria-label="breadcrumb">
        <ol class="breadcrumb py-0 bleuu">
          <li class="breadcrumb-item"><a class="arborescence" href="<?php echo site_url('Accueil_Controller/');?>">Accueil</a></li>
          <li class="breadcrumb-item"><a class="arborescence" href="#">Contact</a></li>
          
       
        </ol>
      </nav>
    <!-- arborescence du site -->
          
    <!-- main body -->
    <div class="container">
    <div class="row">
    <form id="precedent" class="btn" style="margin-top:5%;margin-bottom:2%;"><input type = "button" value = "Retour"  onclick = "history.back()"></form>

    </div>
    </div>
    <div class="container" style="margin-bottom:5%">
    

          <div  class="row" style="margin:auto">  

          <div class="contact-card">
              <div class="box" style="margin-left:3%;margin-right:3%;">
           
                <p class="lead text-center">Nos informations</p>
                <hr>
                <p class="text-muted text-center"><i class="fa fa-envelope"></i> Email: guiduchoix2424@gmail.com</p>
                <p class="text-muted text-center"><i class="fa fa-whatsapp"></i> Whatsapp: +261322639461</p>
                <p class="text-muted text-center"><i class="fa fa-phone"></i> Tél: +261342365204</p>
               <p class="text-muted text-center"> <i class="fa fa-map-marker"></i> Adresse: Lot 202412 rue de Mozambique <br> Antsiranana Madagascar</p>

              </div>
          </div>
          </div>

        </div>

      <!-- fin main body -->

    

      <footer style="margin-top:10%;">
          <?php include("assets/include/footer.php");?>
      </footer>       
  </body>
</html>