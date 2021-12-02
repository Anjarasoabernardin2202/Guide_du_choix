<!DOCTYPE html>
<html lang="fr">
  <head>
      <meta charset="utf-8"> 
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>GDC - Guides</title>
      <?php include("assets/include/head.php");?>
  </head>

  <body >
  <?php
  $this->load->view("include/visitor_counter.php");
  ?>
    <!-- navbar tout en haut en bleu -->
    <?php $this->load->view("include/navbar.php");?>
    <!-- fin navbar tout en haut en bleu -->

    <!-- navbar principal -->
    <?php $this->load->view('include/header_rubriques.php');?>
            

    <!-- arborescence du site -->
      <nav  aria-label="breadcrumb">
        <ol class="arborescence-multiple breadcrumb py-0 bleuu">
          <li class="breadcrumb-item" ><a class="arborescence" href="<?php echo site_url('Accueil_Controller/');?>">Accueil</a></li>
          <?php foreach($singlepays as $pays) { ?>
            <li class="breadcrumb-item" style="margin-left:-3px"><a  class="arborescence" style="margin-left:-5px" href="<?php echo site_url('Pays_Controller/pays');?>">Pays</a></li>
            <li class="breadcrumb-item" style="margin-left:-3px"><a  class="arborescence" style="margin-left:-5px" href="<?php echo site_url('Rubrique_Controller/listerubriques');?>/<?php echo $pays->ID_PAYS;?>"><?php echo $pays->NOM_PAYS;?></a></li>
          <?php } ?>
          <?php foreach($single as $rubrique) { ?>
          <li class="breadcrumb-item" style="margin-left:-3px"><a  class="arborescence" style="margin-left:-5px" href="<?php echo site_url('Rubrique_Controller/detail');?>/<?php echo $rubrique->ID_RUBRIQUE;?>"><?php echo $rubrique->NOM_RUBRIQUE;?></a></li>
          <?php } ?>
        </ol>
      </nav>
    <!-- fin arborescence du site -->
 
    <!-- main body -->

      <div class="web-only">
        <div class="container" style="margin-bottom:5%;">
          <div class="row">
          <div class="col-8" style="margin:auto">
       
        
                <div style="margin-top:5%" class="card taille-guide">
                <br>
                <h5 class="titre-liste-guides text-center">Liste de nos guides conseils</h5>
                <br>
                <div class="container">
                  <div class="row">
             <?php if($listeguides2 !=null) { ?>
                    <div class="col-6">
                    <?php if(count($listeguides2)>=10){?>
                    <?php for($i = 0; $i < 7; $i++) { ?>
                    <p >  <a style="color:rgb(78,78,78)" href="<?php echo site_url('Guide_Controller/detailguide');?>/<?php echo $listeguides2[$i]['ID_GUIDE'];?>/1/1" class="guide"><img  src="<?php echo base_url();?>assets/image/<?php echo $listeguides2[$i]['SYMBOLE_GUIDE'];?>"> <?php echo $listeguides2[$i]['NOM_GUIDE'];?><br /> </a> </p>
                  <?php } ?> 
                    </div>
                    <div class="col-6">
                    <?php for($i = 7; $i < count($listeguides2); $i++) { ?>
                    <p >  <a style="color:rgb(78,78,78)" href="<?php echo site_url('Guide_Controller/detailguide');?>/<?php echo $listeguides2[$i]['ID_GUIDE'];?>/1/1" class="guide"><img  src="<?php echo base_url();?>assets/image/<?php echo $listeguides2[$i]['SYMBOLE_GUIDE'];?>"> <?php echo $listeguides2[$i]['NOM_GUIDE'];?><br /> </a> </p>
                  <?php } ?> 
                    </div>
                  </div>
                    <?php } else{?>
                    <div class="col-12 text-center" style="margin-left:50%">
                      <?php foreach($listeguides as $guides) { ?>
                    <p>  <a style="color:rgb(78,78,78)" href="<?php echo site_url('Guide_Controller/detailguide');?>/<?php echo $guides->ID_GUIDE;?>/1/1" class="guide"><img   src="<?php echo base_url();?>assets/image/<?php echo $guides->SYMBOLE_GUIDE;?>"> <?php echo $guides->NOM_GUIDE;?><br /> </a> </p>
                  <?php } ?> 
                  </div>
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
      <div class="mobile-only">
      <div class="col-12 wrapper-rubriques">
          <div class="liste-guides">
      
                 <h5 class="titre-liste-guides">Liste de nos guides conseils</h5>
                 <?php if($listeguides !=null){ ?>
                  <?php foreach($listeguides as $guides) { ?>
                    <p>  <a  href="<?php echo site_url('Guide_Controller/detailguide');?>/<?php echo $guides->ID_GUIDE;?>/1/1" class="guide"><img  src="<?php echo base_url();?>assets/image/<?php echo $guides->SYMBOLE_GUIDE;?>"> <?php echo $guides->NOM_GUIDE;?><br /> </a> </p>
                  <?php } ?>  
                 <?php }  ?>
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