<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GDC - Recrutements</title>
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
          <li class="breadcrumb-item"><a class="arborescence" href="#">Recrutements</a></li>
          
   
        </ol>
      </nav>
    <!-- arborescence du site -->

  
    <div class="container">
          <div class="row">
          
            <div class="col-sm-6 p-5">
              <div class="text-center">
                <div class="card card-default">
                  <div class="card-body">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem nisi, quae deleniti soluta adipisci eaque aut assumenda consequuntur odio repudiandae saepe veritatis ipsam nostrum doloribus quo. Exercitationem atque maxime labore?

                  </div>
                  <div class="card-footer">
                  <button class="btn btn-info">Postuler</button>
                  </div>
                </div>
                
              </div>
            </div>
            <div class="col-sm-6 p-5">
            <div class="text-center">
            <div class="card card-default">
                  <div class="card-body">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem nisi, quae deleniti soluta adipisci eaque aut assumenda consequuntur odio repudiandae saepe veritatis ipsam nostrum doloribus quo. Exercitationem atque maxime labore?

                  </div>
                  <div class="card-footer">
                  <button class="btn btn-info">Détail</button>
                  </div>
            </div>
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