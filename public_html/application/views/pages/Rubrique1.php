
<!DOCTYPE html>
<html lang="fr">
  <head>
      <meta charset="utf-8"> 
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>GDC- Detail rubrique TPE et liste des guides</title>
      <?php include("assets/include/head.php");?>



  </head>

  <body >
  <?php
  $this->load->view("include/visitor_counter.php");
  ?>
     <!-- navbar tout en haut en bleu -->
     <?php $this->load->view("include/navbar1");?>
     
    <!-- fin navbar tout en haut en bleu -->

    <!-- navbar principal -->
        <?php $this->load->view("include/header_rubriques.php");?>
       
    <!-- fin navbar principal -->

      <!-- main body -->
  
 

 
    <style>
    .topnav a{
        margin-left:3%;
    }
    .dropdown-menu a{
        font-size:15px;
        margin-left:0%;
    }
    @media screen and (min-width: 601px) and (max-width:1024px){
        .topnav a{
            margin-left:-0.5%; 
        }
        .dropdown-menu a{
            font-size:13px;
        }
        .a .dropdown-toggle{
            margin-left:0%;
            margin-top:-10%;
        }
    }
    @media screen and(max-width:600px){
        .dropdown-menu a{
            font-size:12px;
        }

    @media screen and(max-width: 675px){
       .carddescription{
           font-size: 20px;
       }
            
    }

}
</style>

<nav  aria-label="breadcrumb">
        <ol class="breadcrumb py-0 bleuu">
          <li class="breadcrumb-item"><a class="arborescence" href="<?php echo site_url("Accueil-Controller/");?>">Accueil</a></li>
          <li class="breadcrumb-item"><a class="arborescence">Guide TPE</a></li>
          
        </ol>
      </nav>
        
      


      <div class="container">
        <div class="card mt-5 text-justify">
            <div class="container g-5">
                <div class="description">
                    <p class="rubrique mt-5"> Guide TPE <img class="img-citez" src="<?php echo base_url("assets/image/TPE1.png");?>" alt="" style="width: 150px; margin-left:3%" ></p> 
                    <p class="text-justify responsive">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit quaerat nesciunt, quam tempora iure ut a aliquam ea, voluptatem laudantium repellendus explicabo rerum architecto, quia sint similique debitis natus distinctio!
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem debitis ducimus ad voluptatum cupiditate perspiciatis veniam libero ut asperiores atque corrupti possimus quos quae, recusandae incidunt nostrum, assumenda est non?
                    </p>
                              <p style="margin-top: 2%;font-family: FreeSerif" >
                       <p class="text-center" style="text-align:left"><span style="font-size:20px;"><span style="font-family:Trebuchet MS,serif">Liste des guides</span></span></p>
     
                    </p>
            </div>

            <div class="row padding mb-3 m-4">
                <div class="col-sm-6" >
                <a href="<?php echo site_url('Guide_Controller/detailguide/14/1/1');?>"><p>Epicerie</p></a>
                 
                </div>
            
            </div>
        </div>
    </div>
    </div>
    <!--choix pays-->
    <div class="container">
       <div class="card mt-5 text-justify">
            <div class="container g-5">
                <div class="description">
                <div class="text text-justify" style="margin-top:5%;" >
            <p class="text-center" style="font-size: 25px " > Choisissez votre pays </p>
                 </div>
                </div><br>
        <!--barre de recherhe-->
 <div class="container"style="margin-bottom:5%" >
  <div class="row">
    <div class="col-4">
        <!--liste des drapeau-->
        <button class="button" style="background-color:rgba(135, 206, 250,0.8); border: none; margin-left: 6%; border-radius: 5px;">
        <a style="color: black; font-size: 20px;" class="dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"aria-haspopup="true" aria-expanded="false">Pays </a>

              <div class="dropdown-menu " aria-labelledby="navbarDropdownMenuLink">
             <a style="color:rgb(78,80,81);font-size:11px;" class="dropdown-item" href="#" onclick="clicker(event)"><img class="liste-drapeau" src="https://guiduchoix24.com//assets/image/madagascar.png">     MDG</a>
              </div> </a>
     </button>
        <!-- fin liste des drapeau-->
        <script>
            var clicker = function(event){
                var selectvar = document.getElementById('selectes');
                var boxShow = document.getElementById('boxing');
                selectvar.classList.toggle('showbar');
                boxShow.classList.toggle('showbar');
            }
            /*    
            var element = document.getElementById('value');
            var addElementToDictionary = array("Err","chosen");
            var addToGetElement = search(event) = {
                while(element){
                    setError('Err');
                }
            }

            if(element.setAttributeNS('value')){
                try{
                    if(element.setAttributeNS == "")
                        throw "";
                    
                    if(element.setAttributeNS == TRUE){
                        const x = () => {
                            element.getAttribute("").value;
                        }
                    }
                    else{
                        element.setError('chosen');
                    }
                }
                catch(Err){
                   Messages.Err;
                    Messages.innerText = "" + Err;
                }
                finally{
                    SearchElement.getAttribute('').value;
                    Messages.CreateObjectURL(target.event.files);
                }
            }
            */

        </script>
    </div>
    


    <div class="col-6">
    <div class="hidebar">
    <!--barre de recherche--> 
    <form action="" id="selectes">
      <select class="form-select"  style="width: 200px;height: 28px; border-radius:5px; border: 1px solid " id="autoSizingSelect">
      <option selected="" class="text-center" >Votre choix</option>
      <option value="1">choix 1</option>
      <option value="2">choix 2</option>
      <option value="3">choix 3</option>
      </select>
        <input class="recherche" type="submit" name="" value="rechercher" id="value"
        style="background-color:rgba(135, 206, 250,0.8);color:black; border:2px; border-color:black; border-radius:5px; width: 100px; height: 28px; border: none;" >   
                </form>         
<style>
    .hidebar{
        visibility: hidden;
    }
    .showbar{
        visibility: visible;
    }
</style>

    <!--fin barre de recherche--> 
    
    </div>
  </div>
</div>

    </div>
    </div>
    
</div>
</div>
</div> 
<br>

 
  <div class="container">
        <div class="card mt-3 text-justify hidebar" id="boxing">
            <div class="container g-5">
           <!--block pays-->
          <div class="container"  style="text-align:center; background-color:none;">
            <div class="row mb-3 -">
            <div class="col-lg-12">
              <h3 class="text-center mt-3" style="font-size:24px;">Pays Madagascar</h3>
              <h5 class="mobile-only" style="color: #0f0f0f;"></h5>
              <!-- <a style="color:#467fbf;font-size:20px;font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;text-decoration: none;" href="https://guiduchoix24.com/index.php/Parrain_Controller/parrains"> Voir tous nos parrains <i class="fa fa-chevron-right"></i></a> -->
            </div>
            </div>
            <br>
            
            <div class="row parrains-animation" >
             
              <div class="col-12  bloc-parrain">
            <div class="col-4">
              <div class="card taille-section2 slide" style="background-color:rgba(170,189,222,0.2);">
                <div class="card-anatiny ">
                    <img class="img-parrain2 " src="<?php echo base_url("assets/image/wallpaper.png");?>">
                    
                </div>
              </div>
            </div>
            </div>
             
              <div class="col-12  bloc-parrain">
            <div class="col-4">
              <div class="card taille-section2 slide" style="background-color:rgba(170,189,222,0.2);">
                <div class="card-anatiny ">
                    <img class="img-parrain2 " src="<?php echo base_url("assets/image/wallpaper.png");?>">
                    
                </div>
              </div>
            </div>
            </div>
             
              <div class="col-12  bloc-parrain">
            <div class="col-4">
              <div class="card taille-section2 slide" style="background-color:rgba(170,189,222,0.2);">
                <div class="card-anatiny ">
                    <img class="img-parrain2 " src="<?php echo base_url("assets/image/wallpaper.png");?>">

                </div>
              </div>
            </div>
            </div>
             
              <div class="col-12  bloc-parrain">
            <div class="col-4">
              <div class="card taille-section2 slide" style="background-color:rgba(170,189,222,0.2);">
                <div class="card-anatiny ">
                    <img class="img-parrain2 " src="<?php echo base_url("assets/image/wallpaper.png");?>">
                    
                </div>
              </div>
            </div>
            </div>
             
              <div class="col-12  bloc-parrain">
            <div class="col-4">
              <div class="card taille-section2 slide" style="background-color:rgba(170,189,222,0.2);">
                <div class="card-anatiny ">
                    <img class="img-parrain2 " src="<?php echo base_url("assets/image/wallpaper.png");?>">
                   
                </div>
              </div>
            </div>
            </div>
             
              <div class="col-12  bloc-parrain">
            <div class="col-4">
              <div class="card taille-section2 slide" style="background-color:rgba(170,189,222,0.2);">
                <div class="card-anatiny ">
                    <img class="img-parrain2 " src="<?php echo base_url("assets/image/wallpaper.png");?>">
                     

                </div>
              </div>
            </div>
            </div>
            </div>
       </div><br>
        <br>

            
 
  </div>
</div>
                  
      <!-- liste des orientation--> 


  



         <!-- liste des orientation--> 
       
</div>
</div>
</div> 

</div>
     
</body>
<footer style="margin-top: 200px">
        <?php include("assets/include/footer.php");?>
  </footer>
</html>