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
                <div class="col-12 position-parrain"  style=" margin-top: 3%">
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
                    </div>
                    </div>
                    </div>
      
            <div class="row" style="margin-left:5%;margin-right:2%;margin-top:10px;">
            <a href="<?php echo site_url("Guide_Controller/detailguide")?>/<?php echo $idguide;?>/1/1" class="col-8 lien-detailguide">Retour au Sommaire</a>
               
                    </div>
              
                    <label for="alignment" style="display:none">Alignment:</label>
<select id="alignment_option" style="display: none">
  <option value="start">Start</option>
  <option value="center" selected>Center</option>
  <option value="end">End</option>
  <option value="none">None</option>
</select>

<div class="container web-only" style="margin:auto">
  <div class="row">
    <div class="col-12" style="margin:auto">
        <div id="paginated_gallery" class="gallery">
            <div class="gallery_scroller" style="display:flex">
            <?php foreach($listeminiguide as $miniguide){ ?>
              <?php if($miniguide->BANDE_MINIGUIDE != null || !empty($miniguide->BANDE_MINIGUIDE)){?>
                    <div class="col-12" >
                        <h2><?php echo $miniguide->NOM_MINIGUIDE?></h2>
                    <!-- <img class="mobile-only"  src="<?php echo base_url()?>/assets/image/<?php echo $miniguide->BANDE_MINIGUIDE?>"> -->
                        
                    <img class="web-only" style="width:810px;height:auto" src="<?php echo base_url()?>/assets/image/<?php echo $miniguide->BANDE_MINIGUIDE?>">
                  </div>
                  <?php } else{?>
            <div>
                <div class="row" >
                <?php if($miniguide->TEXTE_MINIGUIDE != null || !empty($miniguide->TEXTE_MINIGUIDE)){?>
                    <h3><?php echo $miniguide->TEXTE_MINIGUIDE;?></h3>
                  <?php } else { ?>
                    <?php if($miniguide->TITRE_MINIGUIDE != NULL){ ?>
                        <h4><?php echo $miniguide->TITRE_MINIGUIDE;?></h4>
                        <div class="texte-miniguide web-only" style="margin-top:-12px"><?php echo $miniguide->CONTENU_MINIGUIDE?></div>
                        <!-- <div class="texte-miniguide mobile-only" style="margin-top:-12px"><?php echo $miniguide->SMARTPHONE_MINIGUIDE?></div> -->

                    <?php } else{ ?>
                      <div class="texte-miniguide web-only"><?php echo $miniguide->CONTENU_MINIGUIDE?></div>
                      <!-- <div class="texte-miniguide mobile-only" style="margin-top:-12px"><?php echo $miniguide->SMARTPHONE_MINIGUIDE?></div> -->

                    <?php } ?>
                  <?php } ?>

                  </div>
              </div>
                  <?php } ?>
            <?php } ?>          
            </div>
            
         
            <div class="btn-group">
              <button type="submit" onclick="scrollToPrevPage()" class="btn prev fa fa-chevron-left" style="width:3%;"></button>
              <button type="submit" onclick="scrollToNextPage()"  class="btn next fa fa-chevron-right" style="width:3%;"></button>
            </div>
          </div>
    </div>      
        </div>
              </div>
 
           
                           </div>
                </div>
              
                <div class="container mobile-only" style="margin:auto">
                <div class="row">
    <div class="col-12" style="margin:auto">
        <div id="paginated_gallery" class="gallery">
            <div class="gallery_scroller" style="display:flex">
            <?php foreach($listeminiguide as $miniguide){ ?>
              <?php if($miniguide->BANDE_MINIGUIDE != null || !empty($miniguide->BANDE_MINIGUIDE)){?>
                    <div class="col-12" >
                        <h2><?php echo $miniguide->NOM_MINIGUIDE?></h2>
                    <img class="mobile-only" style="width:300px;height:auto;margin-bottom:5px;"  src="<?php echo base_url()?>/assets/image/<?php echo $miniguide->BANDE_MINIGUIDE?>">
                        
                   
                  
                  <?php } else{?>
            <div>
                <div class="row" >
                <?php if($miniguide->TEXTE_MINIGUIDE != null || !empty($miniguide->TEXTE_MINIGUIDE)){?>
                    <h3><?php echo $miniguide->TEXTE_MINIGUIDE;?></h3>
                  <?php } else { ?>
                    <?php if($miniguide->TITRE_MINIGUIDE != NULL){ ?>
                        <h4><?php echo $miniguide->TITRE_MINIGUIDE;?></h4>
                        <!-- <div class="texte-miniguide web-only" style="margin-top:-12px"><?php echo $miniguide->CONTENU_MINIGUIDE?></div> -->
                        <div class="texte-miniguide mobile-only" style="margin-top:-12px"><?php echo $miniguide->SMARTPHONE_MINIGUIDE?></div>

                    <?php } else{ ?>
                      <!-- <div class="texte-miniguide web-only"><?php echo $miniguide->CONTENU_MINIGUIDE?></div> -->
                      <div class="texte-miniguide mobile-only" style="margin-top:-12px"><?php echo $miniguide->SMARTPHONE_MINIGUIDE?></div>

                    <?php } ?>
                  <?php } ?>

                  </div>
              </div>
                  <?php } ?>
            <?php } ?>       
                    </div>   
            </div>
            
         
            <!-- <div class="btn-group">
              <button type="submit" onclick="scrollToPrevPageMobile()" class="btn prev fa fa-chevron-left" style="width:3%;"></button>
              <button type="submit" onclick="scrollToNextPageMobile()"  class="btn next fa fa-chevron-right" style="width:3%;"></button>
            </div> -->
          </div>
    </div>      
        </div>
              </div>
 
           
                           </div>
                </div>
                </div>
                  
      <footer style="margin-top:10%">
        <?php include("assets/include/footer.php");?>
        <script>
          document.querySelector('#alignment_option').addEventListener('change', updateAlignment);

          const gallery = document.querySelector('#paginated_gallery');
          const gallery_scroller = gallery.querySelector('.gallery_scroller');
          const gallery_item_size = gallery_scroller.querySelector('div').clientWidth;
          const gallery_item_size2 = gallery_scroller.querySelector('div').clientHeight;
          const timeline = document.getElementById('timeline-gdc');
      
      
          function scrollToNextPage() {
            gallery_scroller.scrollBy(gallery_item_size, 0);
          }

          function scrollToPrevPage() {
            gallery_scroller.scrollBy(-gallery_item_size, 0);
          }

       

          function updateAlignment(event) {
            const alignment = event.target.value;
            for (item of gallery.querySelectorAll('.gallery_scroller > div'))
              item.style.scrollSnapAlign = alignment;
          }

          </script>
      </footer>
  </body>
</html>