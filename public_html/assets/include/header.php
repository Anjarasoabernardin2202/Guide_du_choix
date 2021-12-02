<div class="topnav" >
        <div class="web-only">
        <img onclick="redirect(event)" src="<?php echo base_url("assets/image/gdc24_logo_web.png");?>">

        <script>
          var redirect = function(event){
            window.open('<?php echo site_url('Accueil_Controller/');?>','_SELF');
          }
        </script>

        </div>
        <div class="mobile-only">
        <img src="<?php echo base_url("assets/image/gdc24_logo.png");?>">

        </div>
        <a  href="<?php echo site_url('Accueil_Controller/');?>">Accueil</a>
        <a  href="<?php echo site_url('Apropos_Controller/about');?>/1">A propos</a>
        
        <a  href="<?php echo site_url('Parrain_Controller/parrains');?>">Parrains</a>
        <a  href="<?php echo site_url('Accueil_Controller/equipe/1');?>">L'équipe</a>
        

        <div class="web-only">
             
        </div>
        <a href="<?php  echo site_url('Accueil_Controller/inscription');?>">Recrutement</a>
        


        <!-- <a class="web-only" href="">Contact</a>  -->
        <a href="javascript:void(0);" class="icon" id="myTopnav" >
          <b class="menu-bar">Menu  </b>
          <i class="fa fa-bars"></i>
        </a>
    

         
</div>