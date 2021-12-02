<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>GDC - Rubriques</title>

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
          <h1 class="h3 mb-4 text-gray-800">Gestion des rubriques</h1>
          <div class="card mb-4 py-3 border-left-primary">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">Modifier rubrique?</h1>
                    </div>
                    <?php foreach($single as $rubrique) { ?>
                    <form class="user" method="post" action="<?php echo site_url("Rubrique_Controller/update")?>/<?php echo $rubrique->ID_RUBRIQUE;?>" enctype="multipart/form-data">
                    <div class="form-inline" style="margin-bottom:1rem">
                    
                    <div class="col-6">
                         <img style="width:200px;height:100px" src="<?php echo base_url();?>/assets/image/<?php echo $rubrique->IMAGE_RUBRIQUE;?>">
                    </div>
                    <div class="col-6">
                    <div class="form-group js">
                      <input type="hidden" name="img" value="<?php echo $rubrique->IMAGE_RUBRIQUE;?>">
                      <input type="file" name="image" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
                        <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choisir un fichier&hellip;</span></label>
                      
                    </div>
                    </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-10">
                              <select name="nompays" class="form-control">
                              <option value="<?php echo $nompays;?>"><?php echo $nompays;?></option>
                              <?php foreach($listepaysnom as $pays) { ?>
                                <option value="<?php echo $pays->NOM_PAYS;?>"><?php echo $pays->NOM_PAYS;?></option>
                              <?php } ?>
                              </select>
                          </div>
                    </div>
                      <div class="form-group">
                      <p style="margin-left:2%" class="text-gray-900">Nom rubrique</p>

                        <input type="text" class="form-control form-control-user" name="nomrubrique" aria-describedby="emailHelp" value="<?php echo $rubrique->NOM_RUBRIQUE;?>">
                      </div>
                     
                      <div class="form-group">
                      <p style="margin-left:2%" class="text-gray-900">Description</p>

                        <textarea type="text" name="description" id="description" class="form-control form-control-user"  aria-describedby="emailHelp"  rows="5"><?php echo $rubrique->DESCRIPTION_RUBRIQUE;?></textarea>
                      </div>
                      <div class="form-group">
                      <p style="margin-left:2%" class="text-gray-900">Smartphone</p>

                        <textarea type="text" name="descriptionsmart" id="descriptionsmart" class="form-control form-control-user"  aria-describedby="emailHelp"  rows="5"><?php echo $rubrique->DESCRIPTION_RUBRIQUE_SMARTPHONE;?></textarea>
                      </div>
                      <div class="form-group">
                      <p style="margin-left:2%" class="text-gray-900">Maurice</p>

                        <textarea type="text" name="maurice" id="maurice" class="form-control form-control-user"  aria-describedby="emailHelp"  rows="5"><?php echo $rubrique->MAURICE;?></textarea>
                      </div>
                      <div class="form-group">
                      <p style="margin-left:2%" class="text-gray-900">Comores</p>

                        <textarea type="text" name="comores" id="comores" class="form-control form-control-user"  aria-describedby="emailHelp"  rows="5"><?php echo $rubrique->COMORES;?></textarea>
                      </div>
                      <div class="form-group">
                      <p style="margin-left:2%" class="text-gray-900">Cameroun</p>

                        <textarea type="text" name="cameroun" id="cameroun" class="form-control form-control-user"  aria-describedby="emailHelp"  rows="5"><?php echo $rubrique->CAMEROUN;?></textarea>
                      </div>
                      <div class="form-group">
                      <p style="margin-left:2%" class="text-gray-900">Maroc</p>

                        <textarea type="text" name="maroc" id="maroc" class="form-control form-control-user"  aria-describedby="emailHelp"  rows="5"><?php echo $rubrique->MAROC;?></textarea>
                      </div>
                      <div class="form-group">
                      <p style="margin-left:2%" class="text-gray-900">Mayotte</p>

                        <textarea type="text" name="mayotte" id="mayotte" class="form-control form-control-user"  aria-describedby="emailHelp"  rows="5"><?php echo $rubrique->MAYOTTE;?></textarea>
                      </div>
                      <button type="submit" class="btn btn-primary btn-user btn-block">
                        Modifier
                      </button>
                              </form>
                      <a href="<?php echo site_url("Rubrique_Controller/rubrique_bo");?>" class="btn btn-default btn-user btn-block">
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
  CKEDITOR.replace('description');
  CKEDITOR.replace('descriptionsmart');
  CKEDITOR.replace('maurice');
  CKEDITOR.replace('maroc');
  CKEDITOR.replace('mayotte');
  CKEDITOR.replace('comores');
  CKEDITOR.replace('cameroun');
  </script>
</body>

</html>
