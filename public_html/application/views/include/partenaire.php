<div class="mobile-only" style="margin-bottom:2%;margin-top: 4em;" >
  <h5 style="color:rgb(110,110,110);"class="text-center">Partenaires :</h5>
  <?php if($partenaires != null){?>
        <div  style="text-align: center;">
            <div class="col-12"> 
        
               <?php foreach($partenaires as $partenaire) { ?>
              <p> 
              <a href="<?php echo $partenaire->DESCRIPTION_PARTENAIRE;?>">  
                <img  class="img-fluid" style="border-radius: 0.35rem; background-clip: border-box; grid-column-start:1; grid-column-end:9; border: 1px solid #e3e6f0;" src="<?php echo base_url()?>/assets/image/<?php echo $partenaire->IMAGE_PARTENAIRE;?>" />
              </a> 
              </p>
               <?php } ?>
             
            </div>      
        </div>
  <?php } else { ?>
    <div  style="text-align: center;">
            <div class="col-12"> 
              <p> 
               <img  class="img-fluid"style="border-radius: 0.35rem; background-clip: border-box; grid-column-start:1; grid-column-end:9; border: 1px solid #e3e6f0;" src="https://dummyimage.com/100x90/55595c/fff"  />
               </p> 
              <p> 
              <a href="http://www.cci.mg">  
                <img  class="img-fluid" style="border-radius: 0.35rem; background-clip: border-box; grid-column-start:1; grid-column-end:9; border: 1px solid #e3e6f0;" src="https://dummyimage.com/100x90/55595c/fff" />
              </a> </p>
              <p> 
              <a href="http://www.gem-madagascar.com">  
                <img  class="img-fluid" style="border-radius: 0.35rem; background-clip: border-box; grid-column-start:1; grid-column-end:9; border: 1px solid #e3e6f0;" src="https://dummyimage.com/100x90/55595c/fff" />
              </a> </p> 
              <p> 
              <a href="http://www.gfem-madagascar.com">  
                <img class="img-fluid" style="border-radius: 0.35rem; background-clip: border-box; grid-column-start:1; grid-column-end:9; border: 1px solid #e3e6f0;" src="https://dummyimage.com/100x90/55595c/fff" />
              </a> </p> 
            </div>      
        </div>
  <?php } ?>
</div>
<div class="web-only" style="margin-top:4%;">
<h3 class="text-center">Partenaires :</h3>
     <br>
     <?php if($partenaires != null) { ?>
        <div class="container" style="text-align:center;float:none;">
        
          <div class="row" >
          <?php foreach($partenaires as $partenaire){?>
          <div class="col-2" style="border-style: solid;border-color:rgba(135, 206, 250,0.8);border-radius:0.35rem;margin-left:7%;"> 
 
            <a href="<?php echo $partenaire->DESCRIPTION_PARTENAIRE;?>">  
              <img  class="img-fluid" style="margin:auto;margin-top:15%;" src="<?php echo base_url()?>/assets/image/<?php echo $partenaire->IMAGE_PARTENAIRE;?>" />
            </a>
           
         </div>
         <?php }?>
        </div>     
      </div> 
     <?php } else { ?>
      <div class="container" style="text-align:center;float:none;">
          <div class="row" >
            <div class="col-2" style="border-style: solid;border-color:rgba(135, 206, 250,0.8);border-radius:0.35rem;margin-left:7%"> 
               <img  class="img-fluid" style="margin:auto;margin-top:5%;margin-bottom:5%" src="https://dummyimage.com/400x150/55595c/fff"  />
            </div> 
            <div class="col-2" style="border-style: solid;border-color:rgba(135, 206, 250,0.8);border-radius:0.35rem;margin-left:7%;"> 
              <a href="http://www.cci.mg">  
                <img  class="img-fluid" style="margin:auto;margin-top:5%;margin-bottom:5%" src="https://dummyimage.com/400x150/55595c/fff" />
              </a> 
            </div> 
            <div class="col-2" style="border-style: solid;border-color:rgba(135, 206, 250,0.8);border-radius:0.35rem;margin-left:7%;"> 
              <a href="http://www.gem-madagascar.com">  
                <img  class="img-fluid" style="margin:auto;margin-top:5%;margin-bottom:5%" src="https://dummyimage.com/400x150/55595c/fff" />
              </a> 
            </div> 
            <div class="col-2" style="border-style: solid;border-color:rgba(135, 206, 250,0.8);border-radius:0.35rem;margin-left:7%;"> 
              <a href="http://www.gfem-madagascar.com">  
                <img class="img-fluid" style="margin:auto;margin-top:5%;margin-bottom:5%" src="https://dummyimage.com/400x150/55595c/fff" />
              </a> 
            </div> 
            </div>     
            </div> 
     <?php } ?>     
</div>