<!DOCTYPE html>
<html lang="fr">
  <head>
      <meta charset="utf-8"> 
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>GDC | Résultats recherche</title>
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
     
        <?php include("assets/include/header.php");?>
     
    <!-- fin navbar principal -->

 


      <!-- arborescence du site -->
      <nav  aria-label="breadcrumb">
        <ol class="breadcrumb py-0 bleuu">
          <li class="breadcrumb-item"><a class="arborescence" href="<?php echo site_url("Accueil_Controller/");?>">Accueil</a></li>
          <li class="breadcrumb-item"><a class="arborescence" href="#">Résultats recherche</a></li>
        </ol>
      </nav>
      <!-- arborescence du site -->

      <!-- main body -->
      
        
      <?php
      function highlightWords($text, $word){
        $text = preg_replace('#'. preg_quote($word) .'#i', '<span style="background-color: #FF00FF;">\\0</span>', $text);
        return $text;
    }
      ?>
      <div class="container" style="margin-top:3%">
      <div class="row">
      <div class="col-12">
      <p class="nbr-recherche text-center">Nous avons trouvé <b><?php echo 1+$somme;?></b> resultats pour votre recherche.</p>

      </div>
      <div class="row">
  
      <?php $i = 0; foreach($listerecherche as $liste) { 
              $titre = !empty($mot) ? highlightWords($liste['nom'],$mot) : $liste['nom'];
              $description = !empty($mot) ? highlightWords($liste['description'],$mot) : $liste['description'] ;
            ?>
              <div class="col-4" style="margin-bottom:3%;">
                <div class="card" style="height:auto;" >
                <div style="margin-left:3%;margin-right:3%;margin-top:3%;">
                <?php if($liste['type'] == 'pays') { ?>
                  <?php if($liste['image']!=NULL || $liste['image']!='') { ?>
                    <a href="<?php echo site_url('Rubrique_Controller/listerubriques')?>/<?php echo $liste['id'];?>"><img class="img-recherche" src="<?php echo base_url()?>/assets/image/<?php echo $liste['image'];?>"></a>
                  <?php } ?>

                  <a href="<?php echo site_url('Rubrique_Controller/listerubriques')?>/<?php echo $liste['id'];?>"><h5 class="nom-recherche text-center"><?php echo $titre;?></h5></a>
                  <p class="description-recherche"><?php echo $description;?></p>
                <?php } ?>
                <?php if($liste['type'] == 'rubrique') { ?>
                  <?php if($liste['image']!=NULL || $liste['image']!='') { ?>
                    <a href="<?php echo site_url('Rubrique_Controller/detail')?>/<?php echo $liste['id'];?>"><img class="img-recherche" src="<?php echo base_url()?>/assets/image/<?php echo $liste['image'];?>"></a>
                  <?php } ?>

                  <a href="<?php echo site_url('Rubrique_Controller/detail')?>/<?php echo $liste['id'];?>"><h5 class="nom-recherche text-center"><?php echo $titre;?></h5></a>
                  <p class="description-recherche"><?php echo $description;?></p>
                <?php } ?>
                <?php if($liste['type'] == 'guide') { ?>
                  <?php if($liste['image']!=NULL || $liste['image']!='') { ?>
                    <a href="<?php echo site_url('Guide_Controller/detailguide')?>/<?php echo $liste['id']?>/1/1"><img class="img-recherche" src="<?php echo base_url()?>/assets/image/<?php echo $liste['image'];?>"></a>
                  <?php } ?>

                  <a href="<?php echo site_url('Guide_Controller/detailguide')?>/<?php echo $liste['id']?>/1/1"><h5 class="nom-recherche text-center"><?php echo $titre;?></h5></a>
                  <p class="description-recherche"><?php echo $description;?></p>
                <?php } ?>
              
                    
                  </div>
                </div>
              
              </div>
              <?php $i++; } ?>
         
                    </div>
          </div>
      </div>
    
      
      
      <footer >
        <?php include("assets/include/footer.php");?>
       
      </footer>
  </body>
</html>