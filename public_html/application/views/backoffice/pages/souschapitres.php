<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>GDC - Sous Chapitres</title>

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
          <h1 class="h3 mb-4 text-gray-800">Gestion des sous chapitres</h1>
          <?php if($message != null || isset($message)) { ?>
            <p style="color:#093b29"><?php echo $message;?></p>
          <?php } ?>
          <?php if($erreur != null) { ?>
            <p style="color:#be2617">Erreur trouvée! Cliquer sur le bouton ci-dessous pour plus d'informations</p>
   
          <?php } ?>
          <a data-toggle="collapse" data-target="#reponse" id="question"><button class="btn btn-primary">Cliquez ici pour insérer un sous-chapitre <i class="fa fa-chevron-down"></i></button></a>
         
          <div id="reponse" class="collapse" data-parent="#question" class="card mb-4 py-3 border-left-primary">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <div class="p-5">
                    <div class="text-center">
                      <h5 class="text-gray-900 mb-4">Nouveau sous chapitre?</h5>
                      <b><i class="fa fa-warning"></i> Attention: Avant d'insérer les nouveaux données, veillez à cliquer sur cet icon <i class="fa fa-question-circle"></i> pour voir et suivre les instructions.</b>

                    </div>
                    <br>
               
          <?php if($erreur != null && isset($erreur[4])) { ?>
              <p style="color:#be2617"><?php echo $erreur[4];?></p>    
          <?php } ?>
                    <form class="user" method="post" action="<?php echo site_url('Chapitre_Controller/createSChapitre');?>" enctype="multipart/form-data">
         
                      <div class="form-group">
                      <p style="margin-left:2%" class="text-gray-900 ">Choisissez un chapitre <a style="color: #4e73df" href="javasript:void()" data-toggle="modal" data-target="#instruction1"><i class="fa fa-question-circle"></i></a> *:</p>

                      <div class="col-md-10">

                              <select name="nomchapitre" class="form-control">
                              <option value="">Pas selectionné</option>
                              <?php foreach($listechapitres as $chapitre) { ?>
                                <option value="<?php echo $chapitre->ID_CHAPITRE;?>"><?php echo $chapitre->NOM_CHAPITRE;?></option>
                              <?php } ?>
                              </select>
                          </div>
                          <?php if($erreur != null && isset($erreur[3]) ) { 
                       ?>
                        <p style="color:#be2617"class="erreur"><?php echo $erreur[3];?></p>
                       
                      <?php } ?>
                      </div>
                
                      <div class="form-group">
                      <p style="margin-left:2%" class="text-gray-900 ">Titre sous chapitre <a style="color: #4e73df" href="javasript:void()" data-toggle="modal" data-target="#instruction2"><i class="fa fa-question-circle"></i></a> *:</p>

                        <input type="text" name="nomschapitre" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Nom sous chapitre">
                        <?php if($erreur != null && isset($erreur[1]) ) { 
                       ?>
                        <p style="color:#be2617"class="erreur"><?php echo $erreur[1];?></p>
                       
                      <?php } ?>
                      </div>
                      <div class="form-group">
                      <p style="margin-left:2%" class="text-gray-900 ">Choisissez un numéro <a style="color: #4e73df" href="javasript:void()" data-toggle="modal" data-target="#instruction3"><i class="fa fa-question-circle"></i></a> *:</p>

                      <select name="numerochapitre" class="form-control">
                        <option value="">Pas selectionné</option>

                          <?php for($i = 1; $i<=20; $i++) { ?>
                            <option value="<?php echo $i?>"><?php echo $i;?></option>

                          <?php } ?>
                          </select>
                        <?php if($erreur != null && isset($erreur[2]) ) { 
                       ?>
                        <p style="color:#be2617"class="erreur"><?php echo $erreur[2];?></p>
                       
                      <?php } ?>
                      <?php if($erreur != null && isset($erreur[5]) ) { 
                       ?>
                        <p style="color:#be2617"class="erreur"><?php echo $erreur[5];?></p>
                       
                      <?php } ?>
                      </div>
                      <div class="form-group">
                      <p style="margin-left:2%" class="text-gray-900 ">Introduction sous chapitre <a style="color: #4e73df" href="javasript:void()" data-toggle="modal" data-target="#instruction4"><i class="fa fa-question-circle"></i></a>:</p>

                       
                      <textarea type="text" name="descriptionchapitre" id="descriptionchapitre" class="form-control form-control-user"  aria-describedby="emailHelp"  rows="10" data-sample-short></textarea>
                          
                      </div>
                      <div class="form-group">
                      <p style="margin-left:2%" class="text-gray-900 ">Smartphone <a style="color: #4e73df" href="javasript:void()" data-toggle="modal" data-target="#instruction5"><i class="fa fa-question-circle"></i></a>:</p>

                       
                        <textarea type="text" name="descriptionchapitresmart" id="descriptionchapitresmart" class="form-control form-control-user"  aria-describedby="emailHelp"  rows="10" data-sample-short></textarea>
                  
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
          <b><i class="fa fa-warning"></i> Attention: Si vous comptez supprimer un sous-chapitre, il faut savoir que s'il a des données s'y rattachant il ne pourra pas etre supprimer et vous devez les supprimer en premier lieu. </b>

              <div class="card-body">
                  <div class="table-responsive">
                      <table id="dtBasicExample" class="table table-bordered dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            
                            <th>Chapitre</th>
                            <th>Numéro sous chapitre</th>
                            <th>Sous chapitre</th>
                            <th>Description</th>
                            <th>Smartphone</th>
                            <th>Modification</th>
                          </tr>
                        </thead>
              
                        <tbody>
                          <?php foreach($liste as $chapitre) { ?>
                          <tr>
                            <td><?php echo $chapitre->NOM_CHAPITRE;?></td>
                            <td><?php echo $chapitre->NUMERO_SOUS_CHAPITRE;?></td>
                            <td><?php echo $chapitre->NOM_SOUSCHAPITRE;?></td>
                            <td><?php echo $chapitre->INTRODUCTION_SOUSCHAPITRE;?></td>
                          <td><?php echo $chapitre->SMARTPHONE_SOUSCHAPITRE;?></td>

                            <td>
                                  <a href="<?php echo site_url('Chapitre_Controller/readSChapitre');?>/<?php echo $chapitre->ID_SOUSCHAPITRE;?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                 
                                    <form action="<?php echo site_url("Chapitre_Controller/deleteSChapitre");?>/<?php echo $chapitre->ID_SOUSCHAPITRE;?>" method="post" onsubmit="if(confirm('Voulez vous vraiment supprimer ce sous chapitre?')){return true;}else{return false;}">
                                          <input type="hidden" name="id" value="4">
                                          <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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
              </div>
            </div>
            <div id="instruction1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="createmodal" aria-hidden="true" >
              <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" >Instructions</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>Un chapitre peut avoir plusieurs sous-chapitres</p>  
                      
                      
                            
                      </div>
                    </div>
                  </div>
        </div>
        <div id="instruction2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="createmodal" aria-hidden="true" >
              <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" >Instructions</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>Titre obligatoire. Ce sera le lien qu'on cliquera lorsqu'on va dans les pages</p>  
                      
                      
                            
                      </div>
                    </div>
                  </div>
        </div>
        <div id="instruction3" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="createmodal" aria-hidden="true" >
              <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" >Instructions</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>Comme dans toutes les lecons, les chapitres et les sous-chapitres sont numérotés.Attention: les sous chapitres du meme chapitre ne peuvent pas avoir les memes numéros. </p>  
                      
                      
                            
                      </div>
                    </div>
                  </div>
        </div>
        <div id="instruction4" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="createmodal" aria-hidden="true" >
              <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" >Instructions</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>C'est une phrase introductive du sous-chapitre </p>  
                      
                      
                            
                      </div>
                    </div>
                  </div>
        </div>
        <div id="instruction5" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="createmodal" aria-hidden="true" >
              <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" >Instructions</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>La version courte de la phrase introductive. </p>  
                      
                      
                            
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
CKEDITOR.replace('descriptionchapitre', {
      toolbar: [{
          name: 'document',
          items: ['Print']
        },
        {
          name: 'clipboard',
          items: ['Undo', 'Redo']
        },
        {
          name: 'styles',
          items: ['Format', 'Font', 'FontSize']
        },
        {
          name: 'colors',
          items: ['TextColor', 'BGColor']
        },
        {
          name: 'align',
          items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']
        },
        '/',
        {
          name: 'basicstyles',
          items: ['Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', 'CopyFormatting']
        },
        {
          name: 'links',
          items: ['Link', 'Unlink']
        },
        {
          name: 'paragraph',
          items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']
        },
        {
          name: 'insert',
          items: ['Image', 'Table']
        },
        {
          name: 'tools',
          items: ['Maximize']
        },
        {
          name: 'editing',
          items: ['Scayt']
        }
      ],

      extraAllowedContent: 'h3{clear};h2{line-height};h2 h3{margin-left,margin-top}',

      // Adding drag and drop image upload.
      extraPlugins: 'print,format,font,colorbutton,justify,uploadimage',
      uploadUrl: '<?php echo base_url();?>assets2/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',

      // Configure your file manager integration. This example uses CKFinder 3 for PHP.
      filebrowserBrowseUrl: '<?php echo base_url();?>assets2/ckfinder/ckfinder.html',
      filebrowserImageBrowseUrl: '<?php echo base_url();?>assets2/ckfinder/ckfinder.html?type=Images',
      filebrowserUploadUrl: '<?php echo base_url();?>assets2/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
      filebrowserImageUploadUrl: '<?php echo base_url();?>assets2/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

      height: 560,

      removeDialogTabs: 'image:advanced;link:advanced'});
CKEDITOR.replace('descriptionchapitresmart', {
      toolbar: [{
          name: 'document',
          items: ['Print']
        },
        {
          name: 'clipboard',
          items: ['Undo', 'Redo']
        },
        {
          name: 'styles',
          items: ['Format', 'Font', 'FontSize']
        },
        {
          name: 'colors',
          items: ['TextColor', 'BGColor']
        },
        {
          name: 'align',
          items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']
        },
        '/',
        {
          name: 'basicstyles',
          items: ['Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', 'CopyFormatting']
        },
        {
          name: 'links',
          items: ['Link', 'Unlink']
        },
        {
          name: 'paragraph',
          items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']
        },
        {
          name: 'insert',
          items: ['Image', 'Table']
        },
        {
          name: 'tools',
          items: ['Maximize']
        },
        {
          name: 'editing',
          items: ['Scayt']
        }
      ],

      extraAllowedContent: 'h3{clear};h2{line-height};h2 h3{margin-left,margin-top}',

      // Adding drag and drop image upload.
      extraPlugins: 'print,format,font,colorbutton,justify,uploadimage',
      uploadUrl: '<?php echo base_url();?>assets2/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',

      // Configure your file manager integration. This example uses CKFinder 3 for PHP.
      filebrowserBrowseUrl: '<?php echo base_url();?>assets2/ckfinder/ckfinder.html',
      filebrowserImageBrowseUrl: '<?php echo base_url();?>assets2/ckfinder/ckfinder.html?type=Images',
      filebrowserUploadUrl: '<?php echo base_url();?>assets2/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
      filebrowserImageUploadUrl: '<?php echo base_url();?>assets2/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

      height: 560,

      removeDialogTabs: 'image:advanced;link:advanced'});
</script>
</body>

</html>
