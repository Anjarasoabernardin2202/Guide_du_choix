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
          <h1 class="h3 mb-4 text-gray-800">Gestion des sections</h1>
          <div class="card mb-4 py-3 border-left-primary">
            <div class="card-body">
              <div class="row">
                <div class="col-lg-12">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">Modifier section?</h1>
                    </div>
                    <?php foreach($single as $article) { ?>
                    <form class="user" method="post" action="<?php echo site_url("Contenu_Controller/updateArticle");?>/<?php echo $article->ID_ARTICLE;?>" enctype="multipart/form-data">
                    <div class="form-inline" style="margin-bottom:1rem">
                    
                    <div class="col-6">
                    <?php if($article->IMAGE_ARTICLE == null) { ?>
                    <p>Pas d'image</p>
                    <?php } else {?>
                         <img style="width:200px;height:auto" src="<?php echo base_url();?>/assets/image/<?php echo $article->IMAGE_ARTICLE;?>">
                    <?php } ?>
                    </div>
                    <div class="col-6">
                    <div class="form-group js">
                      <input type="hidden" name="img" value="<?php echo $article->IMAGE_ARTICLE;?>">
                      <input type="file" name="image" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
                        <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choisir un fichier&hellip;</span></label>
                      
                    </div>
                    </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-10">
                              <select name="nomchapitre" class="form-control">
                              <option value="<?php echo $nomchapitre;?>"><?php echo $nomchapitre;?></option>
                              <?php foreach($listechapitres as $chapitre) { ?>
                                <option value="<?php echo $chapitre->NOM_CHAPITRE;?>"><?php echo $chapitre->NOM_CHAPITRE;?></option>
                              <?php } ?>
                              </select>
                          </div>
                    </div>
                      <div class="form-group">
                      <p style="margin-left:2%" class="text-gray-900 ">Titre  </p>

                        <input type="text" name="titrearticle" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" value="<?php echo $article->TITRE_ARTICLE;?>">
                      </div>
                      <div class="form-group">
                    
                        <p style="margin-left:2%" class="text-gray-900 ">Numéro  </p>
                      <select name="numero" class="form-control">
                      <option value="<?php echo $article->NUMERO_ARTICLE;?>"><?php echo $article->NUMERO_ARTICLE;?></option>

                          <?php for($i = 1; $i<=20; $i++) { ?>
                            <option value="<?php echo $i?>"><?php echo $i;?></option>

                          <?php } ?>
                          </select>
                      </div>
                   
                      <div class="form-group">
                      <p style="margin-left:2%" class="text-gray-900 ">Description: </p>
                      <textarea type="text" name="descriptionarticle" id="descriptionarticle" class="form-control form-control-user"  aria-describedby="emailHelp"  rows="10"><?php echo $article->CONTENU_ARTICLE;?></textarea>

                  
                      </div>
                      <div class="form-group">
                      <p style="margin-left:2%" class="text-gray-900 ">Smartphone </p>
                      <textarea type="text" name="descriptionarticlesmart" id="descriptionarticlesmart" class="form-control form-control-user"  aria-describedby="emailHelp"  rows="10"><?php echo $article->CONTENU_ARTICLE_SMARTPHONE;?></textarea>

                      
                  
                      </div>
                    <?php } ?>
                      <button type="submit" class="btn btn-primary btn-user btn-block">
                        Modifier
                      </button>
                      <a href="<?php echo site_url("Contenu_Controller/article_bo");?>" class="btn btn-default btn-user btn-block">
                        Annuler
                    </a>
                      
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

  <?php include("assets2/include/footer2.php");?>

  <script>
CKEDITOR.replace('descriptionarticle');
CKEDITOR.replace('descriptionarticlesmart');
</script>
</body>

</html>
