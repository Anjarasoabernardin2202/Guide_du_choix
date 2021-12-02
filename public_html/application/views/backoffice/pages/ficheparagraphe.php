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
      <?php $this->load->view("backoffice/include/header");?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Gestion des paragraphes</h1>
          <div class="card mb-4 py-3 border-left-primary">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">Modifier paragraphe?</h1>
                    </div>
                    <?php foreach($single as $chapitre) { ?>
                    <form class="user" method="post" action="<?php echo site_url("Chapitre_Controller/updateParagraphe")?>/<?php echo $chapitre->ID_CHAPITRE;?>" enctype="multipart/form-data">
                    <div class="form-inline" style="margin-bottom:1rem">
                    <div class="col-12">
                    <p class="text-gray-900 mb-4">Image:</p>
                    </div>
                      <div class="col-6">
                      <?php if($chapitre->IMAGE_CHAPITRE == "no-img.jpg") { ?>
                        <p class="text-gray">Pas d'image</p>
                      <?php } else {?>
                          <img style="width:90px;height:auto" src="<?php echo base_url();?>/assets/image/<?php echo $chapitre->IMAGE_CHAPITRE;?>">
                      <?php } ?>
                      </div>
                      <div class="col-6">
                      <div class="form-group js">
                        <input type="hidden" name="img" value="<?php echo $chapitre->IMAGE_CHAPITRE;?>">
                      <input type="file" name="image[]" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
				                	<label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choisir un fichier&hellip;</span></label>
                      </div>
                      </div>
                      </div>
                      <div class="form-inline" style="margin-bottom:1rem">
                      <div class="col-12">
                    <p class="text-gray-900 mb-4">Autre:</p>
                    </div>
                    <div class="col-6">
                    <?php if($chapitre->IMAGE_CHAPITRE2 == "no-img.jpg") { ?>
                      <p class="text-gray">Pas d'image</p>
                    <?php } else { ?>
                      <img style="height:90px;width:auto" src="<?php echo base_url();?>/assets/image/<?php echo $chapitre->IMAGE_CHAPITRE2;?>">

                    <?php } ?>
                    </div>
                    <div class="col-6">
                    <div class="form-group js">
                        <input type="hidden" name="img2" value="<?php echo $chapitre->IMAGE_CHAPITRE;?>">
                         <input type="file" name="image[]" id="file-2" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
				                	<label for="file-2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choisir un fichier&hellip;</span></label>
                    </div>
                    </div>
                    </div>
                    <div class="form-group">
                      <p style="margin-left:2%" class="text-gray-900 ">Sous Chapitre <a style="color: #4e73df" href="javasript:void()" data-toggle="modal" data-target="#instruction1"><i class="fa fa-question-circle"></i></a> *:</p>

                      <div class="col-md-10">

                              <select name="nomchapitre" class="form-control">
                              <option value="<?php echo $chapter;?>"><?php echo $chapter;?></option>

                              <?php foreach($listechapitres as $chap) { ?>
                                <option value="<?php echo $chap->NOM_SOUSCHAPITRE;?>"><?php echo $chap->NOM_SOUSCHAPITRE;?></option>
                              <?php } ?>
                              </select>
                          </div>
                   
                      </div>
                    <div class="form-group">
                    <p style="margin-left:2%;" class="text-gray-900">Introduction paragraphe</p>
                        <input type="text" name="nomschapitre" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $chapitre->NOM_CHAPITRE;?>">
                    
                      </div>
                      <div class="form-group">
                      <p style="margin-left:2%;" class="text-gray-900">Numéro paragraphe </p>
                        <input type="text" name="numerochapitre" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $chapitre->NUMERO_CHAPITRE;?>">
                  
                      </div>
                      <div class="form-group">
                      <p style="margin-left:2%;" class="text-gray-900">Introduction paragraphe  </p>
                        
                        <textarea name="descriptionchapitre" id="descriptionchapitre" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" rows="10"  data-sample-short><?php echo $chapitre->INTRODUCTION_CHAPITRE;?></textarea>
                  
                      </div>
                      <div class="form-group">
                      <p style="margin-left:2%;" class="text-gray-900">Introduction smartphone </p>
                       
                        <textarea name="descriptionchapitresmart" id="descriptionchapitresmart" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" rows="10" data-sample-short><?php echo $chapitre->INTRODUCTION_CHAPITRE_SMARTPHONE;?></textarea>
                  
                      </div>
                
                      <button type="submit" class="btn btn-primary btn-user btn-block">
                        Modifier
                      </button>
                      <a href="<?php echo site_url("Chapitre_Controller/paragraphe_bo");?>" class="btn btn-default btn-user btn-block">
                        Annuler
                    </a>
                    <?php } ?>
                    </form>
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
CKEDITOR.replace('descriptionchapitre',{
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
CKEDITOR.replace('descriptionchapitresmart',  {
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
