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

    <!-- arborescence du site -->
    <div class="web-only">
    <?php $this->load->view('include/header_rubriques.php');?>
</div>
    <!-- fin arborescence du site -->

    <!-- main body -->
    
      <a href="<?php echo site_url('TPE_Controller/Rubrique1');?>/<?php echo $idrubrique;?>" class="btn" style="margin-left:7%;margin-top:3%;height:40px" type="submit">Retour</a>

  

      <div class="web-only">
      <div class="container">
      <div class="row">

      <div class="col-8 card " style="width:700px;height:auto;margin:auto;margin-top:1%;margin-bottom:3%">
       <div class="container">
         <div class="row">
       <?php foreach($single as $guide) { ?>
       
           <div class="col-4">
         <img src="<?php echo base_url()?>/assets/image/<?php echo $guide->IMAGE_GUIDE;?>" class="imgdetailguide">

            </div>
            <div class="col-8">
            <br>
            <?php if($idguide_miniguide == null) { ?>
        <p class="text-center"> <a href="<?php echo site_url("Guide_Controller/sousguide/79")?>/<?php echo $guide->ID_GUIDE;?>/1/1" style="margin-top:3%;font-size:25px;" ><?php echo $guide->NOM_GUIDE;?></a></p>

          <p style="text-align: justify;font-size:14px"><?php echo $guide->DESCRIPTION_GUIDE;?></p>
         
       
     
          <br>
       <p class="description-detail-guide " style="margin-bottom:3%;">Pour en savoir plus, consultez le <a href="<?php echo site_url("Guide_Controller/sousguide/69")?>/<?php echo $guide->ID_GUIDE;?>/1/1"><strong>Sommaire</strong> </a></p>
            <?php }  else { ?>
        <p class="text-center"> <a href="<?php echo site_url("Guide_Controller/miniguide")?>/<?php echo $guide->ID_GUIDE;?>" style="margin-top:3%;font-size:25px;" ><?php echo $guide->NOM_GUIDE;?></a></p>

          <p style="text-align: justify;font-size:14px"><?php echo $guide->DESCRIPTION_GUIDE;?></p>
       
       
     
          <br>
     <p class="description-detail-guide " style="margin-bottom:3%;margin-left:5px">Pour en savoir plus, cliquez <a href="<?php echo site_url("Guide_Controller/miniguide")?>/<?php echo $guide->ID_GUIDE;?>"><strong>ici</strong> </a></p>
     <?php } ?> 
            <?php } ?>
           
            </div>
          </div>
       </div>

       
       <br>
    
       </div>
       <div class="container" style="margin-bottom:3%">
       <div class="row">
       <?php for($i=0;$i<4;$i++) { ?>
       <div class="col-3">
         <img src="<?php echo base_url()?>/assets/image/<?php echo $image[$i]['NOM_IMAGE']?>" class="imgdetailguide4" >

            </div>
       <?php } ?>
          </div>
          </div>
      </div>
      </div>
      </div>

      </div>
      
      <div class="mobile-only">

        <div class="col-12 wrapper-detail-guide" style="margin-top:1%">
        <div class="introduction-detail-guide" style="margin-left: 3%; margin-right: 3%;margin-bottom:20%">
       
          <?php foreach($single as $guide) { ?>
            <?php if($idguide_miniguide == null) {?>
            <h5 class="titre-detail-guide row" style="margin-left: 2%">
            <img src="<?php echo base_url()?>/assets/image/<?php echo $guide->IMAGE_GUIDE;?>" class="imgdetailguide">
          
         
          
              <a href="<?php echo site_url("Guide_Controller/sommaire")?>/<?php echo $guide->ID_GUIDE;?>/1/1" style="margin-top: 10%;" class="col-5 "><?php echo $guide->NOM_GUIDE;?></a>

              </h5>
            <p style="text-align: justify;margin-left: 2%;margin-right: 2%"><?php echo $guide->DESCRIPTION_GUIDE_SMARTPHONE;?></p>

            <p class="description-detail-guide text-center">Pour en savoir plus, consultez le <a href="<?php echo site_url("Guide_Controller/sommaire")?>/<?php echo $guide->ID_GUIDE;?>/1/1"><strong>Sommaire</strong> </a></p>
          <?php } else { ?>
            <h5 class="titre-detail-guide row" style="margin-left: 2%">
            <img src="<?php echo base_url()?>/assets/image/<?php echo $guide->IMAGE_GUIDE;?>" class="imgdetailguide">
          
         
          
              <a href="<?php echo site_url("Guide_Controller/miniguide")?>/<?php echo $guide->ID_GUIDE;?>" style="margin-top: 10%;" class="col-5 "><?php echo $guide->NOM_GUIDE;?></a>

              </h5>
            <p style="text-align: justify;margin-left: 2%;margin-right: 2%"><?php echo $guide->DESCRIPTION_GUIDE_SMARTPHONE;?></p>
            <p class="description-detail-guide text-center" style="margin-bottom:3%;">Pour en savoir plus, cliquez <a href="<?php echo site_url("Guide_Controller/miniguide")?>/<?php echo $guide->ID_GUIDE;?>"><strong>ici</strong> </a></p>

          
          <?php } ?>
          <?php } ?>
        </div>
          </div>
          </div>
    </div>
    </div>



    
  </body>
  <footer>
      <?php include("assets/include/footer.php");?>
  </footer>
</html>