<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>GDC - Pays</title>

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
          <h1 class="h3 mb-4 text-gray-800">Page profile</h1>
          <div class="card mb-4 py-3 border-left-primary">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <div class="p-5">
                    <div class="text-left">
                      <p class="mb-4" style="color:blue">Nom complet: <span class="text-gray-900 mb-4"><?php echo $admin['NOM_ADMIN'];?></span> </p>
                      <p class="mb-4" style="color:blue">Email: <span class="text-gray-900 mb-4"><?php echo $admin['MAIL_ADMIN'];?></span></p>
                      <p class="mb-4" style="color:blue">Age: <span class="text-gray-900 mb-4"><?php echo $admin['AGE_ADMIN'];?></span></p>
                      <p class="mb-4" style="color:blue">Poste: <span class="text-gray-900 mb-4"><?php echo $admin['POSTE_ADMIN'];?></span></p>                    
                    </div>
                    <div class="text-center">
                      <p class="h4 text-gray-900 mb-4">Modifier profil?</p>                  
                    </div>
                    <form class="user" method="post" action="<?php echo site_url('Login_Controller/updateprofil');?>/<?php echo $admin['ID_ADMIN'];?>">
                      <div class="form-group">
                          <input type="text" name="nom" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="<?php echo $admin['NOM_ADMIN'];?>">
                      </div>
                      <div class="form-group">
                        <input type="text"  name="age" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="<?php echo $admin['AGE_ADMIN'];?>">
                      </div>
                      <div class="form-group">
                            <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="<?php echo $admin['MAIL_ADMIN'];?>">
                      </div>
                     
                      <div class="form-group">
                        <input type="password"  name="mdp1" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Mot de passe">
                      </div>
                      <div class="form-group">
                        <input type="password" name="mdp2" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Retapez mot de passe">
                      </div>
                    <?php if(isset($erreur)) { ?>
                    <p><?php echo $erreur; ?></p>
                    <?php } ?>
                      <button type="submit" class="btn btn-primary btn-user btn-block">
                        Modifier
                      </button>
                      
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
