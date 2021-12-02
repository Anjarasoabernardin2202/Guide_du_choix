<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>GDC - Actualité</title>

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
          <h1 class="h3 mb-4 text-gray-800">Gestion des actualités</h1>
          <div class="card mb-4 py-3 border-left-primary">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">Modifier actualité?</h1>
                    </div>
                    <?php foreach($single as $actu) { ?>
                    <form class="user" method="post" action="<?php echo site_url("Actualite_Controller/updateActualite")?>/<?php echo $actu->ID_PUB;?>">
                     
                      <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="nomactualite" aria-describedby="emailHelp" value="<?php echo $actu->TITRE_PUB;?>">
                      </div>
                     
                      <div class="form-group">
                        <input type="text" class="form-control form-control-user" name="information" aria-describedby="emailHelp" value="<?php echo $actu->DESCRIPTION_PUB;?>">
                      </div>
                
                      <button type="submit" class="btn btn-primary btn-user btn-block">
                        Modifier
                      </button>
                      <a href="<?php echo site_url("Actualite_Controller/actualite_bo");?>" class="btn btn-default btn-user btn-block">
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

</body>

</html>
