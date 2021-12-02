<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>GDC - Entreprise</title>

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
          <h1 class="h3 mb-4 text-gray-800">Gestion des entreprises membres</h1>
       
          <a data-toggle="collapse" data-target="#reponse" id="question"><button class="btn btn-primary">Cliquez ici pour insérer une entreprise <i class="fa fa-chevron-down"></i></button></a>
         
          <div id="reponse" class="collapse" data-parent="#question" class="card mb-4 py-3 border-left-primary">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">Entreprise?</h1>
                      
                    </div>

              
                    <form class="user" method="post" action="<?php echo site_url("Excel_Controller/import");?>" enctype="multipart/form-data">
                    <div class="form-inline" style="margin-bottom:1rem">
                    
                    <div class="col-4">
                        <p class="text-gray-900 ">Import excel* <a style="color: #4e73df" href="javasript:void()" data-toggle="modal" data-target="#instruction2"><i class="fa fa-question-circle"></i></a>:</p>
                    </div>
                    <div class="col-8">
                    <div class="form-group js">
                        <input type="file" name="excel" id="file-1" class="inputfile inputfile-1" required accept=".xls, .xlsx" />
                        <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choisir un fichier&hellip;</span></label>
                     
                    </div>
                    </div>
                    </div>
                  
                      <div class="form-group">
                      <p style="margin-left:2%" class="text-gray-900 ">Choisissez un pays* <a style="color: #4e73df" href="javasript:void()" data-toggle="modal" data-target="#instruction3"><i class="fa fa-question-circle"></i></a> :</p>
                          <div class="col-md-10">
                              
                              <select name="nompays" class="form-control">
                              <?php foreach($listepaysnom as $pays) { ?>
                                <option value="<?php echo $pays->NOM_PAYS;?>"><?php echo $pays->NOM_PAYS;?></option>
                              <?php } ?>
                              </select>
                        
                          </div>
                      </div>
                     
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
                            <th>Pays</th>
                            <th>Domaine</th>
                            <th>Sous Domaine</th>
                            <th>Nom entreprise</th>
                            <th>Site Web</th>
                            <th>Telephone</th>
                            <th>Email</th>
                            <th>Adresse</th>
                            <th>Lieu</th>
                            <th>Modification</th>
                          </tr>
                        </thead>
              
                        <tbody>
                          <?php foreach($liste as $entreprise) { ?>
                          <tr>
                            <td><?php echo $entreprise->ID_MEMBRE;?></td>
                            <td><?php echo $entreprise->ID_PAYS;?></td>
                            <td><?php echo $entreprise->DOMAINE;?></td>
                            <td><?php echo $entreprise->SOUS_DOMAINE;?></td>
                            <td><?php echo $entreprise->NOM_ENTREPRISE;?></td>
                            <td><?php echo $entreprise->SITE_WEB;?></td>
                            <td><?php echo $entreprise->TELEPHONE;?></td>
                            <td><?php echo $entreprise->EMAIL;?></td>
                            <td><?php echo $entreprise->ADRESSE;?></td>
                            <td><?php echo $entreprise->LIEU;?></td>
                            <td>
                                <a href="<?php echo site_url('Excel_Controller/read');?>/<?php echo $entreprise->ID_MEMBRE;?>" class="btn btn-primary btn-sm"  ><i class="fa fa-edit"></i></a>
                                    
                                <form action="<?php echo site_url("Excel_Controller/delete");?>/<?php echo $entreprise->ID_MEMBRE;?>" method="post" onsubmit="if(confirm('Voulez vous vraiment supprimer cette entreprise?')){return true;}else{return false;}">
                                      <input type="hidden" name="id" value="4">
                                      <button type="submit"  class="btn btn-danger btn-sm "><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                  
                          </tr>
                          <?php } ?>
                          
                        
                        </tbody>
                      </table>
                      <!-- <?php echo $links;?> -->
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
