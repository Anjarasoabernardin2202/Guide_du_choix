<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>GDC - Section</title>

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
          <h1 class="h3 mb-4 text-gray-800">Gestion des sous paragraphes</h1>
          <?php if($message != null || isset($message)) { ?>
            <p style="color:#093b29"><?php echo $message;?></p>
          <?php } ?>
          <?php if($erreur != null) { ?>
            <p style="color:#be2617">Erreur trouvée! Cliquer sur le bouton ci-dessous pour plus d'informations</p>
          
          <?php } ?>
          <a data-toggle="collapse" data-target="#reponse" id="question"><button class="btn btn-primary">Cliquez ici pour insérer un sous-paragraphe <i class="fa fa-chevron-down"></i></button></a>
      
      
       
          <div id="reponse" class="collapse" data-parent="#question" class="card mb-4 py-3 border-left-primary">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <div class="p-5">
                    <div class="text-center">
                      <h5 class="text-gray-900 mb-4">Nouveau sous paragraphe?</h5>
                      <b><i class="fa fa-warning"></i> Attention: Avant d'insérer les nouveaux données, veillez à cliquer sur cet icon <i class="fa fa-question-circle"></i> pour voir et suivre les instructions.</b>
                     

                     
                    </div>
                    <br>
                    <?php if($erreur != null && isset($erreur[3])) { ?>
                        <p style="color:#be2617"><?php echo $erreur[3];?></p>    
                    <?php } ?>
                    </p>
                    <form class="user" method="post" action="<?php echo site_url('Contenu_Controller/createArticle');?>" enctype="multipart/form-data">

                    <div class="form-inline" style="margin-bottom:1rem">
                    
                    <div class="col-4">
                        <p class="text-gray-900 ">Image <a style="color: #4e73df" href="javasript:void()" data-toggle="modal" data-target="#instruction1"><i class="fa fa-question-circle"></i></a>:</p>
                    </div>
                    <div class="col-8">
                    <div class="form-group js">
                        <input type="file" name="image" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
                        <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choisir un fichier&hellip;</span></label>
                    </div>
                    </div>
                    </div>
                      <div class="form-group">
                      <div class="col-md-10">
                      <p class="text-gray-900 ">Choisissez un paragraphe <a style="color: #4e73df" href="javasript:void()" data-toggle="modal" data-target="#instruction2"><i class="fa fa-question-circle"></i></a>* </p>
                    
                              <select name="nomchapitre" class="form-control">
                              <option value="">Pas selectionné</option>
                              <?php foreach($listechapitres as $chapitre) { ?>
                                <option value="<?php echo $chapitre->ID_SOUSCHAPITRE;?>"><?php echo $chapitre->NOM_SOUSCHAPITRE;?></option>
                              <?php } ?>
                              </select>
                          </div>
                          <?php if($erreur != null && isset($erreur[0]) ) { 
                       ?>
                        <p style="color:#be2617"class="erreur"><?php echo $erreur[0];?></p>
                       
                      <?php } ?>
                      </div>
                
                      <div class="form-group">
                      <p style="margin-left:2%" class="text-gray-900 ">Titre <a style="color: #4e73df" href="javasript:void()" data-toggle="modal" data-target="#instruction3"><i class="fa fa-question-circle"></i></a>* </p>

                        <input type="text" name="titrearticle" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Titre article">
                        <?php if($erreur != null && isset($erreur[1]) ) { 
                       ?>
                        <p style="color:#be2617"class="erreur"><?php echo $erreur[1];?></p>
                       
                      <?php } ?>
                      </div>
                      <div class="form-group">
                      <p style="margin-left:2%" class="text-gray-900 ">Numéro <a style="color: #4e73df" href="javasript:void()" data-toggle="modal" data-target="#instruction4"><i class="fa fa-question-circle"></i></a>* </p>
                      
                      <select name="numeroarticle" class="form-control">
                      <option value="">Pas selectionné</option> 
                          <?php for($i = 1; $i<=20; $i++) { ?>
                            <option value="<?php echo $i?>"><?php echo $i;?></option>

                          <?php } ?>
                          </select>
                      
                        <?php if($erreur != null && isset($erreur[2]) ) { 
                       ?>
                        <p style="color:#be2617"class="erreur"><?php echo $erreur[2];?></p>
                       
                      <?php } ?>
                      <?php if($erreur != null && isset($erreur[4]) ) { 
                       ?>
                        <p style="color:#be2617"class="erreur"><?php echo $erreur[4];?></p>
                       
                      <?php } ?>
                      </div>
                      <div class="form-group">
                      <p style="margin-left:2%" class="text-gray-900 ">Contenu <a style="color: #4e73df" href="javasript:void()" data-toggle="modal" data-target="#instruction5"><i class="fa fa-question-circle"></i></a>: </p>
                      <textarea type="text" name="descriptionarticle" id="descriptionarticle" class="form-control form-control-user"  aria-describedby="emailHelp"  rows="10" data-sample-short></textarea>

                  
                      </div>
                      <div class="form-group">
                      <p style="margin-left:2%" class="text-gray-900 ">Smartphone <a style="color: #4e73df" href="javasript:void()" data-toggle="modal" data-target="#instruction6"><i class="fa fa-question-circle"></i></a>:</p>
                      <textarea type="text" name="descriptionarticlesmart" id="descriptionarticlesmart" class="form-control form-control-user"  aria-describedby="emailHelp"  rows="10" data-sample-short></textarea>

                      
                  
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
              <div class="card-body">
                  <div class="table-responsive">
                      <table id="dtBasicExample" class="table table-bordered dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th>Paragraphe</th>
                            <th>Numero</th>
                            <th>Image</th>
                            <th>Nom</th>
                            <th>Contenu</th>
                            <th>Smartphone</th>
                            <th>Modification</th>
                          </tr>
                        </thead>
              
                        <tbody>
                          <?php foreach($liste as $article) { ?>
                          <tr>
                            <td><?php echo $article->NOM_CHAPITRE;?></td>

                            <td><?php echo $article->NUMERO_ARTICLE;?></td>
                            <?php if($article->IMAGE_ARTICLE == null || empty($article)) { ?>
                                <td>Pas d'image</td>
                            <?php } else{?>
                            <td><img style="width:100px;height:auto" src="<?php echo base_url();?>/assets/image/<?php echo $article->IMAGE_ARTICLE;?>"></td>
                            <?php } ?>
                            <td><?php echo $article->TITRE_ARTICLE;?></td>
                            <td><?php echo $article->CONTENU_ARTICLE;?></td>
                            <td><?php echo $article->CONTENU_ARTICLE_SMARTPHONE;?></td>
                            <td>
                                <a href="<?php echo site_url('Contenu_Controller/readArticle');?>/<?php echo $article->ID_ARTICLE;?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                    
                                <form action="<?php echo site_url("Contenu_Controller/deleteArticle");?>/<?php echo $article->ID_ARTICLE;?>" method="post" onsubmit="if(confirm('Voulez vous vraiment supprimer cet article?')){return true;}else{return false;}">
                                      <input type="hidden" name="id" value="4">
                                      <button type="submit"  class="btn btn-danger btn-sm "><i class="fa fa-trash"></i></button>
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
                      <p>L'image associée à la section permet de visualiser ce qui va etre dit. Elle est non obligatoire.</p>  
                      
                      
                            
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
                      <p>Une section est obligatoirement reliée à un paragraphe parce que grosso modo c'est le contenu détaillé du paragraphe.</p>  
                      
                      
                            
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
                      <p>Un numéro est associé à chaque section.</p>  
                      
                      
                            
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
             
                      <p>Ce sont les détails de la section. C'est la lecon.</p>  
                      
                      
                            
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
                      <p>La version courte du contenu. </p>  
                      
                      
                            
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
CKEDITOR.replace('descriptionarticle',  {
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
CKEDITOR.replace('descriptionarticlesmart',  {
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
