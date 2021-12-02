<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>GDC - Administrateur</title>

  <?php include("assets2/include/head.php");?>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

  <?php include("assets2/include/menu2.php");?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
      <?php $this->load->view("backoffice/include/header");?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Gestion des admins</h1>
 
          <a data-toggle="collapse" data-target="#reponse" id="question"><button class="btn btn-primary">Cliquez ici pour insérer un admin <i class="fa fa-chevron-down"></i></button></a>
         
          <div id="reponse" class="collapse" data-parent="#question" class="card mb-4 py-3 border-left-primary">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">Nouvel administrateur?</h1>
                    </div>
                      <br>
              
     
                    <form class="user" method="post" action="<?php echo site_url("Login_Controller/inscription");?>" enctype="multipart/form-data">
                    <div class="form-inline" style="margin-bottom:1rem">
                    
                
            
                      <div class="form-group">
                      <p style="margin-left:2%" class="text-gray-900 ">Nom*  :</p>
                        <input type="text" name="nom" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Nom">
                   
                      </div>
                     
                      <div class="form-group">
                      <p style="margin-left:2%" class="text-gray-900 ">Age* :</p>
                        <input type="text" name="age" id="description" class="form-control form-control-user"  aria-describedby="emailHelp"  placeholder="Nom">

                
                      </div>
                      <div class="form-group">
                      <p style="margin-left:2%" class="text-gray-900 ">Poste* :</p>
                        <input type="text" name="poste" id="descriptionsmart" class="form-control form-control-user"  aria-describedby="emailHelp"  placeholder="Nom">
                      </div>
                      <div class="form-group">
                      <p style="margin-left:2%" class="text-gray-900 ">Email* :</p>
                        <input type="text" name="email" id="descriptionsmart" class="form-control form-control-user"  aria-describedby="emailHelp"  placeholder="Nom">
                      </div>
                      <div class="form-group">
                      <p style="margin-left:2%" class="text-gray-900 ">Mot de passe* :</p>
                        <input type="text" name="mdp" id="descriptionsmart" class="form-control form-control-user"  aria-describedby="emailHelp"  placeholder="Nom">
                      </div>
     
                      <p>NB: * Champ obligatoire</p>
                      <button type="submit" class="btn btn-primary btn-user btn-block">
                        Insérer
                        </button>
                        </form>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="card mb-4 py-3 border-left-primary">
   
                                        
              <div class="card-body">
                  <div class="table-responsive">
                      <table id="dtBasicExample" class="table table-bordered dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Age</th>
                            <th>Poste</th>
                            <th>Email</th>
                         
                          </tr>
                        </thead>
              
                        <tbody>
                          <?php foreach($liste as $admin) { ?>
                          <tr>
                            <td><?php echo $admin->ID_ADMIN;?></td>
                            <td><?php echo $admin->NOM_ADMIN;?></td>
                            <td><?php echo $admin->AGE_ADMIN;?></td>
                            <td><?php echo $admin->POSTE_ADMIN;?></td>
                            <td><?php echo $admin->MAIL_ADMIN;?></td>
                     
                  
                          </tr>
                          <?php } ?>
                          
                        
                        </tbody>
                      </table>
                      <?php echo $links;?>
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
