<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>GDC - Paragraphes</title>

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
          <h1 class="h3 mb-4 text-gray-800">Historique</h1>
      
         
          <div class="card mb-4 py-3 border-left-primary">
          

              <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            
                            <th>Date</th>
                            <th>Utilisateur</th>
                            <th>Action</th>
                            <th>Page</th>
                          </tr>
                        </thead>
              
                        <tbody>
                  
                          <tr>
                          
                            
                        
                        
                            <td>15/11/2019</td>
                            <td>diamondratovondrainy@gmail.com</td>
                            <td>Modification</td>
                            <td>Choix pays</td>
                          
                          </tr>

                          <tr>
                          
                            
                        
                        
                            <td>13/11/2019</td>
                            <td>lailahsoalehy@gmail.com</td>
                            <td>Insertion</td>
                            <td>Guide </td>
                          
                          </tr>
                        
                        
                        </tbody>
                      </table>
                     
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

</body>

</html>
