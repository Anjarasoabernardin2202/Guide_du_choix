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
          
            <!-- <?php foreach($singlepays as $pays) { ?>
              <li class="breadcrumb-item"><a class="arborescence " href="#"><?php echo $pays->NOM_PAYS;?></a></li>
            <?php } ?> -->
        </ol>
      </nav>
      <!-- arborescence du site -->

      <!-- main body -->
      
        
      
      <div style="margin-top:1%;">
       
       
          <div class="web-only">
            <div class="container">
              <div class="row">
                <div class="col-10">
                <?php foreach($singlepays as $pays) { ?>
            <div class="card taille-pays web-only">
            <h4 class="rubriques"><i><img style="width:25px;height:20px;" src="<?php echo base_url()?>/assets/image/<?php echo $pays->IMAGE_DRAPEAU;?>" alt="mini drapeau" ></i> <?php echo $pays->NOM_PAYS;?></h4>
              <div class="description">
                <p style="text-align: justify; ">
                <?php echo $pays->INTRODUCTION_PAYS;?>
                 
                </p>
              </div>
                </div>
              </div>
            
  
                          <div class="col-2 " style="margin-top:20px;margin-bottom:-25rem">
                              <div class="row customer-logos">
                              <?php if($nbsponsor == 0){?> 
                                  <div class="column">
                                   
                                    <div  class="slide"><img src="https://dummyimage.com/400x150/55595c/fff" alt="Snow" class="dummyimg0"></a></div>
                               
                                   <div  class="slide"><img src="https://dummyimage.com/400x150/55595c/fff" alt="Forest" class="dummyimg1"></div>
                                   <div class="slide"><img src="https://dummyimage.com/400x150/55595c/fff" alt="Mountains" class="dummyimg2"></div>
                
                                  </div>
                                  <div class="column">
                                   <div class="slide"><img src="https://dummyimage.com/400x150/55595c/fff" alt="Forest" class="dummyimg1"></div>
                                   <div  class="slide"><img src="https://dummyimage.com/400x150/55595c/fff" alt="Mountains" class="dummyimg2"></div>
                                   <div class="slide"><img src="https://dummyimage.com/400x150/55595c/fff" alt="Snow" class="dummyimg2"></div>
                                  
                                  </div>
                
                                  <?php } ?>
                                <?php if($nbsponsor == 1){?> 
                                  <div class="column">
                                    <?php foreach($listesponsor as $sponsor) { ?>
                                    <div  class="slide"><a href="<?php echo site_url("Pays_Controller/singlesponsor")?>/<?php echo $sponsor['ID_SPONSOR'];;?>"><img src="<?php echo base_url();?>/assets/image/<?php echo $sponsor['IMAGE_SPONSOR']?>" alt="Snow" class="dummyimg0"></a></div>
                                    <?php } ?>
                                   <div  class="slide"><img src="https://dummyimage.com/400x150/55595c/fff" alt="Forest" class="dummyimg1"></div>
                                   <div class="slide"><img src="https://dummyimage.com/400x150/55595c/fff" alt="Mountains" class="dummyimg2"></div>
                
                                  </div>
                                  <div class="column">
                                   <div class="slide"><img src="https://dummyimage.com/400x150/55595c/fff" alt="Forest" class="dummyimg1"></div>
                                   <div  class="slide"><img src="https://dummyimage.com/400x150/55595c/fff" alt="Mountains" class="dummyimg2"></div>
                                   <div class="slide"><img src="https://dummyimage.com/400x150/55595c/fff" alt="Snow" class="dummyimg2"></div>
                                  
                                  </div>
                
                                  <?php } ?>
                                  <?php if($nbsponsor == 2){?> 
                                  <div class="column">
                                    <?php foreach($listesponsor as $sponsor) { ?>
                                    <div  class="slide"><a href="<?php echo site_url("Pays_Controller/singlesponsor")?>/<?php echo $sponsor['ID_SPONSOR'];?>"><img src="<?php echo base_url();?>/assets/image/<?php echo $sponsor['IMAGE_SPONSOR']?>" alt="Snow" class="dummyimg0"></a></div>
                                    <?php } ?>
                                   <div class="slide"><img src="https://dummyimage.com/400x150/55595c/fff" alt="Mountains" class="dummyimg2"></div>
                
                                  </div>
                                  <div class="column">
                                   <div class="slide"><img src="https://dummyimage.com/400x150/55595c/fff" alt="Forest" class="dummyimg1"></div>
                                   <div  class="slide"><img src="https://dummyimage.com/400x150/55595c/fff" alt="Mountains" class="dummyimg2"></div>
                                   <div class="slide"><img src="https://dummyimage.com/400x150/55595c/fff" alt="Snow" class="dummyimg2"></div>
                                  
                                  </div>
                
                                  <?php } ?>
                                  <?php if($nbsponsor == 3){?> 
                                  <div class="column">
                                    <?php foreach($listesponsor as $sponsor) { ?>
                                    <div  class="slide"><a href="<?php echo site_url("Pays_Controller/singlesponsor")?>/<?php echo $sponsor['ID_SPONSOR'];?>"><img src="<?php echo base_url();?>/assets/image/<?php echo $sponsor['IMAGE_SPONSOR']?>" alt="Snow" class="dummyimg0"></a></div>
                                    <?php } ?>
                
                                  </div>
                                  <div class="column">
                                   <div class="slide"><img src="https://dummyimage.com/400x150/55595c/fff" alt="Forest" class="dummyimg1"></div>
                                   <div  class="slide"><img src="https://dummyimage.com/400x150/55595c/fff" alt="Mountains" class="dummyimg2"></div>
                                   <div class="slide"><img src="https://dummyimage.com/400x150/55595c/fff" alt="Snow" class="dummyimg2"></div>
                                  
                                  </div>
                
                                  <?php } ?>
                                  <?php if($nbsponsor == 4){?> 
                                  <div class="column">
                                    <?php for($i = 0; $i<=2; $i++) { ?>
                                    <div  class="slide"><a href="<?php echo site_url("Pays_Controller/singlesponsor")?>/<?php echo $sponsor[$i]['ID_SPONSOR'];?>"><img src="<?php echo base_url();?>/assets/image/<?php echo $listesponsor[$i]['IMAGE_SPONSOR']?>" alt="Snow" class="dummyimg0"></a></div>
                                    <?php } ?>
                
                                  </div>
                                  <div class="column">
                                   
                                      <div  class="slide"><a href="<?php echo site_url("Pays_Controller/singlesponsor")?>/<?php echo $sponsor[3]['ID_SPONSOR'];?>"><img src="<?php echo base_url();?>/assets/image/<?php echo $listesponsor[3]['IMAGE_SPONSOR']?>" alt="Snow" class="dummyimg0"></a></div>
                                  
                                 
                                   <div  class="slide"><img src="https://dummyimage.com/400x150/55595c/fff" alt="Mountains" class="dummyimg2"></div>
                                   <div class="slide"><img src="https://dummyimage.com/400x150/55595c/fff" alt="Snow" class="dummyimg2"></div>
                                  
                                  </div>
                
                                  <?php } ?>
                                  <?php if($nbsponsor == 5){?> 
                                  <div class="column">
                                    <?php for($i = 0; $i<=2; $i++) { ?>
                                    <div  class="slide"><a href="<?php echo site_url("Pays_Controller/singlesponsor")?>/<?php echo $sponsor[$i]['ID_SPONSOR'];?>"><img src="<?php echo base_url();?>/assets/image/<?php echo $listesponsor[$i]['IMAGE_SPONSOR']?>" alt="Snow" class="dummyimg0"></a></div>
                                    <?php } ?>
                
                                  </div>
                                  <div class="column">
                                  <div  class="slide"><a href="<?php echo site_url("Pays_Controller/singlesponsor")?>/<?php echo $sponsor[3]['ID_SPONSOR'];?>"><img src="<?php echo base_url();?>/assets/image/<?php echo $listesponsor[3]['IMAGE_SPONSOR']?>" alt="Snow" class="dummyimg0"></a></div>
                                  <div  class="slide"><a href="<?php echo site_url("Pays_Controller/singlesponsor")?>/<?php echo $sponsor[4]['ID_SPONSOR'];?>"><img src="<?php echo base_url();?>/assets/image/<?php echo $listesponsor[4]['IMAGE_SPONSOR']?>" alt="Snow" class="dummyimg0"></a></div>
                                
                                     
                                  
                                  
                                   <div class="slide"><img src="https://dummyimage.com/400x150/55595c/fff" alt="Snow" class="dummyimg2"></div>
                                  
                                  </div>
                
                                  <?php } ?>
                                  <?php if($nbsponsor == 6){?> 
                                  <div class="column">
                                    <?php for($i = 0; $i<=2; $i++) { ?>
                                    <div  class="slide"><a href="<?php echo site_url("Pays_Controller/singlesponsor")?>/<?php echo $sponsor[$i]['ID_SPONSOR'];?>"><img src="<?php echo base_url();?>/assets/image/<?php echo $listesponsor[$i]['IMAGE_SPONSOR']?>" alt="Snow" class="dummyimg0"></a></div>
                                    <?php } ?>
                
                                  </div>
                                  <div class="column">
                                  <div  class="slide"><a href="<?php echo site_url("Pays_Controller/singlesponsor")?>/<?php echo $sponsor[3]['ID_SPONSOR'];?>"><img src="<?php echo base_url();?>/assets/image/<?php echo $listesponsor[3]['IMAGE_SPONSOR']?>" alt="Snow" class="dummyimg0"></a></div>
                                  <div  class="slide"><a href="<?php echo site_url("Pays_Controller/singlesponsor")?>/<?php echo $sponsor[4]['ID_SPONSOR'];?>"><img src="<?php echo base_url();?>/assets/image/<?php echo $listesponsor[4]['IMAGE_SPONSOR']?>" alt="Snow" class="dummyimg0"></a></div>
                                  <div  class="slide"><a href="<?php echo site_url("Pays_Controller/singlesponsor")?>/<?php echo $sponsor[5]['ID_SPONSOR'];?>"><img src="<?php echo base_url();?>/assets/image/<?php echo $listesponsor[5]['IMAGE_SPONSOR']?>" alt="Snow" class="dummyimg0"></a></div>
                
                                  
                                  
                                  </div>
                
                                  <?php } ?>
                                 
                                  
                                          </div>
                                          </div>
          </div>
          </div>
          
          </div>
          <div class="mobile-only">
              <h4 class="rubriques"><i><img style="width:25px;height:20px;border-style:solid;border-width:1px;border-color: grey" src="<?php echo base_url()?>/assets/image/<?php echo $pays->IMAGE_DRAPEAU;?>" alt="mini drapeau" ></i> <?php echo $pays->NOM_PAYS;?></h4>
              <div class="description">
                <p style="text-align: justify; margin-top: -2px">
                <?php echo $pays->INTRODUCTION_PAYS_SMARTPHONE;?>
                </p>
              </div>
              <?php } ?>
          </div>
          


  
            
          <?php $this->load->view("include/sponsorpays.php");?>
       
          <div class="web-only">
          <?php foreach($singlepays as $pays){?>
          <?php if($pays->ID_PAYS ==1 ){?>
          <div class="container">
            <div class="row">
              <div class="col-12">
              <br><br>
          <a href="<?php echo site_url("Commune_Controller/liste/1")?>">Services communaux aux PME et jeunes talents</a>
                </div>
                
                <div class="col-12" >
                <br>
                <a href="#" >Relation avec les médias</a>
                </div>
                <div class="col-12">
                <br>
                <a href="#">Témoignages</a>
                </div>
                </div>
                </div>
          <?php } ?>
          <?php }?>
          </div>
          <div class="mobile-only">
          
          <?php foreach($singlepays as $pays){?>
          <?php if($pays->ID_PAYS ==1 ){?>
          <div class="container">
            <div class="row">
              <div class="col-12">
              <br><br>
          <a href="<?php echo site_url("Commune_Controller/liste/1")?>">Services communaux aux PME et jeunes talents</a>
                </div>
                
                <div class="col-12">
                <br>
                <a href="#">Relation avec les médias</a>
                </div>
                <div class="col-12">
                <br>
                <a href="#">Témoignages</a>
                </div>
                </div>
                </div>
          <?php } ?>
          <?php }?>
          </div>
    
      <!-- fin main body -->
      


      
      
  </body>
  <footer style="margin-top: 200px">
        <?php include("assets/include/footer.php");?>
  </footer>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
      <script>
                $(document).ready(function(){
                      $('.customer-logos').slick({
                          slidesToShow: 1,
                          slidesToScroll: 1,
                          autoplay: true,
                          autoplaySpeed: 7000,
                          arrows: false,
                          dots: false,
                          pauseOnHover: false,
                          responsive: [{
                              breakpoint: 768,
                              settings: {
                                  slidesToShow: 4
                              }
                          }, {
                              breakpoint: 520,
                              settings: {
                                  slidesToShow: 3
                              }
                          }]
                      });
                  });

</script>  
</html>