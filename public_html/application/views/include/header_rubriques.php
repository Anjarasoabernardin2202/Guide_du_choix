<style>
    .topnav a{
        margin-left:3%;
    }
    .dropdown-menu a{
        font-size:15px;
        margin-left:0%;
    }
    @media screen and (min-width: 601px) and (max-width:1024px){
        .topnav a{
            margin-left:-0.5%; 
        }
        .dropdown-menu a{
            font-size:13px;
        }
        .a .dropdown-toggle{
            margin-left:0%;
            margin-top:-10%;
        }
    }
    @media screen and(max-width:600px){
        .dropdown-menu a{
            font-size:12px;
        }
       
    }
</style>
<div class="topnav">
       

<div class="web-only">
        <img src="<?php echo base_url("assets/image/gdc24_logo_web.png");?>">
        </div>
        <div class="mobile-only">
        <img src="<?php echo base_url("assets/image/gdc24_logo.png");?>">

        </div> 
        
        <a href="<?php echo site_url('Accueil_Controller/');?>">Accueil</a>
       
            <a data-toggle="dropdown" class="dropdown-toggle"  href="#" id="navbarDrop" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Nos services
</a>
            <div class="dropdown-menu" aria-labelledby="navbarDrop">
            <a class="dropdown-item" href="<?php echo site_url('Rubrique_Controller/detail');?>/1">LeConseiller Entreprise</a>
            <a class="dropdown-item" href="<?php echo site_url('Citemetiers_Controller/liste')?>">Cité des metiers</a>
            <a class="dropdown-item" href="<?php echo site_url('Rubrique_Controller/detail');?>/2">Guide TPE</a>
            </div>

        <a href="<?php echo site_url('Apropos_Controller/about');?>/1">A propos</a>
        
        <a href="<?php echo site_url('Parrain_Controller/nationaux');?>">Parrains</a>
        <a href="<?php echo site_url('Accueil_Controller/equipe/2');?>">L'équipe</a>
        <div class="web-only">
        <a href="<?php echo site_url('Accueil_Controller/contact');?>">Recrutement</a>
        </div>
        <!-- <a href="<?php echo site_url('Accueil_Controller/inscription');?>">S'inscrire</a> -->

        
  

        <!-- <a class="web-only" href="">Contact</a> -->
          <a href="javascript:void(0);" class="icon" id="myTopnav" >
          <b class="menu-bar">Plan du Site</b>
          <i class="fa fa-angle-down"></i>
          </a> 
          <!-- <b id="contact" class="mobile-only contact"><i class="fa fa-phone"></i> Contact</b> -->
         
         
</div>