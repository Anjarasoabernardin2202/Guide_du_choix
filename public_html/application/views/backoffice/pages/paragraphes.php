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
          <h1 class="h3 mb-4 text-gray-800">Gestion des paragraphes</h1>
          <?php if($message != null || isset($message)) { ?>
            <p style="color:#093b29"><?php echo $message;?></p>
          <?php } ?>
          <?php if($erreur != null) { ?>
            <p style="color:#be2617">Erreur trouvée! Cliquer sur le bouton ci-dessous pour plus d'informations</p>
    
          <?php } ?>
          <a data-toggle="collapse" data-target="#reponse" id="question"><button class="btn btn-primary">Cliquez ici pour insérer un paragraphe <i class="fa fa-chevron-down"></i></button></a>
      
          <div id="reponse" class="collapse" data-parent="#question" class="card mb-4 py-3 border-left-primary">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <div class="p-5">
                    <div class="text-center">
                      <h5 class="text-gray-900 mb-4">Nouveau paragraphe?</h5>
                      <b><i class="fa fa-warning"></i> Attention: Avant d'insérer les nouveaux données, veillez à cliquer sur cet icon <i class="fa fa-question-circle"></i> pour voir et suivre les instructions.</b>
                    </div>
                    <br>
            
          <?php if($erreur != null && isset($erreur[5])) { ?>
              <p style="color:#be2617"><?php echo $erreur[5];?></p>    
          <?php } ?>
                    <form class="user" method="post" action="<?php echo site_url('Chapitre_Controller/createParagraphe');?>" enctype="multipart/form-data">
                    <div class="form-inline" style="margin-bottom:1rem">
                    
                    <div class="col-4">
                        <p class="text-gray-900 ">Image paragraphe <a style="color: #4e73df" href="javasript:void()" data-toggle="modal" data-target="#instruction1"><i class="fa fa-question-circle"></i></a>:</p>
                    </div>
                    <div class="col-8">
                    <div class="form-group js">
                        <input type="file" name="image[]" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
                                  <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choisir un fichier&hellip;</span></label>
                        
                    </div>
                    </div>
                    </div>
                    <div class="form-inline" style="margin-bottom:1rem">
                    
                    <div class="col-4">
                        <p class="text-gray-900 ">Autre Image paragraphe <a style="color: #4e73df" href="javasript:void()" data-toggle="modal" data-target="#instruction7"><i class="fa fa-question-circle"></i></a>:</p>
                    </div>
                    <div class="col-8">
                    <div class="form-group js">
                        <input type="file" name="image[]" id="file-2" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
                                  <label for="file-2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choisir un fichier&hellip;</span></label>
                        
                    </div>
                    </div>
                    </div>
                      <div class="form-group">
                      <div class="col-md-10">
                      <p class="text-gray-900">Choisissez un sous-chapitre <a style="color: #4e73df" href="javasript:void()" data-toggle="modal" data-target="#instruction2"><i class="fa fa-question-circle"></i></a> *: </p>
                    
                              <select name="nomschapitre" class="form-control">
                                    <option value="">Pas selectionné</option>
                              <?php foreach($listeschapitre as $chapitre) { ?>
                                <option value="<?php echo $chapitre->ID_SOUSCHAPITRE;?>"><?php echo $chapitre->NOM_SOUSCHAPITRE;?></option>
                              <?php } ?>
                              </select>
                          </div>
                          <?php if($erreur != null && isset($erreur[3]) ) { 
                       ?>
                        <p style="color:#be2617"class="erreur"><?php echo $erreur[3];?></p>
                       
                      <?php } ?>
                      </div>
                          </div>
                      <div class="form-group">
                      <p style="margin-left:2%;" class="text-gray-900">Titre du paragraphe <a style="color: #4e73df" href="javasript:void()" data-toggle="modal" data-target="#instruction3"><i class="fa fa-question-circle"></i></a>*: </p>

                        <input type="text" name="nomparagraphe" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Nom paragraphe">
                        <?php if($erreur != null && isset($erreur[1]) ) { 
                       ?>
                        <p style="color:#be2617"class="erreur"><?php echo $erreur[1];?></p>
                       
                      <?php } ?>
                      </div>
                      <div class="form-group">
                      <p class="text-gray-900 ">Numéro du chapitre <a style="color: #4e73df" href="javasript:void()" data-toggle="modal" data-target="#instruction4"><i class="fa fa-question-circle"></i></a> * :</p>
                      <select name="numero" class="form-control">
                      <option value="">Pas selectionné</option>
                          <?php for($i = 1; $i<=20; $i++) { ?>
                            <option value="<?php echo $i?>"><?php echo $i;?></option>

                          <?php } ?>
                          </select>
                        <?php if($erreur != null && isset($erreur[2]) ) { 
                       ?>
                        <p style="color:#be2617"class="erreur"><?php echo $erreur[2];?></p>
                       
                      <?php } ?>
                      <?php if($erreur != null && isset($erreur[6]) ) { 
                       ?>
                        <p style="color:#be2617"class="erreur"><?php echo $erreur[6];?></p>
                       
                      <?php } ?>
                      </div>
                      <div class="form-group">
                      <p style="margin-left:2%;" class="text-gray-900">Introduction paragraphe <a style="color: #4e73df" href="javasript:void()" data-toggle="modal" data-target="#instruction5"><i class="fa fa-question-circle"></i></a>*: </p>
                      <textarea name="description" id="description" class="form-control form-control-user ckeditor" id="exampleInputEmail" aria-describedby="emailHelp" rows="10" data-sample-short></textarea>

                     
                  
                      </div>
                      <div class="form-group">
                      <p style="margin-left:2%;" class="text-gray-900">Introduction smartphone <a style="color: #4e73df" href="javasript:void()" data-toggle="modal" data-target="#instruction6"><i class="fa fa-question-circle"></i></a>: </p>
                      <textarea name="descriptionsmart" id="descriptionsmart" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" rows="10" data-sample-short></textarea>

                     
                  
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
          <b><i class="fa fa-warning"></i> Attention: Si vous comptez supprimer un paragraphe, il faut savoir que s'il a des données s'y rattachant il ne pourra pas etre supprimer et vous devez les supprimer en premier lieu. </b>

              <div class="card-body">
                  <div class="table-responsive">
                      <table id="dtBasicExample" class="table table-bordered dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            
                            <th>Sous Chapitre</th>
                            <th>Image paragraphe</th>
                            <th>Autre image</th>
                            <th>Numéro paragraphe</th>
                            <th>Paragraphe</th>
                            <th>Introduction</th>
                            <th>Introduction smartphone</th>
                            <th>Modification</th>
                          </tr>
                        </thead>
              
                        <tbody>
                          <?php foreach($liste as $chapitre) { ?>
                          <tr>
                          
                            <td><?php echo $chapitre->NOM_CHAPITRE;?></td>
                            <?php if($chapitre->IMAGE_SOUSCHAPITRE == "no-img.jpg") { ?>
                              <td>Pas d'image</td>

                            <?php } else { ?>
                              <td> <img style="width:80px;height:60px;" src="<?php echo base_url();?>/assets/image/<?php echo $chapitre->IMAGE_SOUSCHAPITRE;?>"></td>

                          <?php } ?>
                          <?php if($chapitre->IMAGE_SOUSCHAPITRE2 == "no-img.jpg") { ?>
                              <td>Pas d'image</td>

                            <?php } else { ?>
                              <td> <img style="width:80px;height:60px;" src="<?php echo base_url();?>/assets/image/<?php echo $chapitre->IMAGE_SOUSCHAPITRE2;?>"></td>

                          <?php } ?>
                            <td><?php echo $chapitre->NUMERO_SOUS_CHAPITRE;?></td>
                            <td><?php echo $chapitre->NOM_SOUSCHAPITRE;?></td>
                            <td><?php echo $chapitre->INTRODUCTION_SOUSCHAPITRE;?></td>
                            <td><?php echo $chapitre->SMARTPHONE_SOUSCHAPITRE?></td>
                            <td>
                                  <a href="<?php echo site_url('Chapitre_Controller/readParagraphe');?>/<?php echo $chapitre->ID_SOUSCHAPITRE;?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                 
                                    <form action="<?php echo site_url("Chapitre_Controller/deleteParagraphe");?>/<?php echo $chapitre->ID_SOUSCHAPITRE;?>" method="post" onsubmit="if(confirm('Voulez vous vraiment supprimer ce paragraphe?')){return true;}else{return false;}">
                                          <input type="hidden" name="id" value="4">
                                          <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                          <!-- <input type="submit" value="Supprimer" class="btn btn-danger btn-sm"> -->
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
                      <p>L'image associé au paragraphe permet de visualiser ce qui va etre dit.</p>  
                      
                      
                            
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
                      <p>Un sous-chapitre peut avoir plusieurs paragraphes.</p>  
                      
                      
                            
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
                      <p>Au meme titre que l'image, le titre est comme une synthèse du contenu.</p>  
                      
                      
                            
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
                      <p>Un numéro est associé à chaque paragraphe. Attention: si un numéro est déjà assigné à un paragraphe dans un meme sous-chapitre, il ne peut plus etre assigné.</p>  
                      
                      
                            
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
             
                      <p>C'est une phrase introductive du paragraphe. Pour les contenus des paragraphes, veuillez vous diriger dans le menu sous-paragraphe.</p>  
                      
                      
                            
                      </div>
                    </div>
                  </div>
        </div>
        <div id="instruction6" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="createmodal" aria-hidden="true" >
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
        <div id="instruction7" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="createmodal" aria-hidden="true" >
              <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" >Instructions</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>Un paragraphe peut avoir deux images au maximum et aucune image au minimum </p>  
                      
                      
                            
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
CKEDITOR.replace('description',  {
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
CKEDITOR.replace('descriptionsmart',  {
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
