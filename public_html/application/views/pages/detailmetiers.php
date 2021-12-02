<!DOCTYPE html>
<html lang="fr">
  <head>
      <meta charset="utf-8"> 
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>GDC - Guides des metiers</title>
      <?php include("assets/include/head.php");?>
      
  </head>
    
  
  <body>
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
       <!-- sommaire vers le contenu d'un groupe -->
        <a href="<?php echo site_url('Citemetiers_Controller/listemetiers/1');?>" class="btn" style="margin-left:7%;margin-top:1%;height:40px" type="submit">Retour</a>

        <div class="container" style="margin-top:2%;">
            <div class="row">
                <div class="col-12" style="margin:auto">
                    <div class="card">
                        <div class="container" style="margin-top:3%">
                            <div class="row">
                                <div class="col-12">

                                   <?php if($iddetail ==1){?> 

                        <h5 class="titre-liste-guides text-center">Contenu du guide Biologiste </h5>
                          <div
                           class="canva-embed"
                           data-design-id="DAEH60_POh4"
                           data-height-ratio="1.4143"
                           style="padding:141.4286% 5px 5px 5px;background:rgba(0,0,0,0.03);border-radius:8px;"
                          ></div>
                          <script async src="https:&#x2F;&#x2F;sdk.canva.com&#x2F;v1&#x2F;embed.js"></script>
                          

                                    <?php } else if ($iddetail ==2) {?>

                        <h5 class="titre-liste-guides text-center">Contenu du guide Ingénieur Agronome </h5>

                        <div
                           class="canva-embed"
                           data-design-id="DAEILZCIFn4"
                           data-height-ratio="1.4143"
                           style="padding:141.4286% 5px 5px 5px;background:rgba(0,0,0,0.03);border-radius:8px;"
                          ></div>
                          <script async src="https:&#x2F;&#x2F;sdk.canva.com&#x2F;v1&#x2F;embed.js"></script>
                                 

                                    
                                    <?php } else if ($iddetail ==3) {?>

                         <h5 class="titre-liste-guides text-center">Contenu du guide Technicien industries, agroalimentaires </h5>

                       <div
                           class="canva-embed"
                           data-design-id="DAEILMs8v2g"
                           data-height-ratio="1.4143"
                           style="padding:141.4286% 5px 5px 5px;background:rgba(0,0,0,0.03);border-radius:8px;"
                          ></div>
                          <script async src="https:&#x2F;&#x2F;sdk.canva.com&#x2F;v1&#x2F;embed.js"></script>
                                    

                                   
                                    <?php } else if ($iddetail ==4) {?>

                        <h5 class="titre-liste-guides text-center">Contenu du guide Ingénieur / Master en agroalimentaire </h5>

                        <div
                           class="canva-embed"
                           data-design-id="DAEINLLvK5A"
                           data-height-ratio="1.4143"
                           style="padding:141.4286% 5px 5px 5px;background:rgba(0,0,0,0.03);border-radius:8px;"
                          ></div>
                          <script async src="https:&#x2F;&#x2F;sdk.canva.com&#x2F;v1&#x2F;embed.js"></script>          

                                    
                                    <?php } else if ($iddetail ==5) {?>

                        <h5 class="titre-liste-guides text-center">Contenu du guide Eco-conseiller / Consultant écologie </h5>

                        <div
                           class="canva-embed"
                           data-design-id="DAEINEt8pSA"
                           data-height-ratio="1.4143"
                           style="padding:141.4286% 5px 5px 5px;background:rgba(0,0,0,0.03);border-radius:8px;"
                          ></div>
                          <script async src="https:&#x2F;&#x2F;sdk.canva.com&#x2F;v1&#x2F;embed.js"></script>

                                    
                                    <?php } else if ($iddetail ==6) {?>

                        <h5 class="titre-liste-guides text-center">Contenu du guide Ingénieur en environnement </h5>

                        <div
                           class="canva-embed"
                           data-design-id="DAEINSO0O28"
                           data-height-ratio="1.4143"
                           style="padding:141.4286% 5px 5px 5px;background:rgba(0,0,0,0.03);border-radius:8px;"
                          ></div>
                          <script async src="https:&#x2F;&#x2F;sdk.canva.com&#x2F;v1&#x2F;embed.js"></script>       


                                  <?php } else if ($iddetail ==7) {?>

                        <h5 class="titre-liste-guides text-center">Contenu du guide Ingénieur Informatique Industrielle </h5>

                        <div style="position: relative; width: 100%; height: 0; padding-top: 141.4286%;
                         padding-bottom: 48px; box-shadow: 0 2px 8px 0 rgba(63,69,81,0.16); margin-top: 1.6em; margin-bottom: 0.9em; overflow: hidden;
                         border-radius: 8px; will-change: transform;">
                          <iframe style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; border: none; padding: 0;margin: 0;"
                            src="https:&#x2F;&#x2F;www.canva.com&#x2F;design&#x2F;DAEYpg75uII&#x2F;view?embed">
                          </iframe>
                        </div>
                                  <?php } else if ($iddetail ==8) {?>

                        <h5 class="titre-liste-guides text-center">Contenu du guide Ingénieur Big Data </h5>

                        <div style="position: relative; width: 100%; height: 0; padding-top: 141.4286%;
                         padding-bottom: 48px; box-shadow: 0 2px 8px 0 rgba(63,69,81,0.16); margin-top: 1.6em; margin-bottom: 0.9em; overflow: hidden;
                         border-radius: 8px; will-change: transform;">
                          <iframe style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; border: none; padding: 0;margin: 0;"
                            src="https:&#x2F;&#x2F;www.canva.com&#x2F;design&#x2F;DAEYpoVxe74&#x2F;view?embed">
                          </iframe>
                        </div>                                   

                                  <?php } else if ($iddetail ==9) {?>

                        <h5 class="titre-liste-guides text-center">Contenu du guide Ingénieur Informaticien </h5>

                        <div style="position: relative; width: 100%; height: 0; padding-top: 141.4286%;
                         padding-bottom: 48px; box-shadow: 0 2px 8px 0 rgba(63,69,81,0.16); margin-top: 1.6em; margin-bottom: 0.9em; overflow: hidden;
                         border-radius: 8px; will-change: transform;">
                          <iframe style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; border: none; padding: 0;margin: 0;"
                            src="https:&#x2F;&#x2F;www.canva.com&#x2F;design&#x2F;DAEYpb2dUrY&#x2F;view?embed">
                          </iframe>
                        </div>
                                       
                                  <?php } else if ($iddetail ==10) {?>

                        <h5 class="titre-liste-guides text-center">Contenu du guide Administrateur de base de données </h5>

                        <div style="position: relative; width: 100%; height: 0; padding-top: 141.4286%;
                         padding-bottom: 48px; box-shadow: 0 2px 8px 0 rgba(63,69,81,0.16); margin-top: 1.6em; margin-bottom: 0.9em; overflow: hidden;
                         border-radius: 8px; will-change: transform;">
                          <iframe style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; border: none; padding: 0;margin: 0;"
                            src="https:&#x2F;&#x2F;www.canva.com&#x2F;design&#x2F;DAEYpZnJX-k&#x2F;view?embed">
                          </iframe>
                        </div>                                  

                                  <?php } else if ($iddetail ==11) {?>

                        <h5 class="titre-liste-guides text-center">Contenu du guide Administrateur systèmes et réseaux </h5>

                        <div style="position: relative; width: 100%; height: 0; padding-top: 141.4286%;
                         padding-bottom: 48px; box-shadow: 0 2px 8px 0 rgba(63,69,81,0.16); margin-top: 1.6em; margin-bottom: 0.9em; overflow: hidden;
                         border-radius: 8px; will-change: transform;">
                          <iframe style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; border: none; padding: 0;margin: 0;"
                            src="https:&#x2F;&#x2F;www.canva.com&#x2F;design&#x2F;DAEYpjZYHJ8&#x2F;view?embed">
                          </iframe>
                        </div>

                                  <?php } else if ($iddetail ==12) {?>

                        <h5 class="titre-liste-guides text-center">Architecte de réseau </h5>

                        <div style="position: relative; width: 100%; height: 0; padding-top: 141.4286%;
                         padding-bottom: 48px; box-shadow: 0 2px 8px 0 rgba(63,69,81,0.16); margin-top: 1.6em; margin-bottom: 0.9em; overflow: hidden;
                         border-radius: 8px; will-change: transform;">
                          <iframe style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; border: none; padding: 0;margin: 0;"
                            src="https:&#x2F;&#x2F;www.canva.com&#x2F;design&#x2F;DAEYpo_cbRA&#x2F;view?embed">
                          </iframe>
                        </div>
                                   
                                  <?php } else if ($iddetail ==13) {?>

                        <h5 class="titre-liste-guides text-center">Contenu du guide Intégrateur Web </h5>

                       <div style="position: relative; width: 100%; height: 0; padding-top: 141.4286%;
                       padding-bottom: 48px; box-shadow: 0 2px 8px 0 rgba(63,69,81,0.16); margin-top: 1.6em; margin-bottom: 0.9em; overflow: hidden;
                       border-radius: 8px; will-change: transform;">
                        <iframe style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; border: none; padding: 0;margin: 0;"
                          src="https:&#x2F;&#x2F;www.canva.com&#x2F;design&#x2F;DAEbNFvCSI0&#x2F;view?embed">
                        </iframe>
                      </div>

                                    <?php } else if ($iddetail ==14) {?>

                        <h5 class="titre-liste-guides text-center">Contenu du guide Technicien de réseau </h5>
                        <div style="position: relative; width: 100%; height: 0; padding-top: 141.4286%;
                       padding-bottom: 48px; box-shadow: 0 2px 8px 0 rgba(63,69,81,0.16); margin-top: 1.6em; margin-bottom: 0.9em; overflow: hidden;
                       border-radius: 8px; will-change: transform;">
                        <iframe style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; border: none; padding: 0;margin: 0;"
                          src="https:&#x2F;&#x2F;www.canva.com&#x2F;design&#x2F;DAEbNE6bc-c&#x2F;view?embed">
                        </iframe>
                      </div> 

                                    <?php } else if ($iddetail ==15) {?>

                        <h5 class="titre-liste-guides text-center">Contenu du guide Web Designer </h5>
                        <div style="position: relative; width: 100%; height: 0; padding-top: 141.4286%;
                         padding-bottom: 48px; box-shadow: 0 2px 8px 0 rgba(63,69,81,0.16); margin-top: 1.6em; margin-bottom: 0.9em; overflow: hidden;
                         border-radius: 8px; will-change: transform;">
                          <iframe style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; border: none; padding: 0;margin: 0;"
                            src="https:&#x2F;&#x2F;www.canva.com&#x2F;design&#x2F;DAEbNNJFA34&#x2F;view?embed">
                          </iframe>
                        </div>
                
                                    <?php } else if ($iddetail ==16) {?>

                        <h5 class="titre-liste-guides text-center">Contenu du guide Web Master </h5>
                        <div style="position: relative; width: 100%; height: 0; padding-top: 141.4286%;
                         padding-bottom: 48px; box-shadow: 0 2px 8px 0 rgba(63,69,81,0.16); margin-top: 1.6em; margin-bottom: 0.9em; overflow: hidden;
                         border-radius: 8px; will-change: transform;">
                          <iframe style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; border: none; padding: 0;margin: 0;"
                            src="https:&#x2F;&#x2F;www.canva.com&#x2F;design&#x2F;DAEbNUsg9Fw&#x2F;view?embed">
                          </iframe>
                        </div>                           

                                    <?php } else if ($iddetail ==17) {?>

                        <h5 class="titre-liste-guides text-center">Contenu du guide Aide-soignant / Aide-soignante </h5>
                        <div style="position: relative; width: 100%; height: 0; padding-top: 141.4286%;
                         padding-bottom: 48px; box-shadow: 0 2px 8px 0 rgba(63,69,81,0.16); margin-top: 1.6em; margin-bottom: 0.9em; overflow: hidden;
                         border-radius: 8px; will-change: transform;">
                          <iframe style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; border: none; padding: 0;margin: 0;"
                            src="https:&#x2F;&#x2F;www.canva.com&#x2F;design&#x2F;DAEeh8lriCk&#x2F;view?embed">
                          </iframe>
                        </div>                               

                                    <?php } else if ($iddetail ==18) {?>

                        <h5 class="titre-liste-guides text-center">Contenu du guide Technicien en analyses biomédicales / Technicienne en analyses biomédicales </h5>
                        <div style="position: relative; width: 100%; height: 0; padding-top: 141.4286%;
                         padding-bottom: 48px; box-shadow: 0 2px 8px 0 rgba(63,69,81,0.16); margin-top: 1.6em; margin-bottom: 0.9em; overflow: hidden;
                         border-radius: 8px; will-change: transform;">
                          <iframe style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; border: none; padding: 0;margin: 0;"
                            src="https:&#x2F;&#x2F;www.canva.com&#x2F;design&#x2F;DAEeh0ZJeho&#x2F;view?embed">
                          </iframe>
                        </div>

                                    <?php } else if ($iddetail ==19) {?>

                        <h5 class="titre-liste-guides text-center">Contenu du guide Infirmier / Infirmière </h5>
                        <div style="position: relative; width: 100%; height: 0; padding-top: 141.4286%;
                         padding-bottom: 48px; box-shadow: 0 2px 8px 0 rgba(63,69,81,0.16); margin-top: 1.6em; margin-bottom: 0.9em; overflow: hidden;
                         border-radius: 8px; will-change: transform;">
                          <iframe style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; border: none; padding: 0;margin: 0;"
                            src="https:&#x2F;&#x2F;www.canva.com&#x2F;design&#x2F;DAEehpLabYU&#x2F;view?embed">
                          </iframe>
                        </div>    

                                   <?php } else if ($iddetail ==20) {?>

                        <h5 class="titre-liste-guides text-center">Contenu du guide Sage-Femme </h5>
                        <div style="position: relative; width: 100%; height: 0; padding-top: 141.4286%;
                         padding-bottom: 48px; box-shadow: 0 2px 8px 0 rgba(63,69,81,0.16); margin-top: 1.6em; margin-bottom: 0.9em; overflow: hidden;
                         border-radius: 8px; will-change: transform;">
                          <iframe style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; border: none; padding: 0;margin: 0;"
                            src="https:&#x2F;&#x2F;www.canva.com&#x2F;design&#x2F;DAEehgCj7I0&#x2F;view?embed">
                          </iframe>
                        </div>                

                                    <?php } else if ($iddetail ==1000) {?>
                        <h5 class="titre-liste-guides text-center">Contenu du guide Epicerie </h5>

                                        <div style="position: relative; width: 100%; height: 0; padding-top: 250.0000%;
 padding-bottom: 48px; box-shadow: 0 2px 8px 0 rgba(63,69,81,0.16); margin-top: 1.6em; margin-bottom: 0.9em; overflow: hidden;
 border-radius: 8px; will-change: transform;">
  <iframe loading="lazy" style="position: absolute; width: 100%; height: 100%; top: 0; left: 0; border: none; padding: 0;margin: 0;"
    src="https:&#x2F;&#x2F;www.canva.com&#x2F;design&#x2F;DAET6-dVLqE&#x2F;view?embed">
  </iframe>
</div>
                                    <?php }?>
                       
                        </div>
                        
            </div>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
        
      
      
        
    
      <!-- fin main body -->
      


      
      
  </body>
  <footer style="margin-top: 200px">
        <?php include("assets/include/footer.php");?>
  </footer>

</html>