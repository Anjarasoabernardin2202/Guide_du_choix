 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
  <!-- <div class="sidebar-brand-icon rotate-n-15">
   
    <i class="fas fa-laugh-wink"></i>
  </div> -->
  <img src="<?php echo base_url("assets/image/gdc24_logo.png");?>">
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">


<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Page web
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-table"></i>
    <span>Contenus</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
    <h6 class="collapse-header">Guides pratiques:</h6>
      <a class="collapse-item" href="<?php echo site_url("Pays_Controller/pays_bo");?>">Pays</a>
      <a class="collapse-item" href="<?php echo site_url("Rubrique_Controller/rubrique_bo");?>">Rubriques</a>
      <a class="collapse-item" href="<?php echo site_url("Guide_Controller/guide_bo");?>">Guides</a>
      <a class="collapse-item" href="<?php echo site_url("Expert_Controller/expert_bo");?>">Experts</a>
      <h6 class="collapse-header">Contenu guides:</h6>
      <a class="collapse-item" href="<?php echo site_url("Chapitre_Controller/chapitre_bo");?>">Chapitres</a>
      <a class="collapse-item" href="<?php echo site_url("Chapitre_Controller/schapitre_bo");?>">Sous Chapitres</a>
      <a class="collapse-item" href="<?php echo site_url("Chapitre_Controller/paragraphe_bo");?>">Paragraphes</a>
      <a class="collapse-item" href="<?php echo site_url("Contenu_Controller/article_bo");?>">Sous Paragraphes</a>

    </div>
  </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitie" aria-expanded="true" aria-controls="collapseUtilities">
    <i class="fas fa-fw fa-cog"></i>
    <span>Pages du site</span>
  </a>
  <div id="collapseUtilitie" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="<?php echo site_url("Equipe_Controller/equipe_bo");?>">Equipe</a>
      <div class="collapse-divider"></div>
      
      
    </div>
  </div>
</li>
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
    <i class="fas fa-fw fa-wrench"></i>
    <span>Elements du site</span>
  </a>
  <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="<?php echo site_url("Actualite_Controller/sponsor_bo");?>">Sponsor</a>
      <a class="collapse-item" href="<?php echo site_url("Parrain_Controller/parrain_bo");?>">Parrains internationaux</a>
      <a class="collapse-item" href="<?php echo site_url("Parrain_Controller/partenaire_bo");?>">Partenaires par pays</a>

    </div>
  </div>
</li>
<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilitiez" aria-expanded="true" aria-controls="collapseUtilities">
    <i class="fas fa-fw fa-cog"></i>
    <span>Magazine</span>
  </a>
  <div id="collapseUtilitiez" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="<?php echo site_url("Magazine_Controller/magazine_bo");?>">Mini-Guides</a>
      <div class="collapse-divider"></div>
      
      
    </div>
  </div>
</li>








<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>