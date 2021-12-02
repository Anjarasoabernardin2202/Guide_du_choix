<!DOCTYPE html>
<html lang="fr">
  <head>
      <meta charset="utf-8"> 
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>GDC - Liste des parrains</title>
      <?php include("assets/include/head.php");?>
    
  </head>
    
  
  <body>
  <?php
  $this->load->view("include/visitor_counter.php");
  ?>
    <!-- navbar tout en haut en bleu -->
    <?php $this->load->view("include/navbar1.php");?>
     
    <!-- fin navbar tout en haut en bleu -->

    <!-- navbar principal -->
    
    <?php $this->load->view("include/header_rubriques.php");?>
     
    
    <!-- fin navbar principal -->
 
    

    <!-- arborescence du site -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb py-0 bleuu">
        <li class="breadcrumb-item"><a class="arborescence " href="<?php echo site_url('Accueil_Controller/');?>">Accueil</a></li>
        <?php foreach($singlepays as $pays) { ?>
            <li class="breadcrumb-item" style="margin-left:-3px"><a  class="arborescence" style="margin-left:-5px" href="<?php echo site_url('Pays_Controller/pays');?>">Pays</a></li>
            <li class="breadcrumb-item" style="margin-left:-3px"><a  class="arborescence" style="margin-left:-5px" href="<?php echo site_url('Rubrique_Controller/listerubriques');?>/<?php echo $pays->ID_PAYS;?>"><?php echo $pays->NOM_PAYS;?></a></li>
          <?php } ?>
        <li class="breadcrumb-item"><a class="arborescence " href="#">Parrains </a></li>
      </ol>
    </nav>
    <!-- arborescence du site -->
    <div class="wrapper-rubriques" style="margin-top:5%">
    <div class="liste-parrains">
    <!-- <?php foreach($liste as $parrains) { ?>
                <div class="card" style="margin-bottom:2%;height:200px">
                <div class="container">
                  <div class="row">
               
                      <div class="col-4">
                      <img class="img-parrain"  src="<?php echo base_url();?>/assets/image/<?php echo $parrains->IMAGE_PARTENAIRE;?>">

                      </div>
                      <div class="col-8">
                        <h3 class="titre-parrain"><?php echo $parrains->NOM_PARTENAIRE?></h3>
                        <p class="text-parrain"><?php echo $parrains->INTRODUCTION_PARTENAIRE;?></p>
                      </div>
                    </div>
                
                </div>
                  
            </div>
            <?php } ?> -->
    </div>
</div>

   <!--  <iframe  width="600" height="800" align="middle"></iframe>
   <embed src="<?php echo base_url("assets/image/newsletter.pdf");?>" width=800 height=500  type='application/pdf'/> -->
   <!-- <embed src="<?php echo base_url("assets/image/newsletter.pdf");?>" width="80%" height="800px" align="middle"> -->
    <div
       class="canva-embed"
       data-design-id="DADnag4QuzQ"
       data-height-ratio="1.4143"
       style="padding:141.4286% 5px 5px 5px;background:rgba(0,0,0,0.03);border-radius:8px;margin-bottom: 50px;margin-left: 10%;width: 80%;text-align: center;"
      ></div>
      <script async src="https:&#x2F;&#x2F;sdk.canva.com&#x2F;v1&#x2F;embed.js"></script>
      <!-- <a href="https:&#x2F;&#x2F;www.canva.com&#x2F;design&#x2F;DADnag4QuzQ&#x2F;view?utm_content=DADnag4QuzQ&amp;utm_campaign=designshare&amp;utm_medium=embeds&amp;utm_source=link" target="_blank" rel="noopener">Pink and Light Blue Bordered Email Newsletter </a> par <a href="https:&#x2F;&#x2F;www.canva.com&#x2F;alain_francoiss?utm_campaign=designshare&amp;utm_medium=embeds&amp;utm_source=link" target="_blank" rel="noopener">Samy</a> -->

 
      <footer>
        <?php include("assets/include/footer.php");?>
      </footer>
  </body>
</html>