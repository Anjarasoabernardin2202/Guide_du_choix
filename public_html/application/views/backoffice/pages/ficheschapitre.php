<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>GDC - Sous chapitres</title>

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
          <h1 class="h3 mb-4 text-gray-800">Gestion des sous chapitres</h1>
          <div class="card mb-4 py-3 border-left-primary">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">Modifier un sous chapitre?</h1>
                    </div>
                    <?php foreach($single as $chapitre) { ?>
                    <form class="user" method="post" action="<?php echo site_url("Chapitre_Controller/updateSChapitre")?>/<?php echo $chapitre->ID_CHAPITRE;?>">
                  
                    <div class="form-group">
                      <p style="margin-left:2%" class="text-gray-900 ">Chapitre <a style="color: #4e73df" href="javasript:void()" data-toggle="modal" data-target="#instruction1"><i class="fa fa-question-circle"></i></a> *:</p>

                      <div class="col-md-10">

                              <select name="nomchapitre" class="form-control">
                              <option value="<?php echo $chapter;?>"><?php echo $chapter;?></option>

                              <?php foreach($listechapitres as $chap) { ?>
                                <option value="<?php echo $chap->NOM_CHAPITRE;?>"><?php echo $chap->NOM_CHAPITRE;?></option>
                              <?php } ?>
                              </select>
                          </div>
                   
                      </div>
                    <div class="form-group">
                    <p style="margin-left:2%" class="text-gray-900">Titre sous-chapitre</p>

                        <input type="text" name="nomschapitre" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $chapitre->NOM_CHAPITRE;?>">
                    
                      </div>
                      <div class="form-group">
                      <p style="margin-left:2%" class="text-gray-900">Numéro sous-chapitre</p>

                       
                        <div class="form-group">
                      <div class="col-md-10">
                              <select name="numerochapitre" class="form-control">
                              <option value="<?php echo $chapitre->NUMERO_CHAPITRE;?>"><?php echo $chapitre->NUMERO_CHAPITRE;?></option>
                                <?php for($i = 1; $i<=20; $i++) { ?>
                                 <option value="<?php echo $i?>"><?php echo $i;?></option>
                              <?php } ?>
                          </select>
                             
                          </div>
                    </div>
                      </div>
                  
                      <div class="form-group">
                      <p style="margin-left:2%" class="text-gray-900">Description sous chapitre</p>
                      <textarea type="text" name="descriptionchapitre" id="descriptionchapitre" class="form-control form-control-user"  aria-describedby="emailHelp"  rows="10" data-sample-short><?php echo $chapitre->INTRODUCTION_CHAPITRE;?></textarea>

                       
                  
                      </div>
                      <div class="form-group">
                      <p style="margin-left:2%" class="text-gray-900">Smartphone</p>
                      <textarea type="text" name="descriptionchapitresmart" id="descriptionchapitresmart" class="form-control form-control-user"  aria-describedby="emailHelp"  rows="10" data-sample-short><?php echo $chapitre->INTRODUCTION_CHAPITRE_SMARTPHONE;?></textarea>

                      
                  
                      </div>
                
                      <button type="submit" class="btn btn-primary btn-user btn-block">
                        Modifier
                      </button>
                      <a href="<?php echo site_url("Chapitre_Controller/schapitre_bo");?>" class="btn btn-default btn-user btn-block">
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
CKEDITOR.replace('descriptionchapitresmart',{
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
