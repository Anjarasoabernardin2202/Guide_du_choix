<!DOCTYPE html>
<html lang="fr">
  <head>
      <meta charset="utf-8"> 
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>GDC - Guides TPE</title>
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
         
    
            <li class="breadcrumb-item" style="margin-left:-3px"><a  class="arborescence" style="margin-left:-5px" href="<?php echo site_url('Rubrique_Controller/detail');?>/2?>">Cité des Métiers</a></li>

        </ol>
      </nav>
      <!-- arborescence du site -->

    
      <div class="web-only " style="margin-top:3%;">
          <div class="container">
            <div class="row">
              <div style="margin-top:1%;margin:auto" class="col-10">
                <div class="card">
                  <div class="container">
                    <div class="row"> 
                      <div class="description col-6">
                        <p style="margin-top: 5%;font-family: FreeSerif" >
                            Le Guide des TPE  ou guide toutes petites entreprises Offre gratuitement des guides pratiques intéressants, spécifiquement élaborés pour une compréhension très facile pour tous et aidant surtout les toutes petites entreprises à s'informer, comprendre avant de choisir ou d'acheter un produite ou service 
                        </p>
                      </diV>
                      <div class="col-4">
                        <img style="width:200px;margin-top:5%;visibility:hidden" src="<?php echo base_url()?>/assets/image/logo-cite-des-metiers.png">           
                      </div>                
                    </div>
                  </div>
                </div>      
              </div>
            </div>
          </div>
          <div class="container" style="margin-bottom:5%;">
              <div class="row">
                <div class="col-8" style="margin:auto">
                  <div style="margin-top:5%" class="card">
                    <br>
                    <h5 class="titre-liste-guides text-center">Consultez nos guides</h5>
                    <br>
                    <div class="container">
                      <div class="row">
                          <div class="col-12">
                            <p> <a style="color:rgb(78,78,78)" href="<?php echo site_url('Citemetiers_Controller/detail1');?>/1000" class="guide"><img style="width:auto;height:45px;padding-right:13px" src="<?php echo base_url();?>assets/image/epicerie.png">Guides épicerie</a> </p>
                          
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>          
      </div>
      
  </body>
  <footer style="margin-top: 200px">
        <?php include("assets/include/footer.php");?>
  </footer>

</html>