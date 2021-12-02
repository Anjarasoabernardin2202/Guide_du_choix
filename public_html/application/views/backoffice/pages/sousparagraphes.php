<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>GDC - Sous Paragraphes</title>

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

      <?php $this->load->view("backoffice/include/header.php");?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Gestion des sous-paragraphes</h1>
          <p><i class="fa fa-warning"></i>Important:à noter qu'un sous-paragraphe peut etre soit une section ou une liste d'étape ou un tableau. Avant d'insérer les données, veillez a bien lire les instructions (cliquez sur <i class="fa fa-question-circle"></i> pour chaque sous paragraphe) et les appliquer s'il vous plait.</p>
         

          <div class="card mb-4 py-3 border-left-primary">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <div class="p-5">
                    <div class="text-center">
                      <h5 class="text-gray-900 mb-4">Nouveau sous-paragraphe?</h5>
                      <p>Cliquez <a style="color:blue" href="<?php echo site_url("Contenu_controller/article_bo");?>">ici</a> pour faire la gestion des sections  <a style="color: #4e73df" href="javasript:void()" data-toggle="modal" data-target="#instruction1"><i class="fa fa-question-circle"></i></a></p>
                      <p>Cliquez <a style="color:blue" href="<?php echo site_url("Contenu_controller/etape_bo");?>">ici</a> pour faire la gestion des étapes  <a style="color: #4e73df" href="javasript:void()" data-toggle="modal" data-target="#instruction2"><i class="fa fa-question-circle"></i></a></p>
                      <p>Cliquez <a style="color:blue" href="<?php echo site_url("Contenu_controller/tableau_bo");?>">ici</a> pour faire la gestion des tableaux  <a style="color: #4e73df" href="javasript:void()" data-toggle="modal" data-target="#instruction3"><i class="fa fa-question-circle"></i></a></p>

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

</body>

</html>
