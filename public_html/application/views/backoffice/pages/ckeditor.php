
<!DOCTYPE html>
<html lang="en">  
<head>
<title>How to Integrate CKeditor in Codeigniter using Bootstrap</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets2/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets2/ckfinder/ckfinder.js"></script>
</head>
<body>
<div class="container">
 <h1 class="alert alert-info">Test ckeditor</h1>
    
<form method="post" action="Pays_Controller/create">
    <div class="row">
        <div class="col-sm-3 col-lg-12">
            <div class="form-group">
            <label>Titre:</label>
            <input type="text" name="nompays" placeholder="Titre" class="form-control">
            </div>
        </div>
    </div>
    <div class="row">
       <div class="col-sm-3 col-lg-12">
            <div class="form-group">
            <textarea name="introduction" id="myeditor" rows="10" cols="80">
                Pakher! We are building a simple editor.
            </textarea>
        </div>
    </div>
    <div class="row">
       <div class="col-sm-3 col-lg-12">
            <div class="form-group">      
            <input type="submit" name="submitBtn" value="Ajouter" class="btn btn-success">
             </div>
        </div>
    </div>
        </form>
    
</div>
<script>
CKEDITOR.replace('myeditor');
</script>
</body>
</html>