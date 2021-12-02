<!DOCTYPE html>
<html lang="fr">
  <head>
      <meta charset="utf-8"> 
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>GDC - Page Sponsor</title>
      <?php include("assets/include/head.php");?>
      
  </head>

  <body>
  <?php
  $this->load->view("include/visitor_counter.php");
  ?>
      <!-- navbar tout en haut en bleu -->
      <?php $this->load->view("include/navbar.php");?>
        
      <!-- fin navbar tout en haut en bleu -->
      <div class="web-only">
          <?php $this->load->view('include/header_rubriques.php');?>
      </div>
      <!-- navbar principal -->

    <!-- main body -->

    <footer style="margin-top:10%">
        <?php include("assets/include/footer.php");?>
      </footer>
  </body>
</html>