<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>GDC - Experts</title>

  <?php include("assets2/include/head.php");?>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

  <?php include("assets2/include/menu.php");?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
      <?php $this->load->view("backoffice/include/header");?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Gestion des experts</h1>
          <div class="card mb-4 py-3 border-left-primary">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">Modifier expert?</h1>
                    </div>
                    <?php foreach($single as $expert) { ?>
                    <form class="user" method="post" action="<?php echo site_url("Expert_Controller/update")?>/<?php echo $expert->ID_EXPERT;?>" enctype="multipart/form-data">
                      <div class="form-group">
                      <div class="form-inline" style="margin-bottom:1rem">
                    <div class="col-12">
                    <p class="text-gray-900 mb-4">Image de l'expert:</p>
                    </div>
                      <div class="col-6">
                          <img style="width:90px;height:auto" src="<?php echo base_url();?>/assets/image/<?php echo $expert->IMAGE_EXPERT;?>">
                      </div>
                      <div class="col-6">
                      <div class="form-group js">
                        <input type="hidden" name="expert" value="<?php echo $expert->IMAGE_EXPERT;?>">
                      <input type="file" name="image[]" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
				                	<label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choisir un autre expert&hellip;</span></label>
                      </div>
                      </div>
                      </div>
                      <div class="form-inline" style="margin-bottom:1rem">
                      <div class="col-12">
                    <p class="text-gray-900 mb-4">Logo de l'entreprise:</p>
                    </div>
                    <div class="col-6">
                        <img style="height:90px;width:auto" src="<?php echo base_url();?>/assets/image/<?php echo $expert->LOGO_EXPERT;?>">
                    </div>
                    <div class="col-6">
                    <div class="form-group js">
                        <input type="hidden" name="logo" value="<?php echo $expert->LOGO_EXPERT;?>">
                         <input type="file" name="image[]" id="file-2" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
				                	<label for="file-2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choisir un autre logo&hellip;</span></label>
                    </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <p class="text-gray-900 mb-4">Logo de l'entreprise:</p>

                      <div class="col-md-10">
                              <select name="nomguide" class="form-control">
                              <option value="<?php echo $nomguide;?>"><?php echo $nomguide;?></option>
                              <?php foreach($listeguidenom as $guide) { ?>
                                <option value="<?php echo $guide->NOM_GUIDE;?>"><?php echo $guide->NOM_GUIDE;?></option>
                              <?php } ?>
                              </select>
                          </div>
                    </div>
                    <div class="col-md-10">
                              <select name="nompays" class="form-control">
                              <option value="<?php echo $pays;?>"><?php echo $pays;?></option>
                              <?php foreach($listepaysnom as $pays) { ?>
                                <option value="<?php echo $pays->NOM_PAYS;?>"><?php echo $pays->NOM_PAYS;?></option>
                              <?php } ?>
                              </select>
                          </div>
                    </div>
                      <div class="form-group">
                    <p class="text-gray-900 mb-4">Nom de l'entreprise experte:</p>

                        <input type="text" class="form-control form-control-user" name="nomexpert" aria-describedby="emailHelp" value="<?php echo $expert->NOM_EXPERT;?>">
                      </div>
                      <div class="form-group">
                    <p class="text-gray-900 mb-4">Lien de l'expert:</p>

                        <input type="text" class="form-control form-control-user" name="lien" aria-describedby="emailHelp" value="<?php echo $expert->LIEN_EXPERT;?>">
                      </div>
                      <div class="form-group">
                    <p class="text-gray-900 mb-4">Slogan de l'entreprise:</p>

                        <input type="text" class="form-control form-control-user" name="slogan" aria-describedby="emailHelp" value="<?php echo $expert->SLOGAN;?>">
                      </div>
                      <div class="form-group">
                    <p class="text-gray-900 mb-4">Email expert:</p>

                        <input type="email" class="form-control form-control-user" name="mail" aria-describedby="emailHelp" value="<?php echo $expert->MAIL_EXPERT;?>">
                      </div>
                      <div class="form-group">
                    <p class="text-gray-900 mb-4">Informations:</p>
                    <textarea type="text" name="information" id="information" class="form-control form-control-user"  aria-describedby="emailHelp"  rows="10"><?php echo $expert->INFORMATION_EXPERT;?></textarea>

                      </div>
                      <div class="form-group">
                    <p class="text-gray-900 mb-4">Coordonnées:</p>

                    
                    <textarea type="text" name="coordonnees" id="coordonnees" class="form-control form-control-user"  aria-describedby="emailHelp"  rows="10"><?php echo $expert->COORDONNEES;?></textarea>

                      </div>
                      <div class="form-group">
                    <p class="text-gray-900 mb-4">Devis:</p>
                    <textarea type="text" name="devis" id="devis" class="form-control form-control-user"  aria-describedby="emailHelp"  rows="10"><?php echo $expert->DEVIS;?></textarea>

                      </div>
                
                      <button type="submit" class="btn btn-primary btn-user btn-block">
                        Modifier
                      </button>
                      <a href="<?php echo site_url("Expert_Controller/expert_bo");?>" class="btn btn-default btn-user btn-block">
                        Annuler
                    </a>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>

     
              </div>
            </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include("assets2/include/footer.php");?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <?php include("assets2/include/footer2.php");?>
  <script>
  CKEDITOR.replace('devis');
  CKEDITOR.replace('information');
  CKEDITOR.replace('coordonnees');
</script>
</body>

</html>
