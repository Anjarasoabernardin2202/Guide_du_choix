<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GDC - Choix Pays</title>
    <?php include("assets/include/head.php")?>
    <style>
      body{
        background-color:white;
      }
    </style>
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
          <!-- <li class="breadcrumb-item"><a class="arborescence" href="<?php echo site_url('Accueil_Controller/');?>">Pays</a></li> -->
        </ol>
      </nav>
    <!-- arborescence du site -->
          
    <!-- main body -->
    <div class="web-only">
      <div class="container">
        <div class="row">
          <div class="col-8">
          <div class="view mx-auto d-block" style="margin-bottom: 5%;margin-top:20px;">
      <img class="img-carte"  src="<?php echo base_url("assets/image/carte_afrique.png");?>" alt="carte afrique" >
   
        <div  class="layer bleuu" style="border-radius:0.35rem;">
          <div class="contenu-pays">
            <h5 class="choixpays">Choisissez votre pays</h5>
                <?php foreach($liste as $pays) { ?>
                  <a href="<?php echo site_url('Rubrique_Controller/listerubriques');?>/<?php echo $pays->ID_PAYS;?>"><img class="img-drapeau"  src="<?php echo base_url()?>/assets/image/<?php echo $pays->IMAGE_DRAPEAU;?>"></a>
                  <?php echo $links;?>
                  <a class="pays" href="<?php echo site_url('Rubrique_Controller/listerubriques');?>/<?php echo $pays->ID_PAYS;?>">
                    <p id="position-pays"><?php echo $pays->NOM_PAYS?></p>
                  </a>
                <?php } ?>
            </div>
          </div>
        </div>
          </div>
        <!-- </div>

      </div> -->
 
        <div class="col-2 " style="margin-left:15%;margin-top:20px;margin-bottom:-25rem">
              <div class="row customer-logos">
                <?php if($nbsponsor == 1){?> 
                  <div class="column">
                    <?php foreach($listesponsor as $sponsor) { ?>
                    <div  class="slide"><a href="<?php echo site_url("Pays_Controller/singlesponsor")?>/<?php echo $sponsor['ID_SPONSOR'];?>"><img src="<?php echo base_url();?>/assets/image/<?php echo $sponsor['IMAGE_SPONSOR']?>" alt="Snow" style="padding-top:30px;padding-left:5px;padding-right:5px;padding-bottom:30px;border-style:solid;border-color:rgba(135, 206, 250,0.8);border-radius:0.35rem;margin-bottom:90px;width:120px;height:100px;"></a></div>
                    <?php } ?>
                   <div  class="slide"><img src="https://dummyimage.com/400x150/55595c/fff" alt="Forest" style="padding-top:25px;padding-left:5px;padding-right:5px;padding-bottom:30px;border-style: solid;border-color:rgba(135, 206, 250,0.8);border-radius:0.35rem;margin-top:90px;margin-bottom:90px;width:auto;height:100px"></div>
                   <div class="slide"><img src="https://dummyimage.com/400x150/55595c/fff" alt="Mountains" style="padding-top:30px;padding-left:5px;padding-right:5px;padding-bottom:30px;border-style: solid;border-color:rgba(135, 206, 250,0.8);border-radius:0.35rem;margin-top:90px;;width:120px;height:100px"></div>

                  </div>
                  <div class="column">
                   <div class="slide"><img src="https://dummyimage.com/400x150/55595c/fff" alt="Forest" style="padding-top:25px;padding-left:5px;padding-right:5px;padding-bottom:30px;border-style: solid;border-color:rgba(135, 206, 250,0.8);border-radius:0.35rem;margin-bottom:90px;width:auto;height:100px"></div>
                   <div  class="slide"><img src="https://dummyimage.com/400x150/55595c/fff" alt="Mountains" style="padding-top:30px;padding-left:5px;padding-right:5px;padding-bottom:30px;border-style: solid;border-color:rgba(135, 206, 250,0.8);border-radius:0.35rem;margin-top:90px;;width:120px;height:100px"></div>
                   <div class="slide"><img src="https://dummyimage.com/400x150/55595c/fff" alt="Snow" style="padding-top:30px;padding-left:5px;padding-right:5px;padding-bottom:30px;border-style: solid;border-color:rgba(135, 206, 250,0.8);border-radius:0.35rem;margin-top:90px;;width:120px;height:100px"></div>
                  
                  </div>

                  <?php } ?>
                  <?php if($nbsponsor == 2){?> 
                  <div class="column">
                    <?php foreach($listesponsor as $sponsor) { ?>
                    <div  class="slide"><a href="<?php echo site_url("Pays_Controller/singlesponsor")?>/<?php echo $sponsor['ID_SPONSOR'];?>"><img src="<?php echo base_url();?>/assets/image/<?php echo $sponsor['IMAGE_SPONSOR']?>" alt="Snow" style="padding-top:30px;padding-left:5px;padding-right:5px;padding-bottom:30px;border-style:solid;border-color:rgba(135, 206, 250,0.8);border-radius:0.35rem;margin-bottom:90px;width:120px;height:100px;"></a></div>
                    <?php } ?>
                   <div class="slide"><img src="https://dummyimage.com/400x150/55595c/fff" alt="Mountains" style="padding-top:30px;padding-left:5px;padding-right:5px;padding-bottom:30px;border-style: solid;border-color:rgba(135, 206, 250,0.8);border-radius:0.35rem;margin-top:90px;;width:120px;height:100px"></div>

                  </div>
                  <div class="column">
                   <div class="slide"><img src="https://dummyimage.com/400x150/55595c/fff" alt="Forest" style="padding-top:25px;padding-left:5px;padding-right:5px;padding-bottom:30px;border-style: solid;border-color:rgba(135, 206, 250,0.8);border-radius:0.35rem;margin-bottom:90px;width:auto;height:100px"></div>
                   <div  class="slide"><img src="https://dummyimage.com/400x150/55595c/fff" alt="Mountains" style="padding-top:30px;padding-left:5px;padding-right:5px;padding-bottom:30px;border-style: solid;border-color:rgba(135, 206, 250,0.8);border-radius:0.35rem;margin-top:90px;;width:120px;height:100px"></div>
                   <div class="slide"><img src="https://dummyimage.com/400x150/55595c/fff" alt="Snow" style="padding-top:30px;padding-left:5px;padding-right:5px;padding-bottom:30px;border-style: solid;border-color:rgba(135, 206, 250,0.8);border-radius:0.35rem;margin-top:90px;;width:120px;height:100px"></div>
                  
                  </div>

                  <?php } ?>
                  <?php if($nbsponsor == 3){?> 
                  <div class="column">
                    <?php foreach($listesponsor as $sponsor) { ?>
                    <div  class="slide"><a href="<?php echo site_url("Pays_Controller/singlesponsor")?>/<?php echo $sponsor['ID_SPONSOR'];?>"><img src="<?php echo base_url();?>/assets/image/<?php echo $sponsor['IMAGE_SPONSOR']?>" alt="Snow" style="padding-top:30px;padding-left:5px;padding-right:5px;padding-bottom:30px;border-style:solid;border-color:rgba(135, 206, 250,0.8);border-radius:0.35rem;margin-bottom:90px;width:120px;height:100px;"></a></div>
                    <?php } ?>

                  </div>
                  <div class="column">
                   <div class="slide"><img src="https://dummyimage.com/400x150/55595c/fff" alt="Forest" style="padding-top:25px;padding-left:5px;padding-right:5px;padding-bottom:30px;border-style: solid;border-color:rgba(135, 206, 250,0.8);border-radius:0.35rem;margin-bottom:90px;width:auto;height:100px"></div>
                   <div  class="slide"><img src="https://dummyimage.com/400x150/55595c/fff" alt="Mountains" style="padding-top:30px;padding-left:5px;padding-right:5px;padding-bottom:30px;border-style: solid;border-color:rgba(135, 206, 250,0.8);border-radius:0.35rem;margin-top:90px;;width:120px;height:100px"></div>
                   <div class="slide"><img src="https://dummyimage.com/400x150/55595c/fff" alt="Snow" style="padding-top:30px;padding-left:5px;padding-right:5px;padding-bottom:30px;border-style: solid;border-color:rgba(135, 206, 250,0.8);border-radius:0.35rem;margin-top:90px;;width:120px;height:100px"></div>
                  
                  </div>

                  <?php } ?>
                  <?php if($nbsponsor == 4){?> 
                  <div class="column">
                    <?php for($i = 0; $i<=2; $i++) { ?>
                    <div  class="slide"><a href="<?php echo site_url("Pays_Controller/singlesponsor")?>/<?php echo $sponsor[$i]['ID_SPONSOR'];?>"><img src="<?php echo base_url();?>/assets/image/<?php echo $listesponsor[$i]['IMAGE_SPONSOR']?>" alt="Snow" style="padding-top:30px;padding-left:5px;padding-right:5px;padding-bottom:30px;border-style:solid;border-color:rgba(135, 206, 250,0.8);border-radius:0.35rem;margin-bottom:90px;width:120px;height:100px;"></a></div>
                    <?php } ?>

                  </div>
                  <div class="column">
                   
                      <div  class="slide"><a href="<?php echo site_url("Pays_Controller/singlesponsor")?>/<?php echo $sponsor[3]['ID_SPONSOR'];?>"><img src="<?php echo base_url();?>/assets/image/<?php echo $listesponsor[3]['IMAGE_SPONSOR']?>" alt="Snow" style="padding-top:30px;padding-left:5px;padding-right:5px;padding-bottom:30px;border-style:solid;border-color:rgba(135, 206, 250,0.8);border-radius:0.35rem;margin-bottom:90px;width:120px;height:100px;"></a></div>
                  
                 
                   <div  class="slide"><img src="https://dummyimage.com/400x150/55595c/fff" alt="Mountains" style="padding-top:30px;padding-left:5px;padding-right:5px;padding-bottom:30px;border-style: solid;border-color:rgba(135, 206, 250,0.8);border-radius:0.35rem;margin-top:90px;;width:120px;height:100px"></div>
                   <div class="slide"><img src="https://dummyimage.com/400x150/55595c/fff" alt="Snow" style="padding-top:30px;padding-left:5px;padding-right:5px;padding-bottom:30px;border-style: solid;border-color:rgba(135, 206, 250,0.8);border-radius:0.35rem;margin-top:90px;;width:120px;height:100px"></div>
                  
                  </div>

                  <?php } ?>
                  <?php if($nbsponsor == 5){?> 
                  <div class="column">
                    <?php for($i = 0; $i<=2; $i++) { ?>
                    <div  class="slide"><a href="<?php echo site_url("Pays_Controller/singlesponsor")?>/<?php echo $sponsor[$i]['ID_SPONSOR'];?>"><img src="<?php echo base_url();?>/assets/image/<?php echo $listesponsor[$i]['IMAGE_SPONSOR']?>" alt="Snow" style="padding-top:30px;padding-left:5px;padding-right:5px;padding-bottom:30px;border-style:solid;border-color:rgba(135, 206, 250,0.8);border-radius:0.35rem;margin-bottom:90px;width:120px;height:100px;"></a></div>
                    <?php } ?>

                  </div>
                  <div class="column">
                  <div  class="slide"><a href="<?php echo site_url("Pays_Controller/singlesponsor")?>/<?php echo $sponsor[3]['ID_SPONSOR'];?>"><img src="<?php echo base_url();?>/assets/image/<?php echo $listesponsor[3]['IMAGE_SPONSOR']?>" alt="Snow" style="padding-top:30px;padding-left:5px;padding-right:5px;padding-bottom:30px;border-style:solid;border-color:rgba(135, 206, 250,0.8);border-radius:0.35rem;margin-bottom:90px;width:120px;height:100px;"></a></div>
                  <div  class="slide"><a href="<?php echo site_url("Pays_Controller/singlesponsor")?>/<?php echo $sponsor[4]['ID_SPONSOR'];?>"><img src="<?php echo base_url();?>/assets/image/<?php echo $listesponsor[4]['IMAGE_SPONSOR']?>" alt="Snow" style="padding-top:30px;padding-left:5px;padding-right:5px;padding-bottom:30px;border-style:solid;border-color:rgba(135, 206, 250,0.8);border-radius:0.35rem;margin-bottom:90px;width:120px;height:100px;"></a></div>
                
                     
                  
                  
                   <div class="slide"><img src="https://dummyimage.com/400x150/55595c/fff" alt="Snow" style="padding-top:30px;padding-left:5px;padding-right:5px;padding-bottom:30px;border-style: solid;border-color:rgba(135, 206, 250,0.8);border-radius:0.35rem;margin-top:90px;;width:120px;height:100px"></div>
                  
                  </div>

                  <?php } ?>
                  <?php if($nbsponsor == 6){?> 
                  <div class="column">
                    <?php for($i = 0; $i<=2; $i++) { ?>
                    <div  class="slide"><a href="<?php echo site_url("Pays_Controller/singlesponsor")?>/<?php echo $sponsor[$i]['ID_SPONSOR'];?>"><img src="<?php echo base_url();?>/assets/image/<?php echo $listesponsor[$i]['IMAGE_SPONSOR']?>" alt="Snow" style="padding-top:30px;padding-left:5px;padding-right:5px;padding-bottom:30px;border-style:solid;border-color:rgba(135, 206, 250,0.8);border-radius:0.35rem;margin-bottom:90px;width:120px;height:100px;"></a></div>
                    <?php } ?>

                  </div>
                  <div class="column">
                  <div  class="slide"><a href="<?php echo site_url("Pays_Controller/singlesponsor")?>/<?php echo $sponsor[3]['ID_SPONSOR'];?>"><img src="<?php echo base_url();?>/assets/image/<?php echo $listesponsor[3]['IMAGE_SPONSOR']?>" alt="Snow" style="padding-top:30px;padding-left:5px;padding-right:5px;padding-bottom:30px;border-style:solid;border-color:rgba(135, 206, 250,0.8);border-radius:0.35rem;margin-bottom:90px;width:120px;height:100px;"></a></div>
                  <div  class="slide"><a href="<?php echo site_url("Pays_Controller/singlesponsor")?>/<?php echo $sponsor[4]['ID_SPONSOR'];?>"><img src="<?php echo base_url();?>/assets/image/<?php echo $listesponsor[4]['IMAGE_SPONSOR']?>" alt="Snow" style="padding-top:30px;padding-left:5px;padding-right:5px;padding-bottom:30px;border-style:solid;border-color:rgba(135, 206, 250,0.8);border-radius:0.35rem;margin-bottom:90px;width:120px;height:100px;"></a></div>
                  <div  class="slide"><a href="<?php echo site_url("Pays_Controller/singlesponsor")?>/<?php echo $sponsor[5]['ID_SPONSOR'];?>"><img src="<?php echo base_url();?>/assets/image/<?php echo $listesponsor[5]['IMAGE_SPONSOR']?>" alt="Snow" style="padding-top:30px;padding-left:5px;padding-right:5px;padding-bottom:30px;border-style:solid;border-color:rgba(135, 206, 250,0.8);border-radius:0.35rem;margin-bottom:90px;width:120px;height:100px;"></a></div>

                  
                  
                  </div>

                  <?php } ?>
                 
                  
                          </div>
                          </div>
    </div>
                </div>
                </div>
    <div class="mobile-only">
    <div class="view mx-auto d-block" style="margin-bottom: 5%;">
      <img class="img-carte"  src="<?php echo base_url("assets/image/carte_afrique.png");?>" alt="carte afrique" >
   
        <div  class="layer bg-custom-pays" >
          <div class="contenu-pays">
            <h5 class="choixpays">Choisissez votre pays</h5>
                <?php foreach($liste as $pays) { ?>
                  <a href="<?php echo site_url('Rubrique_Controller/listerubriques');?>/<?php echo $pays->ID_PAYS;?>"><img class="img-drapeau"  src="<?php echo base_url()?>/assets/image/<?php echo $pays->IMAGE_DRAPEAU;?>"></a>
                  <?php echo $links;?>
                  <a class="pays" href="<?php echo site_url('Rubrique_Controller/listerubriques');?>/<?php echo $pays->ID_PAYS;?>">
                    <p id="position-pays"><?php echo $pays->NOM_PAYS?></p>
                  </a>
                <?php } ?>
            </div>
          </div>
        </div>
     
    </div>
   
      <!-- fin main body -->

      <!-- partenaires à remplacer par grille de la page d'accueil  -->
    
        <?php $this->load->view("include/sponsor.php");?>
   
       <!-- fin partenaires -->

    <!-- partenaires -->
    <div style="margin-top:2em">
      <?php $this->load->view('include/partenaire');?>
      </div>
      <!-- fin partenaires -->

      <footer style="margin-top:10%;">
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
 
  </body>
</html>