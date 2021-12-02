<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>GDC - Miniguide</title>

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
          <h1 class="h3 mb-4 text-gray-800">Gestion des mini-guides</h1>
          <div class="card mb-4 py-3 border-left-primary">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">Modifier guide?</h1>
                    </div>
                    <?php foreach($single as $guide) { ?>
                    <form class="user" method="post" action="<?php echo site_url("Magazine_Controller/update");?>/<?php echo $guide->ID_MINIGUIDE;?>" enctype="multipart/form-data">
                    <div class="form-inline" style="margin-bottom:1rem">
                    <div class="col-12">
                    <p class="text-gray-900 mb-4">Image:</p>
                    </div>
                      <div class="col-6">
                          <img style="width:90px;height:auto" src="<?php echo base_url();?>/assets/image/<?php echo $guide->BANDE_MINIGUIDE;?>">
                      </div>
                      <div class="col-6">
                      <div class="form-group js">
                        <input type="hidden" name="img" value="<?php echo $guide->BANDE_MINIGUIDE;?>">
                         <input type="file" name="image" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
                                <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choisir une nouvelle image&hellip;</span></label>
                      </div>
                      </div>
                      </div>
                      <div class="form-group">
                      <div class="col-md-10">
                              <select name="guide" class="form-control">
                              <option value="">Pas de guide</option>
                              <option value="<?php echo $guide->ID_MINIGUIDE2;?>"><?php echo $guide->ID_MINIGUIDE2;?></option>
                              <?php foreach($liste as $guide2) { ?>
                                <option value="<?php echo $guide2->ID_MINIGUIDE2;?>"><?php echo $guide2->ID_MINIGUIDE2;?></option>
                              <?php } ?>
                              </select>
                          </div>
                    </div>
                      <div class="form-group">
                    <p class="text-gray-900 mb-4">Nom:</p>

                        <input type="text" name="nomguide" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $guide->NOM_MINIGUIDE;?>">
                      </div>
                      <div class="form-group">
                    <p class="text-gray-900 mb-4">Titre:</p>
                    <textarea type="text" name="titreguide" id="titreguide" class="form-control form-control-user"  aria-describedby="emailHelp"  rows="10"><?php echo $guide->TITRE_MINIGUIDE;?></textarea>

                        <!-- <input type="text" name="titreguide" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $guide->TITRE_MINIGUIDE;?>"> -->
                      </div>
                      <div class="form-group">
                    <p class="text-gray-900 mb-4">Texte:</p>
                    <textarea type="text" name="texteguide" id="texteguide" class="form-control form-control-user"  aria-describedby="emailHelp"  rows="10"><?php echo $guide->TEXTE_MINIGUIDE;?></textarea>

                        <!-- <input type="text" name="titreguide" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $guide->TITRE_MINIGUIDE;?>"> -->
                      </div>
                      <div class="form-group">
                    <p class="text-gray-900 mb-4">Contenu:</p>

                        <textarea type="text" name="contenu" id="introduction" class="form-control form-control-user"  aria-describedby="emailHelp"  rows="10"><?php echo $guide->CONTENU_MINIGUIDE;?></textarea>
                      </div>
                      <div class="form-group">
                    <p class="text-gray-900 mb-4">Smartphone:</p>

                        <textarea type="text" name="smartphone" id="introductionsmart" class="form-control form-control-user"  aria-describedby="emailHelp"  rows="10"><?php echo $guide->SMARTPHONE_MINIGUIDE;?></textarea>
                      </div>
                    <?php } ?>
                      <button type="submit" class="btn btn-primary btn-user btn-block">
                        Modifier
                      </button>
                      <a href="<?php echo site_url("Magazine_Controller/magazine_bo");?>" class="btn btn-default btn-user btn-block">
                        Annuler
                    </a>
                      
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

  <?php include("assets2/include/footer2.php");?>
  <script>
  CKEDITOR.replace('introduction');
  CKEDITOR.replace('introductionsmart');
  CKEDITOR.replace('titreguide');
  CKEDITOR.replace('texteguide');
</script>

</body>

</html>
