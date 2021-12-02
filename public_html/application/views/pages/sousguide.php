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
      <?php $this->load->view("include/navbar1.php");?>
        
      <!-- fin navbar tout en haut en bleu -->
      <div class="web-only">
          <?php $this->load->view('include/header_rubriques.php');?>
      </div>
      <!-- navbar principal -->

    <!-- main body -->
    <div class="mobile-only">
                <div class="col-12 parrains" class="position-parrain" style=" margin-top: 3%">
        <div >
            <div role="listbox" >
                
                <div class="row" style="margin-left:0.1px; margin-right: 0.1px;">
                              <?php foreach($singleexpert as $expert) { ?>
                              <div class="col-4" style="text-align: center;border-style:solid;border-width: 0.1px;border-color: black;">
                              <a href="<?php echo site_url("Expert_Controller/profilexpert");?>/<?php echo $expert->ID_EXPERT;?>">  
                                  <br> <img style="border-style:solid;border-width: 1px;border-color: grey;height:auto;" class="img-fluid mobile-only" src="<?php echo base_url()?>/assets/image/<?php echo $expert->LOGO_EXPERT;?>" />
                                       <img style="border-style:solid;border-width: 1px;border-color: grey;" class="img-fluid web-only" src="<?php echo base_url()?>/assets/image/<?php echo $expert->LOGO_EXPERT;?>" />
                                </a>
                                  
                              </div>
                              <div class="col-4" style="text-align: center;border-style:solid;border-width: 0.1px;border-color: black;">
                                  <p style="color: rgba(78,80,81); font-weight: bold;text-align: center;" class="txt-parrain"><br> <?php echo $expert->SLOGAN;?> </p>
                              </div>
                              <div class="col-4" style="text-align: center;border-style:solid;border-width: 0.1px;border-color: black;">
                                <a href="<?php echo site_url("Expert_Controller/profilexpert");?>/<?php echo $expert->ID_EXPERT;?>">  
                                  <br> <img style="border-style:solid;border-width: 1px;border-color: grey"class="img-fluid" src="<?php echo base_url()?>/assets/image/<?php echo $expert->IMAGE_EXPERT;?>" />
                                </a>
                                  <p style="color: rgba(78,80,81); font-weight: bold;text-align: center;margin-top: 5px" class="txt-parrain"><a href="<?php echo site_url("Expert_Controller/profilexpert");?>/<?php echo $expert->ID_EXPERT;?>" style="color: rgba(78,80,81)">Contactez nos experts de la <?php echo $expert->NOM_EXPERT;?></a></p>
                              </div>
                              <?php } ?>
                 
                </div>
            </div>
            <div class="row" style="margin-left:5%;margin-right: 2%;margin-bottom: 40%;margin-top:10px;">
            <a href="<?php echo site_url("Guide_Controller/detailguide")?>/<?php echo $idguide;?>/1/1" class="col-8" style="color: rgb(53,140,237);font-size:11px">Retour au Sommaire</a>
                <div class="col-12 card" style="height:auto;">                 
                     <div class="" style="margin-bottom:20%">
                        <?php foreach($chapitres as $chapitre) { ?>
                          <?php if(isset($chapitre['PARENT'])){  ?>
                           <?php foreach($chapitre['PARENT'] as $parent) { ?>
                             <?php if($chapitre['NUMERO_CHAPITRE'] == 1) {?>
                           <h6 style="margin-top:5%;color:#FF00FF"><?php echo $parent['NUMERO_CHAPITRE'];?>-<?php echo $parent['NOM_CHAPITRE'];?></h6>
                          <p class="introduction-chapitre" style="text-align: justify;"><?php echo $parent['INTRODUCTION_CHAPITRE_SMARTPHONE'];?></p>
                          <h6 style="margin-top:10px;color:rgb(6,100,185);"><?php echo $parent['NUMERO_CHAPITRE'];?>-<?php echo $chapitre['NUMERO_CHAPITRE'];?>-<?php echo $chapitre['NOM_CHAPITRE'];?></h6>
                          <p class="introduction-chapitre" style="text-align: justify;"><?php echo $chapitre['INTRODUCTION_CHAPITRE_SMARTPHONE'];?></p>
                          <?php if(isset($chapitre['SOUS_CHAPITRE'])) { ?>
                          <?php foreach($chapitre['SOUS_CHAPITRE'] as $schapitre) { ?> 
                            <h6 class="question-sous-guide-souschapitre"><?php echo $parent['NUMERO_CHAPITRE'];?>-<?php echo $chapitre['NUMERO_CHAPITRE'];?>-<?php echo $schapitre['NUMERO_CHAPITRE'];?>-<?php echo $schapitre['NOM_CHAPITRE'];?></h6>
                          <br>
                          <p class="introduction-chapitre" style="text-align:justify;"><?php echo $schapitre['INTRODUCTION_CHAPITRE_SMARTPHONE'];?></p>
            
                            <?php if(isset($schapitre['CONTENU'])){ ?> 
                              <?php foreach($schapitre['CONTENU'] as $contenu) { ?>
                            <h6 style="margin-top:5%;" class="titre-article"><?php echo $parent['NUMERO_CHAPITRE'];?>-<?php  echo $chapitre['NUMERO_CHAPITRE'];?>-<?php echo $schapitre['NUMERO_CHAPITRE'];?>-<?php echo $contenu['NUMERO_ARTICLE'];?>-<?php echo $contenu['TITRE_ARTICLE'];?></h6>
            
                              <?php if($contenu['IMAGE_ARTICLE']!=null || $contenu['IMAGE_ARTICLE'] != '') { ?>
                              <img  class="img-sparagraphe" src="<?php echo base_url();?>/assets/image/<?php echo $contenu['IMAGE_ARTICLE'];?>">
                              <?php } ?>
                           
                          <p class="introduction-chapitre" style="text-align: justify; "><?php echo $contenu['CONTENU_ARTICLE_SMARTPHONE'];?></p>
                           
                              <?php } ?>
                            
                          <?php } ?>
                          <?php if(isset($schapitre['SOUS_SOUSCHAPITRE'])){ ?> 
                              <?php foreach($schapitre['SOUS_SOUSCHAPITRE'] as $sc) { ?>
                            <h6 style="margin-top:5%;" class="titre-article"><?php echo $parent['NUMERO_CHAPITRE'];?>-<?php  echo $chapitre['NUMERO_CHAPITRE'];?>-<?php echo $schapitre['NUMERO_CHAPITRE'];?>-<?php echo $sc['NUMERO_CHAPITRE'];?>-<?php echo $sc['NOM_CHAPITRE'];?></h6>
            
                           
                          <p class="introduction-chapitre" style="text-align: justify; "><?php echo $sc['INTRODUCTION_CHAPITRE_SMARTPHONE'];?></p>
                           
                              <?php } ?>
                            
                          <?php } ?>
                          <?php if(isset($schapitre['SOUS_SOUSCHAPITRE'])){ ?> 
                              <?php foreach($schapitre['SOUS_SOUSCHAPITRE'] as $sc) { ?>
                            <h6 style="margin-top:5%;" class="titre-article"><?php echo $parent['NUMERO_CHAPITRE'];?>-<?php  echo $chapitre['NUMERO_CHAPITRE'];?>-<?php echo $schapitre['NUMERO_CHAPITRE'];?>-<?php echo $sc['NUMERO_CHAPITRE'];?>-<?php echo $sc['NOM_CHAPITRE'];?></h6>
            
                           
                          <p class="introduction-chapitre" style="text-align: justify; "><?php echo $sc['INTRODUCTION_CHAPITRE_SMARTPHONE'];?></p>
                           
                              <?php } ?>
                            
                          <?php } ?>
                          <?php } ?>
                          <?php if(isset($chapitre['ARTICLE'])) { ?>
                          <?php foreach($chapitre['ARTICLE'] as $article) { ?> 
                            
            
                            
                            <h6 style="margin-top:5%;" class="titre-article"><?php echo $parent['NUMERO_CHAPITRE'];?>-<?php  echo $chapitre['NUMERO_CHAPITRE'];?>-<?php echo $article['NUMERO_ARTICLE'];?>-<?php echo $article['TITRE_ARTICLE'];?></h6>
            
                              <?php if($article['IMAGE_ARTICLE']!=null || $article['IMAGE_ARTICLE'] != '') { ?>
                              <img  class="img-sparagraphe" src="<?php echo base_url();?>/assets/image/<?php echo $article['IMAGE_ARTICLE'];?>">
                              <?php } ?>
                           
                          <p class="introduction-chapitre" style="text-align: justify; "><?php echo $article['CONTENU_ARTICLE_SMARTPHONE'];?></p>
                           
                              <?php } ?>
                        
                          <?php } ?>
                          <?php } ?>
                         <?php } else{ ?>
                           <h6 style="margin-top:5%;color:rgb(6,100,185);font-size:20px"><?php echo $parent['NUMERO_CHAPITRE'];?>-<?php echo $chapitre['NUMERO_CHAPITRE'];?>-<?php echo $chapitre['NOM_CHAPITRE'];?></h6>
                          <p class="introduction-chapitre" style="text-align: justify;"><?php echo $chapitre['INTRODUCTION_CHAPITRE_SMARTPHONE'];?></p>
                          <?php if(isset($chapitre['SOUS_CHAPITRE'])) { ?>
                          <?php foreach($chapitre['SOUS_CHAPITRE'] as $schapitre) { ?> 
                            <h6  class="question-sous-guide-souschapitre"><?php echo $parent['NUMERO_CHAPITRE'];?>-<?php echo $chapitre['NUMERO_CHAPITRE'];?>-<?php echo $schapitre['NUMERO_CHAPITRE'];?>-<?php echo $schapitre['NOM_CHAPITRE'];?></h6>
                          <br>
                          <p class="introduction-chapitre" style="text-align:justify;"><?php echo $schapitre['INTRODUCTION_CHAPITRE_SMARTPHONE'];?></p>
            
                            <?php if(isset($schapitre['CONTENU'])){ ?> 
                              <?php foreach($schapitre['CONTENU'] as $contenu) { ?>
                            <h6 class="titre-article"><?php echo $parent['NUMERO_CHAPITRE'];?>-<?php  echo $chapitre['NUMERO_CHAPITRE'];?>-<?php echo $schapitre['NUMERO_CHAPITRE'];?>-<?php echo $contenu['NUMERO_ARTICLE'];?>-<?php echo $contenu['TITRE_ARTICLE'];?></h6>
            
                              <?php if($contenu['IMAGE_ARTICLE']!=null || $contenu['IMAGE_ARTICLE'] != '') { ?>
                              <img  class="img-sparagraphe" src="<?php echo base_url();?>/assets/image/<?php echo $contenu['IMAGE_ARTICLE'];?>">
                              <?php } ?>
                           
                          <p class="introduction-chapitre" style="text-align: justify; "><?php echo $contenu['CONTENU_ARTICLE_SMARTPHONE'];?></p>
                           
                              <?php } ?>
                            
                          <?php } ?>
                          <?php if(isset($schapitre['SOUS_SOUSCHAPITRE'])){ ?> 
                              <?php foreach($schapitre['SOUS_SOUSCHAPITRE'] as $sc) { ?>
                            <h6 class="titre-article"><?php echo $parent['NUMERO_CHAPITRE'];?>-<?php  echo $chapitre['NUMERO_CHAPITRE'];?>-<?php echo $schapitre['NUMERO_CHAPITRE'];?>-<?php echo $sc['NUMERO_CHAPITRE'];?>-<?php echo $sc['NOM_CHAPITRE'];?></h6>
            
                           
                          <p class="introduction-chapitre" style="text-align: justify; "><?php echo $sc['INTRODUCTION_CHAPITRE_SMARTPHONE'];?></p>
                           
                              <?php } ?>
                            
                          <?php } ?>
                          <?php if(isset($schapitre['SOUS_SOUSCHAPITRE'])){ ?> 
                              <?php foreach($schapitre['SOUS_SOUSCHAPITRE'] as $sc) { ?>
                            <h6 class="titre-article"><?php echo $parent['NUMERO_CHAPITRE'];?>-<?php  echo $chapitre['NUMERO_CHAPITRE'];?>-<?php echo $schapitre['NUMERO_CHAPITRE'];?>-<?php echo $sc['NUMERO_CHAPITRE'];?>-<?php echo $sc['NOM_CHAPITRE'];?></h6>
            
                           
                          <p class="introduction-chapitre" style="text-align: justify; "><?php echo $sc['INTRODUCTION_CHAPITRE_SMARTPHONE'];?></p>
                           
                              <?php } ?>
                            
                          <?php } ?>
                          <?php } ?>
                          <?php if(isset($chapitre['ARTICLE'])) { ?>
                          <?php foreach($chapitre['ARTICLE'] as $article) { ?> 
                            
            
                            
                            <h6 class="titre-article"><?php echo $parent['NUMERO_CHAPITRE'];?>-<?php  echo $chapitre['NUMERO_CHAPITRE'];?>-<?php echo $article['NUMERO_ARTICLE'];?>-<?php echo $article['TITRE_ARTICLE'];?></h6>
            
                              <?php if($article['IMAGE_ARTICLE']!=null || $article['IMAGE_ARTICLE'] != '') { ?>
                              <img  class="img-sparagraphe" src="<?php echo base_url();?>/assets/image/<?php echo $article['IMAGE_ARTICLE'];?>">
                              <?php } ?>
                           
                          <p class="introduction-chapitre" style="text-align: justify; "><?php echo $article['CONTENU_ARTICLE_SMARTPHONE'];?></p>
                           
                              <?php } ?>
                        
                          <?php } ?>
                         <?php } ?>
                          <?php } ?>
                           <?php } ?>
                              <?php } else{?>
                          <h6 style="margin-top:10px;color:#FF00FF"><?php echo $chapitre['NUMERO_CHAPITRE'];?>-<?php echo $chapitre['NOM_CHAPITRE'];?></h6>
                          <p class="introduction-chapitre" style="text-align: justify;"><?php echo $chapitre['INTRODUCTION_CHAPITRE_SMARTPHONE'];?></p>
                          <?php if(isset($chapitre['SOUS_CHAPITRE'])) { ?>
                          <?php foreach($chapitre['SOUS_CHAPITRE'] as $schapitre) { ?> 
                            <h6 style="color:rgb(6,100,185);font-size:20px" class="question-sous-guide-souschapitre"><?php echo $chapitre['NUMERO_CHAPITRE'];?>-<?php echo $schapitre['NUMERO_CHAPITRE'];?>-<?php echo $schapitre['NOM_CHAPITRE'];?></h6>
                          <br>
                          <p class="introduction-chapitre" style="text-align:justify;"><?php echo $schapitre['INTRODUCTION_CHAPITRE_SMARTPHONE'];?></p>
            
                            <?php if(isset($schapitre['CONTENU'])){ ?> 
                              <?php foreach($schapitre['CONTENU'] as $contenu) { ?>
                            <h6 class="titre-article"><?php  echo $chapitre['NUMERO_CHAPITRE'];?>-<?php echo $schapitre['NUMERO_CHAPITRE'];?>-<?php echo $contenu['NUMERO_ARTICLE'];?>-<?php echo $contenu['TITRE_ARTICLE'];?></h6>
            
                              <?php if($contenu['IMAGE_ARTICLE']!=null || $contenu['IMAGE_ARTICLE'] != '') { ?>
                              <img  class="img-sparagraphe" src="<?php echo base_url();?>/assets/image/<?php echo $contenu['IMAGE_ARTICLE'];?>">
                              <?php } ?>
                           
                          <p class="introduction-chapitre" style="text-align: justify; "><?php echo $contenu['CONTENU_ARTICLE_SMARTPHONE'];?></p>
                           
                              <?php } ?>
                            
                          <?php } ?>
                          <?php if(isset($schapitre['SOUS_SOUSCHAPITRE'])){ ?> 
                              <?php foreach($schapitre['SOUS_SOUSCHAPITRE'] as $sc) { ?>
                            <h6 class="titre-article"><?php  echo $chapitre['NUMERO_CHAPITRE'];?>-<?php echo $schapitre['NUMERO_CHAPITRE'];?>-<?php echo $sc['NUMERO_CHAPITRE'];?>-<?php echo $sc['NOM_CHAPITRE'];?></h6>
            
                           
                          <p class="introduction-chapitre" style="text-align: justify; "><?php echo $sc['INTRODUCTION_CHAPITRE_SMARTPHONE'];?></p>
                           
                              <?php } ?>
                            
                          <?php } ?>
                          <?php if(isset($schapitre['SOUS_SOUSCHAPITRE'])){ ?> 
                              <?php foreach($schapitre['SOUS_SOUSCHAPITRE'] as $sc) { ?>
                            <h6 class="titre-article"><?php  echo $chapitre['NUMERO_CHAPITRE'];?>-<?php echo $schapitre['NUMERO_CHAPITRE'];?>-<?php echo $sc['NUMERO_CHAPITRE'];?>-<?php echo $sc['NOM_CHAPITRE'];?></h6>
            
                           
                          <p class="introduction-chapitre" style="text-align: justify; "><?php echo $sc['INTRODUCTION_CHAPITRE_SMARTPHONE'];?></p>
                           
                              <?php } ?>
                            
                          <?php } ?>
                          <?php } ?>
                          <?php if(isset($chapitre['ARTICLE'])) { ?>
                          <?php foreach($chapitre['ARTICLE'] as $article) { ?> 
                            
            
                            
                            <h6 class="titre-article"><?php  echo $chapitre['NUMERO_CHAPITRE'];?>-<?php echo $article['NUMERO_ARTICLE'];?>-<?php echo $article['TITRE_ARTICLE'];?></h6>
            
                              <?php if($article['IMAGE_ARTICLE']!=null || $article['IMAGE_ARTICLE'] != '') { ?>
                              <img  class="img-sparagraphe" src="<?php echo base_url();?>/assets/image/<?php echo $article['IMAGE_ARTICLE'];?>">
                              <?php } ?>
                           
                          <p class="introduction-chapitre" style="text-align: justify; "><?php echo $article['CONTENU_ARTICLE_SMARTPHONE'];?></p>
                           
                              <?php } ?>
                        
                          <?php } ?>
                          <?php } ?>
                         <?php } ?>
                              <?php } ?>
                 
                      
                     </div>
                    <div class="row">
                           <?php 
                         if($nb !=0){
                          $i = count($nb);
                      
                          if($url == $nb[0]['ID_SOUSCHAPITRE']){ ?>
                            <a href="<?php echo site_url('Guide_Controller/sousguide')?>/<?php echo $url+1;?>" class="btn col-4" type="button" style="margin-left: 66%;font-size:12px">Suivant</a>
                          <?php } else if($url>$nb[0]['ID_SOUSCHAPITRE'] && $url<$nb[$i-1]['ID_SOUSCHAPITRE']) { ?>
                            <a href="<?php echo site_url('Guide_Controller/sousguide')?>/<?php echo $url-1;?>" class="btn col-4" type="button" style="font-size: 12px">Precedent</a>
                            <a href="<?php echo site_url('Guide_Controller/sousguide')?>/<?php echo $url+1;?>" class="btn col-4" type="button" style="margin-left: 33%;font-size:12px">Suivant</a>
                          <?php } else if($url == $nb[$i-1]['ID_SOUSCHAPITRE']) { ?>
                            <a href="<?php echo site_url('Guide_Controller/sousguide')?>/<?php echo $url-1;?>" class="btn col-4" type="button" style="font-size: 12px">Precedent</a>
                            <a href="<?php echo site_url("Guide_Controller/sommaire")?>/<?php echo $idguide;?>/1/1" class="col-8" style="color: rgb(53,140,237);margin-top: 3%;font-size:10px">Retour au Sommaire</a></p>
                          <?php } ?>
                         <?php } else if($nb == 0) { 
                           $j = count($nbguide);
                           if($url == $nbguide[0]['ID_CHAPITRE']) { ?>
                            <a href="<?php echo site_url('Guide_Controller/sousguide')?>/<?php echo $url+1;?>" class="btn col-4" type="button" style="margin-left: 66%;font-size:12px">Suivant</a>
                           <?php } else if($url>$nbguide[0]['ID_CHAPITRE'] && $url<$nbguide[$j-1]['ID_CHAPITRE']) { ?>
                            <a href="<?php echo site_url('Guide_Controller/sousguide')?>/<?php echo $url-1;?>" class="btn col-4" type="button" style="font-size: 12px">Precedent</a>
                            <a href="<?php echo site_url('Guide_Controller/sousguide')?>/<?php echo $url+1;?>" class="btn col-4" type="button" style="margin-left: 33%;font-size:12px">Suivant</a>
                           <?php } else if($url == $nbguide[$j-1]['ID_CHAPITRE']) { ?>
                            <a href="<?php echo site_url('Guide_Controller/sousguide')?>/<?php echo $url-1;?>" class="btn col-4" type="button" style="font-size: 12px">Precedent</a>

                          <a href="<?php echo site_url("Guide_Controller/sommaire")?>/<?php echo $idguide;?>/1/1" class="col-8" style="color: rgb(53,140,237);margin-top: 3%;font-size:10px">Retour au Sommaire</a></p>
                         <?php } ?>
                           <?php } ?>
                    </div>
                    </div>
                    </div>
                </div>
                                 
                    </div>
        </div>

 
           
                </div>
                </div>
    <div class="web-only">

        <div class="container" style="margin-top:3%;">
            <div role="listbox" >
                
                    <div class="row" style=" margin-right: 0.1px;">
                            <?php foreach($singleexpert as $expert) { ?>
                            <div class="col-3 card" style="text-align: center;margin-left:13%;">
                            <a href="<?php echo site_url("Expert_Controller/profilexpert");?>/<?php echo $expert->ID_EXPERT?>">  
                                <br> <img style="border-style:solid;border-width: 1px;border-color: grey;height:auto;" class="img-fluid mobile-only" src="<?php echo base_url()?>/assets/image/<?php echo $expert->LOGO_EXPERT;?>" />
                                     <img style="border-style:solid;border-width: 1px;border-color: grey;" class="img-fluid web-only" src="<?php echo base_url()?>/assets/image/<?php echo $expert->LOGO_EXPERT;?>" />
                              </a>
                                
                            </div>
                            <div class="col-3 card" style="text-align: center;margin-left:2%; ">
                                <p style="color: rgba(78,80,81); font-weight: bold;text-align: center;" class="txt-parrain"><br> <?php echo $expert->SLOGAN?> </p>
                            </div>
                            <div class="col-3 card" style="text-align: center;margin-left:2%;">
                              <a href="<?php echo site_url('Parrain_Controller/partenaire');?>">  
                                <br> <img style="border-style:solid;border-width: 1px;border-color: grey"class="img-fluid" src="<?php echo base_url()?>/assets/image/<?php echo $expert->IMAGE_EXPERT;?>" />
                              </a>
                                <p style="color: rgba(78,80,81); font-weight: bold;text-align: center;margin-top: 5px" class="txt-parrain"><a href="<?php echo site_url("Expert_Controller/profilexpert");?>/<?php echo $expert->ID_EXPERT;?>" style="color: rgba(78,80,81)">Contactez nos experts de la <?php echo $expert->NOM_EXPERT;?></a></p>
                            </div>
                            <?php } ?>
               
                    </div>
            </div>
        </div>
            <br>
            <div class="container">
              <div class="row">
                <a href="<?php echo site_url("Guide_Controller/detailguide/3/1")?>/<?php echo $idguide;?>/1/1" class="col-8" style="color: rgb(53,140,237);font-size:15px">Retour au Sommaire</a>

              </div>
            </div>
          
           <div class="container" style="margin-top:2%;">
             <div class="row">

            <div class="col-12 card" style="height:auto;">
                <div class="" style="margin-bottom:20%;margin-left:5%;margin-right:5%;">
                <?php foreach($chapitres as $chapitre) { ?>
                 <?php if(isset($chapitre['PARENT'])){  ?>
                  <?php foreach($chapitre['PARENT'] as $parent) { ?>
                    <?php if($chapitre['NUMERO_CHAPITRE'] == 1) {?>
                  <h4 style="margin-top:5%;color:#FF00FF"><?php echo $parent['NUMERO_CHAPITRE'];?>-<?php echo $parent['NOM_CHAPITRE'];?></h4>
                 <p class="introduction-chapitre" style="text-align: justify;"><?php echo $parent['INTRODUCTION_CHAPITRE'];?></p>
                 <h5 style="margin-top:10px;color:rgb(6,100,185);font-size:20px"><?php echo $parent['NUMERO_CHAPITRE'];?>-<?php echo $chapitre['NUMERO_CHAPITRE'];?>-<?php echo $chapitre['NOM_CHAPITRE'];?></h5>
                 <p class="introduction-chapitre" style="text-align: justify;"><?php echo $chapitre['INTRODUCTION_CHAPITRE'];?></p>
                 <?php if(isset($chapitre['SOUS_CHAPITRE'])) { ?>
                 <?php foreach($chapitre['SOUS_CHAPITRE'] as $schapitre) { ?> 
                   <h5 class="question-sous-guide-souschapitre"><?php echo $parent['NUMERO_CHAPITRE'];?>-<?php echo $chapitre['NUMERO_CHAPITRE'];?>-<?php echo $schapitre['NUMERO_CHAPITRE'];?>-<?php echo $schapitre['NOM_CHAPITRE'];?></h5>
                 <br>
                 <p class="introduction-chapitre" style="text-align:justify;"><?php echo $schapitre['INTRODUCTION_CHAPITRE'];?></p>
   
                   <?php if(isset($schapitre['CONTENU'])){ ?> 
                     <?php foreach($schapitre['CONTENU'] as $contenu) { ?>
                   <h6 style="margin-top:5%;" class="titre-article"><?php echo $parent['NUMERO_CHAPITRE'];?>-<?php  echo $chapitre['NUMERO_CHAPITRE'];?>-<?php echo $schapitre['NUMERO_CHAPITRE'];?>-<?php echo $contenu['NUMERO_ARTICLE'];?>-<?php echo $contenu['TITRE_ARTICLE'];?></h6>
   
                     <?php if($contenu['IMAGE_ARTICLE']!=null || $contenu['IMAGE_ARTICLE'] != '') { ?>
                     <img  class="img-sparagraphe" src="<?php echo base_url();?>/assets/image/<?php echo $contenu['IMAGE_ARTICLE'];?>">
                     <?php } ?>
                  
                 <p class="introduction-chapitre" style="text-align: justify; "><?php echo $contenu['CONTENU_ARTICLE'];?></p>
                  
                     <?php } ?>
                   
                 <?php } ?>
                 <?php if(isset($schapitre['SOUS_SOUSCHAPITRE'])){ ?> 
                     <?php foreach($schapitre['SOUS_SOUSCHAPITRE'] as $sc) { ?>
                   <h6 style="margin-top:5%;" class="titre-article"><?php echo $parent['NUMERO_CHAPITRE'];?>-<?php  echo $chapitre['NUMERO_CHAPITRE'];?>-<?php echo $schapitre['NUMERO_CHAPITRE'];?>-<?php echo $sc['NUMERO_CHAPITRE'];?>-<?php echo $sc['NOM_CHAPITRE'];?></h6>
   
                  
                 <p class="introduction-chapitre" style="text-align: justify; "><?php echo $sc['INTRODUCTION_CHAPITRE'];?></p>
                  
                     <?php } ?>
                   
                 <?php } ?>
                 <?php if(isset($schapitre['SOUS_SOUSCHAPITRE'])){ ?> 
                     <?php foreach($schapitre['SOUS_SOUSCHAPITRE'] as $sc) { ?>
                   <h6 style="margin-top:5%;" class="titre-article"><?php echo $parent['NUMERO_CHAPITRE'];?>-<?php  echo $chapitre['NUMERO_CHAPITRE'];?>-<?php echo $schapitre['NUMERO_CHAPITRE'];?>-<?php echo $sc['NUMERO_CHAPITRE'];?>-<?php echo $sc['NOM_CHAPITRE'];?></h6>
   
                  
                 <p class="introduction-chapitre" style="text-align: justify; "><?php echo $sc['INTRODUCTION_CHAPITRE'];?></p>
                  
                     <?php } ?>
                   
                 <?php } ?>
                 <?php } ?>
                 <?php if(isset($chapitre['ARTICLE'])) { ?>
                 <?php foreach($chapitre['ARTICLE'] as $article) { ?> 
                   
   
                   
                   <h6 style="margin-top:5%;" class="titre-article"><?php echo $parent['NUMERO_CHAPITRE'];?>-<?php  echo $chapitre['NUMERO_CHAPITRE'];?>-<?php echo $article['NUMERO_ARTICLE'];?>-<?php echo $article['TITRE_ARTICLE'];?></h6>
   
                     <?php if($article['IMAGE_ARTICLE']!=null || $article['IMAGE_ARTICLE'] != '') { ?>
                     <img  class="img-sparagraphe" src="<?php echo base_url();?>/assets/image/<?php echo $article['IMAGE_ARTICLE'];?>">
                     <?php } ?>
                  
                 <p class="introduction-chapitre" style="text-align: justify; "><?php echo $article['CONTENU_ARTICLE'];?></p>
                  
                     <?php } ?>
               
                 <?php } ?>
                 <?php } ?>
                <?php } else{ ?>
                  <h5 style="margin-top:5%;color:rgb(6,100,185);font-size:20px"><?php echo $parent['NUMERO_CHAPITRE'];?>-<?php echo $chapitre['NUMERO_CHAPITRE'];?>-<?php echo $chapitre['NOM_CHAPITRE'];?></h5>
                 <p class="introduction-chapitre" style="text-align: justify;"><?php echo $chapitre['INTRODUCTION_CHAPITRE'];?></p>
                 <?php if(isset($chapitre['SOUS_CHAPITRE'])) { ?>
                 <?php foreach($chapitre['SOUS_CHAPITRE'] as $schapitre) { ?> 
                   <h5  class="question-sous-guide-souschapitre"><?php echo $parent['NUMERO_CHAPITRE'];?>-<?php echo $chapitre['NUMERO_CHAPITRE'];?>-<?php echo $schapitre['NUMERO_CHAPITRE'];?>-<?php echo $schapitre['NOM_CHAPITRE'];?></h6>
                 <br>
                 <p class="introduction-chapitre" style="text-align:justify;"><?php echo $schapitre['INTRODUCTION_CHAPITRE'];?></p>
   
                   <?php if(isset($schapitre['CONTENU'])){ ?> 
                     <?php foreach($schapitre['CONTENU'] as $contenu) { ?>
                   <h6 class="titre-article"><?php echo $parent['NUMERO_CHAPITRE'];?>-<?php  echo $chapitre['NUMERO_CHAPITRE'];?>-<?php echo $schapitre['NUMERO_CHAPITRE'];?>-<?php echo $contenu['NUMERO_ARTICLE'];?>-<?php echo $contenu['TITRE_ARTICLE'];?></h6>
   
                     <?php if($contenu['IMAGE_ARTICLE']!=null || $contenu['IMAGE_ARTICLE'] != '') { ?>
                     <img  class="img-sparagraphe" src="<?php echo base_url();?>/assets/image/<?php echo $contenu['IMAGE_ARTICLE'];?>">
                     <?php } ?>
                  
                 <p class="introduction-chapitre" style="text-align: justify; "><?php echo $contenu['CONTENU_ARTICLE'];?></p>
                  
                     <?php } ?>
                   
                 <?php } ?>
                 <?php if(isset($schapitre['SOUS_SOUSCHAPITRE'])){ ?> 
                     <?php foreach($schapitre['SOUS_SOUSCHAPITRE'] as $sc) { ?>
                   <h6 class="titre-article"><?php echo $parent['NUMERO_CHAPITRE'];?>-<?php  echo $chapitre['NUMERO_CHAPITRE'];?>-<?php echo $schapitre['NUMERO_CHAPITRE'];?>-<?php echo $sc['NUMERO_CHAPITRE'];?>-<?php echo $sc['NOM_CHAPITRE'];?></h6>
   
                  
                 <p class="introduction-chapitre" style="text-align: justify; "><?php echo $sc['INTRODUCTION_CHAPITRE'];?></p>
                  
                     <?php } ?>
                   
                 <?php } ?>
                 <?php if(isset($schapitre['SOUS_SOUSCHAPITRE'])){ ?> 
                     <?php foreach($schapitre['SOUS_SOUSCHAPITRE'] as $sc) { ?>
                   <h6 class="titre-article"><?php echo $parent['NUMERO_CHAPITRE'];?>-<?php  echo $chapitre['NUMERO_CHAPITRE'];?>-<?php echo $schapitre['NUMERO_CHAPITRE'];?>-<?php echo $sc['NUMERO_CHAPITRE'];?>-<?php echo $sc['NOM_CHAPITRE'];?></h6>
   
                  
                 <p class="introduction-chapitre" style="text-align: justify; "><?php echo $sc['INTRODUCTION_CHAPITRE'];?></p>
                  
                     <?php } ?>
                   
                 <?php } ?>
                 <?php } ?>
                 <?php if(isset($chapitre['ARTICLE'])) { ?>
                 <?php foreach($chapitre['ARTICLE'] as $article) { ?> 
                   
   
                   
                   <h6 class="titre-article"><?php echo $parent['NUMERO_CHAPITRE'];?>-<?php  echo $chapitre['NUMERO_CHAPITRE'];?>-<?php echo $article['NUMERO_ARTICLE'];?>-<?php echo $article['TITRE_ARTICLE'];?></h6>
   
                     <?php if($article['IMAGE_ARTICLE']!=null || $article['IMAGE_ARTICLE'] != '') { ?>
                     <img  class="img-sparagraphe" src="<?php echo base_url();?>/assets/image/<?php echo $article['IMAGE_ARTICLE'];?>">
                     <?php } ?>
                  
                 <p class="introduction-chapitre" style="text-align: justify; "><?php echo $article['CONTENU_ARTICLE'];?></p>
                  
                     <?php } ?>
               
                 <?php } ?>
                <?php } ?>
                 <?php } ?>
                  <?php } ?>
                     <?php } else{?>
                 <h4 style="margin-top:10px;color:#FF00FF"><?php echo $chapitre['NUMERO_CHAPITRE'];?>-<?php echo $chapitre['NOM_CHAPITRE'];?></h4>
                 <p class="introduction-chapitre" style="text-align: justify;"><?php echo $chapitre['INTRODUCTION_CHAPITRE'];?></p>
                 <?php if(isset($chapitre['SOUS_CHAPITRE'])) { ?>
                 <?php foreach($chapitre['SOUS_CHAPITRE'] as $schapitre) { ?> 
                   <h5 style="color:rgb(6,100,185);font-size:20px" class="question-sous-guide-souschapitre"><?php echo $chapitre['NUMERO_CHAPITRE'];?>-<?php echo $schapitre['NUMERO_CHAPITRE'];?>-<?php echo $schapitre['NOM_CHAPITRE'];?></h5>
                 <br>
                 <p class="introduction-chapitre" style="text-align:justify;"><?php echo $schapitre['INTRODUCTION_CHAPITRE'];?></p>
   
                   <?php if(isset($schapitre['CONTENU'])){ ?> 
                     <?php foreach($schapitre['CONTENU'] as $contenu) { ?>
                   <h6 class="titre-article"><?php  echo $chapitre['NUMERO_CHAPITRE'];?>-<?php echo $schapitre['NUMERO_CHAPITRE'];?>-<?php echo $contenu['NUMERO_ARTICLE'];?>-<?php echo $contenu['TITRE_ARTICLE'];?></h6>
   
                     <?php if($contenu['IMAGE_ARTICLE']!=null || $contenu['IMAGE_ARTICLE'] != '') { ?>
                     <img  class="img-sparagraphe" src="<?php echo base_url();?>/assets/image/<?php echo $contenu['IMAGE_ARTICLE'];?>">
                     <?php } ?>
                  
                 <p class="introduction-chapitre" style="text-align: justify; "><?php echo $contenu['CONTENU_ARTICLE'];?></p>
                  
                     <?php } ?>
                   
                 <?php } ?>
                 <?php if(isset($schapitre['SOUS_SOUSCHAPITRE'])){ ?> 
                     <?php foreach($schapitre['SOUS_SOUSCHAPITRE'] as $sc) { ?>
                   <h6 class="titre-article"><?php  echo $chapitre['NUMERO_CHAPITRE'];?>-<?php echo $schapitre['NUMERO_CHAPITRE'];?>-<?php echo $sc['NUMERO_CHAPITRE'];?>-<?php echo $sc['NOM_CHAPITRE'];?></h6>
   
                  
                 <p class="introduction-chapitre" style="text-align: justify; "><?php echo $sc['INTRODUCTION_CHAPITRE'];?></p>
                  
                     <?php } ?>
                   
                 <?php } ?>
                 <?php if(isset($schapitre['SOUS_SOUSCHAPITRE'])){ ?> 
                     <?php foreach($schapitre['SOUS_SOUSCHAPITRE'] as $sc) { ?>
                   <h6 class="titre-article"><?php  echo $chapitre['NUMERO_CHAPITRE'];?>-<?php echo $schapitre['NUMERO_CHAPITRE'];?>-<?php echo $sc['NUMERO_CHAPITRE'];?>-<?php echo $sc['NOM_CHAPITRE'];?></h6>
   
                  
                 <p class="introduction-chapitre" style="text-align: justify; "><?php echo $sc['INTRODUCTION_CHAPITRE'];?></p>
                  
                     <?php } ?>
                   
                 <?php } ?>
                 <?php } ?>
                 <?php if(isset($chapitre['ARTICLE'])) { ?>
                 <?php foreach($chapitre['ARTICLE'] as $article) { ?> 
                   
   
                   
                   <h6 class="titre-article"><?php  echo $chapitre['NUMERO_CHAPITRE'];?>-<?php echo $article['NUMERO_ARTICLE'];?>-<?php echo $article['TITRE_ARTICLE'];?></h6>
   
                     <?php if($article['IMAGE_ARTICLE']!=null || $article['IMAGE_ARTICLE'] != '') { ?>
                     <img  class="img-sparagraphe" src="<?php echo base_url();?>/assets/image/<?php echo $article['IMAGE_ARTICLE'];?>">
                     <?php } ?>
                  
                 <p class="introduction-chapitre" style="text-align: justify; "><?php echo $article['CONTENU_ARTICLE'];?></p>
                  
                     <?php } ?>
               
                 <?php } ?>
                 <?php } ?>
                <?php } ?>
                     <?php } ?>
                </div>
                <div class="row">
               
                     <?php 
                     if($nb !=0){
                      $i = count($nb);
                  
                      if($url == $nb[0]['ID_SOUSCHAPITRE']){ ?>
                        <a href="<?php echo site_url('Guide_Controller/sousguide')?>/<?php echo $url+1;?>" class="btn col-4" type="button" style="margin-left: 66%;font-size:14px">Suivant</a>
                      <?php } else if($url>$nb[0]['ID_SOUSCHAPITRE'] && $url<$nb[$i-1]['ID_SOUSCHAPITRE']) { ?>
                        <a href="<?php echo site_url('Guide_Controller/sousguide')?>/<?php echo $url-1;?>" class="btn col-4" type="button" style="font-size: 14px">Précédent</a>
                        <a href="<?php echo site_url('Guide_Controller/sousguide')?>/<?php echo $url+1;?>" class="btn col-4" type="button" style="margin-left: 33%;font-size:14px">Suivant</a>
                      <?php } else if($url == $nb[$i-1]['ID_SOUSCHAPITRE']) { ?>
                        <a href="<?php echo site_url('Guide_Controller/sousguide')?>/<?php echo $url-1;?>" class="btn col-4" type="button" style="font-size: 14px">Précédent</a>
                        <a href="<?php echo site_url("Guide_Controller/sommaire")?>/<?php echo $idguide;?>/1/1" class="col-8" style="color: rgb(53,140,237);font-size:14px;margin-top:0.75%">Retour au Sommaire</a></p>
                      <?php } ?>
                     <?php } else if($nb == 0) { 
                       $j = count($nbguide);
                       if($url == $nbguide[0]['ID_CHAPITRE']) { ?>
                        <a href="<?php echo site_url('Guide_Controller/sousguide')?>/<?php echo $url+1;?>" class="btn col-4" type="button" style="margin-left: 66%;font-size:14px">Suivant</a>
                       <?php } else if($url>$nbguide[0]['ID_CHAPITRE'] && $url<$nbguide[$j-1]['ID_CHAPITRE']) { ?>
                        <a href="<?php echo site_url('Guide_Controller/sousguide')?>/<?php echo $url-1;?>" class="btn col-4" type="button" style="font-size: 14px">Precedent</a>
                        <a href="<?php echo site_url('Guide_Controller/sousguide')?>/<?php echo $url+1;?>" class="btn col-4" type="button" style="margin-left: 33%;font-size:14px">Suivant</a>
                       <?php } else if($url == $nbguide[$j-1]['ID_CHAPITRE']) { ?>
                        <a href="<?php echo site_url('Guide_Controller/sousguide')?>/<?php echo $url-1;?>" class="btn col-4" type="button" style="font-size: 14px">Precedent</a>
      
                      <a href="<?php echo site_url("Guide_Controller/sommaire")?>/<?php echo $idguide;?>/1/1" class="col-8" style="color: rgb(53,140,237);font-size:11px;margin-top:0.75%">Retour au Sommaire</a></p>
                     <?php } ?>
                       <?php } ?>
                 
             
                 
                     </div>
           </div>
              </div>
           </div>
   
                             
                </div>
                </div>
                
      <footer style="margin-top:10%">
        <?php include("assets/include/footer.php");?>
      </footer>
  </body>
</html>