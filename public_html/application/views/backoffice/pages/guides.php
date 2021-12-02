<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>GDC - Guides</title>

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
          <h1 class="h3 mb-4 text-gray-800">Gestion des guides</h1>
          <?php if($message != null || isset($message)) { ?>
                      <p style="color:#093b29"><?php echo $message;?></p>
                    <?php } ?>
          <?php if($erreur != null) { 
                          ?>
                        <p style="color:#be2617">Erreur trouvée! Cliquer sur le bouton ci-dessous pour plus d'informations</p>
                        
                      <?php } ?>
          <a data-toggle="collapse" data-target="#reponse" id="question"><button class="btn btn-primary">Cliquez ici pour insérer un guide <i class="fa fa-chevron-down"></i></button></a>
         
          <div id="reponse" class="collapse" data-parent="#question" class="card mb-4 py-3 border-left-primary">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">Nouveau guide?</h1>
                     
                    
                    </div>
                    <br>
         
          <?php if($erreur != null && isset($erreur[3])) { ?>
              <p style="color:#be2617"><?php echo $erreur[3];?></p>    
          <?php } ?>
                    <form class="user" method="post" action="<?php echo site_url('Guide_Controller/create');?>" enctype="multipart/form-data">
                    <div class="form-inline" style="margin-bottom:1rem">
                    
                    <div class="col-4">
                        <p  class="text-gray-900 ">Image du guide* </p>
                    </div>
                    <div class="col-8">
                    <div class="form-group js">
                        <input type="file" name="image[]" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
                        <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choisir un fichier&hellip;</span></label>
                          <?php if($erreur != null && isset($erreur[1])) { ?>
                          <div class="col-12">
                            <p style="color:#be2617"><?php echo $erreur[1];?></p>
                          </div>
                        <?php } ?>
                        
                    </div>
                    </div>
                    </div>
                    <div class="form-inline" style="margin-bottom:1rem">
                    
                    <div class="col-4">
                        <p  class="text-gray-900 ">Symbole du guide* </p>
                    </div>
                    <div class="col-8">
                    <div class="form-group js">
                        <input type="file" name="image[]" id="file-2" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
                        <label for="file-2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choisir un fichier&hellip;</span></label>
                          <?php if($erreur != null && isset($erreur[5])) { ?>
                          <div class="col-12">
                            <p style="color:#be2617"><?php echo $erreur[5];?></p>
                          </div>
                        <?php } ?>
                    </div>
                    </div>
                    </div>
                      <div class="form-group">
                        <div class="col-4">
                        <p style="margin-left:2%;" class="text-gray-900">Choisissez une rubrique* </p>
                          </div>
                      <div class="col-8">
                              <select name="nomrubrique" class="form-control">
                              <?php foreach($listerubriques as $rubrique) { ?>
                                <option value="<?php echo $rubrique->NOM_RUBRIQUE;?>"><?php echo $rubrique->NOM_RUBRIQUE;?></option>
                              <?php } ?>
                              </select>
                          </div>
                          <?php if($erreur != null && isset($erreur[4]) ) { 
                       ?>
                        <p style="color:#be2617"class="erreur"><?php echo $erreur[4];?></p>
                       
                      <?php } ?>
                      </div>
                      <div class="form-group">
                        <p style="margin-left:2%;" class="text-gray-900">Nom du guide* </p>
                        <input type="text" name="nomguide" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Nom">
                        
                        <?php if($erreur != null && isset($erreur[0]) ) { 
                       ?>
                        <p style="color:#be2617"class="erreur"><?php echo $erreur[0];?></p>
                       
                      <?php } ?>
                      </div>
                     
                      <div class="form-group">
                      <p style="margin-left:2%;" class="text-gray-900">Description du guide* </p>

                        <textarea name="descriptionguide" id="descriptionguide" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" rows="10" ></textarea>
                        <?php if($erreur != null && isset($erreur[2]) ) { 
                       ?>
                        <p style="color:#be2617"class="erreur"><?php echo $erreur[2];?></p>
                       
                      <?php } ?>
                      </div>
                      <div class="form-group">
                      <p style="margin-left:2%;" class="text-gray-900">Description du guide pour les smartphones </p>

                        <textarea name="descriptionguidesmartphone" id="descriptionguidesmartphone" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" rows="10"></textarea>
                    
                      </div>
                          <p>NB: *  Champ obligatoire</p>
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
          <b><i class="fa fa-warning"></i> Attention: Si vous comptez supprimer un guide, il faut savoir que s'il a des données s'y rattachant il ne pourra pas etre supprimer et vous devez les supprimer en premier lieu. </b>
              <div class="card-body">
                  <div class="table-responsive">
                      <table id="dtBasicExample" class="table table-bordered dataTable"  width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Pays</th>
                            <th>Rubrique</th>
                            <th>Symbole</th>
                            <th>Nom</th>
                            <th>Description</th>
                            <th>Smartphone</th>
                            <th>Modification</th>
                          </tr>
                        </thead>
              
                        <tbody>
                          <?php foreach($liste as $guides) { ?>
                          <tr>
                            <td><?php echo $guides->ID_GUIDE;?></td>
                            <td><img style="width:120px;height:auto" src="<?php echo base_url();?>/assets/image/<?php echo $guides->IMAGE_GUIDE;?>"></td>
                            <td><?php echo $guides->NOM_PAYS;?></td>
                            <td><?php echo $guides->NOM_RUBRIQUE;?></td>
                            <td><img style="width:80px;80px" src="<?php echo base_url();?>/assets/image/<?php echo $guides->SYMBOLE_GUIDE;?>"></td>
                            <td><?php echo $guides->NOM_GUIDE;?></td>
                            <td><?php echo $guides->DESCRIPTION_GUIDE;?></td>
                            <td><?php echo $guides->DESCRIPTION_GUIDE_SMARTPHONE;?></td>
                            <td>
                                  <a href="<?php echo site_url('Guide_Controller/read');?>/<?php echo $guides->ID_GUIDE;?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                    
                                    <form action="<?php echo site_url("Guide_Controller/delete");?>/<?php echo $guides->ID_GUIDE;?>" method="post" onsubmit="if(confirm('Voulez vous vraiment supprimer ce guide?')){return true;}else{return false;}">
                                          <input type="hidden" name="id" value="4">
                                          <button type="submit"  class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                    </form>
                                  
                            </td>
                          </tr>

                          <?php } ?>
                          
                  
                        
                        </tbody>
                      </table>
                      <?php echo $links;?>
                    </div>
                  </div>
                </div>
            
                      
            
        <!-- /.container-fluid -->
      </div>
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
CKEDITOR.replace('descriptionguide');
CKEDITOR.replace('descriptionguidesmartphone');

</script>
</body>

</html>
