<div class="col-12 parrains mobile-only" class="position-parrain" style="margin-bottom:1%; margin-top: 1%; margin-left:10%">
    <h3 class="titre-parrains">Avec les soutiens précieux de :</h3>
        <div id="multi-item-example" data-ride="carousel" class="slide"  style="height:70px;">
            <div class="img-carousel-parrains"  role="listbox" >
                    <div class="row parrains-animation" style="margin-left:10%; margin-right: 0.1px;background-color: white">
			<div class="slide"
                    <?php foreach($parrains as $parrain) { ?>
                            <div class="col-4 card taille-section2" style="border-radius:0.35rem;border-style:solid;border-width: 2px;border-color: rgba(135, 206, 250,0.3);">
                              <a href="<?php echo site_url('Parrain_Controller/parrains');?>">  
                                <img class="img-fluid" src="<?php echo base_url();?>/assets/image/<?php echo $parrain->IMAGE_PARTENAIRE;?>" />
                              </a>
                                <p style="color: rgba(78,80,81); font-weight: bold;text-align: center;" class="txt-parrain"><?php echo $parrain->INTRODUCTION_PARTENAIRE;?></p>
                                
                            </div>
                    <?php } ?>
			</div>
                           
                    </div>
            </div>
        </div>
</div>

        <section class="web-only" >
          <div class="container" style="text-align:center; margin-left: 10%">
            <div class="row">
            <div class="col-lg-12">
              <h3 style="color: #0f0f0f;">Avec les soutiens précieux de :</h3>
              <!-- <a style="color:#467fbf;font-size:20px;font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;text-decoration: none;" href="<?php echo site_url('Parrain_Controller/parrains');?>"> Voir tous nos parrains <i class="fa fa-chevron-right"></i></a> -->
            </div>
            
            </div>
            <br>
            <div class="row parrains-animation" style="margin-left:15%;">
		<div class="slide"
            <?php foreach($parrains as $parrain) { ?> 
            <div class="col-4">
              <div class="card taille-section2 slide" style="background-color:rgba(135, 206, 250,0.3);">
                <div class="card-anatiny ">
                    <img class="img-parrain2 " src="<?php echo base_url();?>/assets/image/<?php echo $parrain->IMAGE_PARTENAIRE;?>">
                    <p class="mot-parrain "><?php echo $parrain->INTRODUCTION_PARTENAIRE;?></p>
                </div>
              </div>
            </div>
            <?php } ?>
		</div>
          </div>
        </div>
	</div>
	</div>
        </section>

<hr>
