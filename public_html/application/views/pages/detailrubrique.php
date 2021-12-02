<!DOCTYPE html>
<html lang="fr">
  <head>
      <meta charset="utf-8"> 
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>GDC - Rubrique</title>
      <?php include("assets/include/head.php");?>
  </head>

  <body >
  <?php
  $this->load->view("include/visitor_counter.php");
  ?>
    <!-- navbar tout en haut en bleu -->
    <?php $this->load->view("include/navbar1.php");?>
    <!-- fin navbar tout en haut en bleu -->

    <!-- navbar principal -->
    <?php $this->load->view('include/header_rubriques.php');?>
  
<style>
    .hidebar{
        display:none
    }
    .showbar{
        display:block!important;
    }
</style>
    <!-- arborescence du site -->
      <nav  aria-label="breadcrumb">
        <ol class="arborescence-multiple breadcrumb py-0 bleuu">
          <li class="breadcrumb-item" ><a class="arborescence" href="<?php echo site_url('Accueil_Controller/');?>">Accueil</a></li>
 
          <?php foreach($single as $rubrique) { ?>
          <li class="breadcrumb-item" style="margin-left:-3px"><a  class="arborescence" style="margin-left:-5px" href="#"><?php echo $rubrique->NOM_RUBRIQUE;?></a></li>
          <?php } ?>
        </ol>
      </nav>
    <!-- fin arborescence du site -->
 
    <!-- main body -->
    <div style="margin-top:3%;">
      <div class="container">
        <div class="row">
          <div style="margin-top:1%;margin:auto" class="col-10">
            <div class="card">
              <div class="container">
                <div class="row"> 
                  <div class="description col-6">
                    <p style="margin-top: 5%;font-family: FreeSerif" >
                      <?php echo $rubrique->DESCRIPTION_RUBRIQUE;?> 
                    </p>
                  </diV>
                  <div class="col-4">
                    <img style="width:270px;margin-top:10%" src="<?php echo base_url()?>/assets/image/<?php echo $rubrique->IMAGE_RUBRIQUE;?>">           
                  </div>                
                </div>
              </div>
			   <div class="container">
       <div class="card mt-5 text-justify">
            <div class="container g-5">
              
        <!--barre de recherhe-->
 <div class="container"style="margin-bottom:5%" >
  <div class="row">

  
    <div class="col-4 justify-content-center">
        <!--liste des drapeau-->
        <button class="button" style="display:block;margin:20px auto;background-color:transparent; border: none; text-align:center; border-radius: 5px;">
        <a style="color: black; font-size: 20px;" class="dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"aria-haspopup="true" aria-expanded="false">Choisissez votre pays </a>

              <div class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
             <a style="color:rgb(78,80,81);font-size:11px;" class="dropdown-item" href="#" onclick="clicker(event)"><img class="liste-drapeau" src="https://guiduchoix24.com//assets/image/madagascar.png"> MDG</a>
              </div> </a>
     </button>
        <!-- fin liste des drapeau-->
     
    </div>
    
</div>
</div>
            </div>      
          </div>
        </div>
      </div>
	  	<div class="container">
        <div class="card mt-3 text-justify hidebar" id="boxing">
            <div class="container g-5">
           <!--block pays-->
          <div class="container"  style="text-align:center; background-color:none;">
            <div class="row mb-3 -">
            <div class="col-lg-12">
              <h3 class="text-center mt-3" style="font-size:24px;">Pays Madagascar</h3>
              <h5 class="mobile-only" style="color: #0f0f0f;"></h5>
              <!-- <a style="color:#467fbf;font-size:20px;font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;text-decoration: none;" href="https://guiduchoix24.com/index.php/Parrain_Controller/parrains"> Voir tous nos parrains <i class="fa fa-chevron-right"></i></a> -->
            </div>
            </div>
            <br>
            
            <div class="row parrains-animation" >
             
              <div class="col-12  bloc-parrain">
            <div class="col-4">
              <div class="card taille-section2 slide" style="background-color:rgba(170,189,222,0.2);">
                <div class="card-anatiny ">
                    <img class="img-parrain2 " src="<?php echo base_url("assets/image/wallpaper.png");?>">
                    
                </div>
              </div>
            </div>
            </div>
             
              <div class="col-12  bloc-parrain">
            <div class="col-4">
              <div class="card taille-section2 slide" style="background-color:rgba(170,189,222,0.2);">
                <div class="card-anatiny ">
                    <img class="img-parrain2 " src="<?php echo base_url("assets/image/wallpaper.png");?>">
                    
                </div>
              </div>
            </div>
            </div>
             
              <div class="col-12  bloc-parrain">
            <div class="col-4">
              <div class="card taille-section2 slide" style="background-color:rgba(170,189,222,0.2);">
                <div class="card-anatiny ">
                    <img class="img-parrain2 " src="<?php echo base_url("assets/image/wallpaper.png");?>">

                </div>
              </div>
            </div>
            </div>
             
              <div class="col-12  bloc-parrain">
            <div class="col-4">
              <div class="card taille-section2 slide" style="background-color:rgba(170,189,222,0.2);">
                <div class="card-anatiny ">
                    <img class="img-parrain2 " src="<?php echo base_url("assets/image/wallpaper.png");?>">
                    
                </div>
              </div>
            </div>
            </div>
             
              <div class="col-12  bloc-parrain">
            <div class="col-4">
              <div class="card taille-section2 slide" style="background-color:rgba(170,189,222,0.2);">
                <div class="card-anatiny ">
                    <img class="img-parrain2 " src="<?php echo base_url("assets/image/wallpaper.png");?>">
                   
                </div>
              </div>
            </div>
            </div>
             
              <div class="col-12  bloc-parrain">
            <div class="col-4">
              <div class="card taille-section2 slide" style="background-color:rgba(170,189,222,0.2);">
                <div class="card-anatiny ">
                    <img class="img-parrain2 " src="<?php echo base_url("assets/image/wallpaper.png");?>">
                     

                </div>
              </div>
            </div>
            </div>
            </div>
       </div><br>
        <br>

            
 
  </div>
</div>
                  
      <!-- liste des orientation--> 


  



         <!-- liste des orientation--> 
       
</div>
      <div class="container" style="margin-bottom:5%;">
          <div class="row">
          <div class="col-8" style="margin:auto">
       
        
                <div style="margin-top:5%" class="card taille-guide">
                <br>
                <h5 class="titre-liste-guides text-center">Consultez nos guides</h5>
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
     
     <!-- debut special guidutalent et cite des metiers mobile-->
   </div> 
  </body>
  <footer style="margin-top: 200px">
        <?php include("assets/include/footer.php");?>
		   <script>
            var clicker = function(event){
				console.log('eee');
                // var selectvar = document.getElementById('selectes');
                var boxShow = document.getElementById('boxing');
                // selectvar.classList.toggle('showbar');
                boxShow.classList.toggle('showbar');
            }
     

        </script>
  </footer>
</html>