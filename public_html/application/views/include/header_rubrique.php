<style>
    .topnav a{
        margin-left:7%;
    }
    .dropdown-menu a{
        font-size:15px;
        margin-left:0%;
    }
    @media screen and (min-width: 601px) and (max-width:1024px){
        .topnav a{
            margin-left:0%; 
        }
        .dropdown-menu a{
            font-size:13px;
        }
    }
    @media screen and(max-width:600px){
        .dropdown-menu a{
            font-size:12px;
        }
    }
</style>
<div class="topnav" id="myTopnav">
<div class="web-only">
        <img src="<?php echo base_url("assets/image/gdc24_logo_web.png");?>">
        </div>
        <div class="mobile-only">
        <img src="<?php echo base_url("assets/image/gdc24_logo.png");?>">

        </div>
        <a href="<?php echo site_url('Accueil_Controller/');?>">Accueil</a>
        <a class="dropdown">
            <a class="dropdown-toggle" href="#" id="navbarDrop" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Nos services
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDrop">
            <?php foreach($liste as $guides) { ?>
                <a  class="dropdown-item" href="<?php echo site_url('Guide_Controller/guide');?>/<?php echo $guides->ID_GUIDE;?>/1/1"><?php echo $guides->NOM_GUIDE;?> </a>
            <?php } ?>  
            </div>
        </a>
        <a href="<?php echo site_url('Parrain_Controller/parrains');?>">Parrains internationaux</a>
        <a href="<?php echo site_url('Accueil_Controller/equipe');?>">L'équipe</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
          <b class="menu-bar">Menu </b>
          <i class="fa fa-bars"></i>
        </a>
</div>