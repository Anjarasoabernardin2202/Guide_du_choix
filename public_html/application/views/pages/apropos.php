<!DOCTYPE html>
<html lang="fr">
  <head>
      <meta charset="utf-8"> 
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>GDC - A propos</title>
      <?php include("assets/include/head.php");?>
      <style>
        .rotate{
        -webkit-transform: rotate(90deg);  /* Chrome, Safari, Opera */
          -moz-transform: rotate(90deg);  /* Firefox */
          -ms-transform: rotate(90deg);  /* IE 9 */
            transform: rotate(90deg);  /* Standard syntax */    
        }
    </style>
  </head>
    
  <body>
  <?php
  $this->load->view("include/visitor_counter.php");
  ?>

    <!-- navbar tout en haut en bleu -->
    <?php $this->load->view("include/navbar1.php");?>      
    <!-- fin navbar tout en haut en bleu -->

    <!-- navbar principal -->
    
        <?php include("assets/include/header.php");?>
     
    <!-- fin navbar principal -->

          
      

      <!-- arborescence du site -->
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb py-0 bleuu">
          <li class="breadcrumb-item "><a class="arborescence" href="<?php echo site_url("Accueil_Controller/");?>">Accueil</a></li>
          <li class="breadcrumb-item "><a class="arborescence" href="#">A propos</a></li>
        </ol>
      </nav>
      <!-- arborescence du site -->

      <!-- main body -->
      <div class="web-only">
      <?php if($idpage == 1) {?>
      <div class="container" style="margin-top:3%;margin-bottom:3%">
      <div class="row" style="margin-left:7%;">
      <div class="col-12">
      <div class="wrapper-apropos">
          <div class="introduction-apropos">
            <h4 class="titre-apropos"> A propos de nous</h4>
              <p class="intro-about" style="float:left">
              Pour mieux nous connaître, nous vous invitons à parcourir cette page à travers différentes questions que les PME, associations professionnelles ou chambres de métiers ainsi que les jeunes talents se posent.
              </p>
          </div>

          <!-- Espace pour les video et gallery , inscription --->
          <section class="container p-2">




          </section>
          <!-- Espace pour les video et gallery --->

           <div class="body-apropos">
              <div class="background-about">
                <div class="row">
                  <div class="col-6">
                    <img class="img-apropos" src="<?php echo base_url();?>/assets/image/apropos.png">
                  </div>
                  <div class="col-6">
                      <div class="accordion">
                        <p class="text-center"> Au fait c’est quoi guiduchoix24 ? Qui en sont les bénéficiaires ? Et comment ça marche ?</p>
                      </div>
                  </div>
                  <div class="col-4">
                  <img class="img-gdc24" src="<?php echo base_url();?>/assets/image/gdc24.png">

                 
                  </div>
                
                  <div class="col-4">
                    <p class="ecoute">  Ecoutez-moi <span><i id="fermer" class="fa fa-times"></i></span></p>
                  </div>
                  <div class="col-4">
                  <audio class="audio-personnalise" id="audio1" src="<?php echo base_url();?>/assets/interview/interview.mp3" controls>
                    </audio>
                  </div>
                </div>
                  
             
                <div class="reponse-about" id="reponse">
                  <div id="str"></div>
                </div>
     

              </div>
              <div class="background-about">
                  <div class="row">
                    <div class="col-6">
                      <img class="img-apropos" src="<?php echo base_url();?>/assets/image/apropos1.png">
                    </div>
                    <div class="col-6">
                        <div class="accordion"  >
                          <a style="text-decoration:none;" >Ok, nous aimerions encore bien comprendre quel est l’idée de base précise qui a conduit à sa création ? 
                          </a>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                    <div class="col-4">
                  <img class="img-gdc24" src="<?php echo base_url();?>/assets/image/gdc24.png">
      </div>
      <div class="col-4">
                  <a data-toggle="collapse" data-target="#reponse" id="question" > <p class="lire">Lisez moi <i class="fa fa-chevron-down"></i></p></a>
      </div>
      </div>
                  <div id="reponse" class="collapse" data-parent="#question">
                  <div class="reponse-about" id="reponse">
                      <p>
                      Nous pensons qu’un mauvais choix, une erreur d’achat d`un produit ou service pourraient avoir des conséquences financières graves pour le micro-entrepreneur, ceci pouvant même compromettre l’avenir de son entreprise. Il en est de même pour un jeune talent sans encadrement ou mal accompagné qui risquerait également de compromettre ses dons ou son avenir.
                      </p>
                  </div>
      </div>
                </div>
                    <a href="<?php echo site_url("Apropos_Controller/about");?>/2"><button  id="suivant" type="submit" class="btn primary">Suivant</button></a>
                </div>    
               
          
          
            </div>
      </div>
        </div>
        
      </div>
      <script>
   
   var string = "L\’association Guiduchoix24 est une initiative pour promouvoir et développer les petites et moyennes entreprises (PME) ainsi que les jeunes talents des domaines sportifs et loisirs créatifs de l\’Océan Indien et de l\’Afrique.- D\’une part, elle aide les PME en les accompagnant bénévolement dans leurs choix de matériels et services. Et pour cela elle met gratuitement à leur disposition divers guides conseils pratiques ou des avis d’un expert à travers son mini portail Web Leconseiller Entreprises. Elle organise également des ateliers de conseils pour les PME.  - D\’autre part, elle accompagne, à travers des dispositifs éducatifs de son mini portail Web Guidutalent, le développement des jeunes talents sportifs et loisirs créatifs. Par l’aide des tuteurs bénévoles, elle organise également pour eux des ateliers pratiques.";
          
            var bouton = document.getElementById("audio1");
           
         
            var str = string.split("");
          
  
            var el = document.getElementById('str');
   
  
            var reponse = document.getElementById('reponse');
 
            
            var running;
          
            bouton.addEventListener("play",function(){
                (function animate() {
                    if(str.length>0){
                      el.innerHTML += str.shift();
                      running = setTimeout(animate,65);
                      console.log(str.length);
                    }    
                    else if(str.length===0){
                      el.innerHTML = "";
                      str = string.split("");
                      str.length = 824;
                      console.log(str.length);
                    }
                    else{
                      clearTimeout(running);
                    }
              })();
            });
            bouton.addEventListener("pause",function(){
              (function inanimate(){
                clearTimeout(running);
              })();
            });
            var fermer = document.getElementById("fermer");
            fermer.addEventListener("click",function(){
              (function close(){
                bouton.pause();
                bouton.currentTime = 0;
                if(str.length > 0 || str.length === 0) {
                  el.innerHTML = "";
                  str = string.split("");
                  str.length = 824;
                } 
              })();
            
            });
         </script>
      <?php } else if($idpage == 2) { ?>
        <div class="container" style="margin-top:3%;margin-bottom:3%">
      <div class="row" style="margin-left:7%;">
      <div class="col-12">
      <div class="wrapper-apropos">
          <div class="introduction-apropos">
            <h4 class="titre-apropos"> A propos de nous(suite)</h4>
              <p class="intro-about">
              Pour mieux nous connaître, nous vous invitons à parcourir cette page à travers différentes questions que les PME, associations professionnelles ou chambres de métiers ainsi que les jeunes talents se posent.
              </p>
          </div>
           <div class="body-apropos">
            
                <div class="background-about">
                    <div class="row">
                      <div class="col-6">
                        <img class="img-apropos" src="<?php echo base_url();?>/assets/image/apropos2.png">
                      </div>
                      <div class="col-6">
                          <div class="accordion"  id="question3">
                          <p class="text-center"> Et pouvez-vous nous dire qui est-ce qui pourrait y adhérer ? Et Comment ça marche avec l’adhésion ? Est-ce payant ?</p>
                          </div>
                      </div>
                      <div class="col-4">
                      <img class="img-gdc24" src="<?php echo base_url();?>/assets/image/gdc24.png">
                      
                      </div>
                      <div class="col-4">
                        <p class="ecoute"> Ecoutez-moi  <span><i id="fermer2" class="fa fa-times"></i></span></p>
                      </div>
                      <div class="col-4">
                      <audio class="audio-personnalise" id="audio2" src="<?php echo base_url();?>/assets/interview/interview2.mp3" controls>
                        </audio>
                      </div>
                    </div>
                    <div class="reponse-about" id="reponse2">
                      <div id="str2"></div>
                

                    </div>
                  </div>
                  <div class="background-about">
                      <div class="row">
                        <div class="col-6">
                          <img class="img-apropos" src="<?php echo base_url();?>/assets/image/apropos3.png">
                        </div>
                        <div class="col-6">
                            <div class="accordion"  id="question4">
                            <p class="text-center">  Ok pourriez-vous me donner plus de précisions sur vos outils de guide conseils pour PME ?</p>
                            </div>
                        </div>
                        <div class="col-4">
                        <img class="img-gdc24" src="<?php echo base_url();?>/assets/image/gdc24.png">
                        </div>
                        <div class="col-4">
                        <p class="ecoute"> Ecoutez-moi  <span><i id="fermer3" class="fa fa-times"></i></span></p>
                         
                        </div>
                        <div class="col-4">
                          <audio class="audio-personnalise" id="audio3" src="<?php echo base_url();?>/assets/interview/interview3.mp3" controls>
                          </audio>
                        </div>
                      </div>
                      <div class="reponse-about" id="reponse3">
                        <div id="str3"></div>
        

                      </div>
                    </div>
                    <div class="background-about">
                        <div class="row">
                          <div class="col-6">
                            <img class="img-apropos" src="<?php echo base_url();?>/assets/image/apropos4.png">
                          </div>
                          <div class="col-6">
                              <div class="accordion">
                              <p class="text-center">  Ok pourriez-vous nous donner plus de précisions sur vos outils de guide conseils pour les jeunes talent ?</p>
                              </div>
                          </div>
                          <div class="col-4">
                          <img class="img-gdc24" src="<?php echo base_url();?>/assets/image/gdc24.png">

                          
                          </div>
                          <div class="col-4">
                        <p class="ecoute"> Ecoutez-moi  <span><i id="fermer4" class="fa fa-times"></i></i></span></p>

                          </div>
                          <div class="col-4">
                          <audio class="audio-personnalise" id="audio4" src="<?php echo base_url();?>/assets/interview/interview4.mp3" controls>
                            </audio>
                          </div>
                        </div>
                        <div class="reponse-about" id="reponse4">
                          <div id="str4"></div>
                 

                        </div>
                    </div>
                    <a href="<?php echo site_url("Apropos_Controller/about");?>/1"><button id="precedent" type="submit" class="btn primary">Précédent</button></a>
                </div>    
               
          
      </div>
      </div>
      </div>
      </div>
      <script>
   
  
            var txt2 = "Peut adhérer, toutes petites moyennes entreprises respectant nos conditions et notre caractère non religieux et apolitique; et il en est de même pour les jeunes talents, toutes personnes physiques ou morales qui veulent des conseils ou accompagnement dans sa discipline respective.Pour les PME l’adhésion se fait soit en groupe à travers les syndicats ou associations professionnelles ou alors individuellement à travers le bouton inscription.Et pour les jeunes talents l’adhésion se passe en groupe à travers leurs associations ou écoles ou universités.Sauf exception, ces services sont gratuits pour les PME et pour les jeunes talents.";
            var txt3 = "A travers le mini portail Leconseiller Entreprises, nous mettons à la disposition des PME une série de guides pratiques sur divers thèmes leur permettant d’éviter au quotidien mauvais choix, une erreur d’achat d`un produit ou service. Et en collaboration avec les associations professionnelles ou chambres de métiers, nous organisons des ateliers présentiels et pratiques d’une journée mais dont le programme et le déroulement font l’objet d’une communication à part.Vous pourriez aussi lire d’autres articles de nos experts d’un domaine respectif ou leur poser des questions en leur adressant un message sur place qui vous sera indiqué.";
            var txt4 = "A travers le mini portail Guidutalent, nous mettons à la disposition des jeunes talents sportifs et loisirs créatifs une série de dispositifs éducatifs textes ou multimédias dans diverses disciplines et seront accompagnés par des tuteurs bénévoles ou encadreurs de leurs associations respectives. Et en collaboration avec les associations ou instances publiques jeunesse ou avec les communes, nous organisons des ateliers présentiels et pratiques d’une journée mais dont le programme et le déroulement font l’objet d’une communication à part.";
  
            
            var audio2 = document.getElementById("audio2");
            var audio3 = document.getElementById("audio3");
            var audio4 = document.getElementById("audio4");
         
           
            var str2 = txt2.split("");
            var str3 = txt3.split("");
            var str4 = txt4.split("");
  
            
            var el2 = document.getElementById('str2');
            var el3 = document.getElementById('str3');
            var el4 = document.getElementById('str4');
  
            var reponse2 = document.getElementById('reponse2');
            var reponse3 = document.getElementById('reponse3');
            var reponse4 = document.getElementById('reponse4');
            
        
            var running2;
            var running3;
            var running4;
  
  
        
            audio2.addEventListener("play",function(){
              (function animate() {
                if(str2.length>0){
                      el2.innerHTML += str2.shift();
                      running2 = setTimeout(animate,65);
                      console.log(str2.length);
                }    
                else if(str2.length===0){
                  el2.innerHTML = "";
                  console.log(string);
                  str2 = txt2.split("");
                  str2.length = 636;
                  console.log(str2.length);
                }
                else{
                  clearTimeout(running2);
                }
              })();
            });
            audio2.addEventListener("pause",function(){
              (function inanimate(){
                clearTimeout(running2);
              })();
            });
            var fermer2 = document.getElementById("fermer2");
            fermer2.addEventListener("click",function(){
              audio2.pause();
              audio2.currentTime = 0;
              if(str2.length > 0  || str2.length === 0) {
                el2.innerHTML = "" ;
                str2 = txt2.split("");
                str2.length = 636;
              } 
            });
  
            audio3.addEventListener("play",function(){
              (function animate() {
                if(str3.length>0){
                      el3.innerHTML += str3.shift();
                      running3 = setTimeout(animate,63);
                      console.log(str3.length);
                }    
                else if(str3.length===0){
                  el3.innerHTML = "";
                  //console.log(string);
                  str3 = txt3.split("");
                  str3.length = 636;
                  console.log(str3.length);
                }
                else{
                  clearTimeout(running3);
                }
              })();
            });
            audio3.addEventListener("pause",function(){
              (function inanimate(){
                clearTimeout(running3);
              })();
            });
            var fermer3 = document.getElementById("fermer3");
            fermer3.addEventListener("click",function(){
              audio3.pause();
              audio3.currentTime = 0;
              if(str3.length > 0  || str3.length === 0) {
                el3.innerHTML = "" ;
                str3 = txt3.split("");
                str3.length = 636;
              } 
            });
          
  
            audio4.addEventListener("play",function(){
              (function animate() {
                if(str4.length>0){
                      el4.innerHTML += str4.shift();
                      running4 = setTimeout(animate,60);
                      console.log(str4.length);
                }    
                else if(str4.length===0){
                  el4.innerHTML = "";
                  // console.log(string);
                  str4 = txt4.split("");
                  str4.length = 541;
                  console.log(str4.length);
                }
                else{
                  clearTimeout(running4);
                }
              })();
            });
  
            audio4.addEventListener("pause",function(){
              (function inanimate(){
                clearTimeout(running4);
              })();
            });
            var fermer4 = document.getElementById("fermer4");
            fermer4.addEventListener("click",function(){
              audio4.pause();
              audio4.currentTime = 0;
              if(str4.length > 0  || str4.length === 0) {
                el4.innerHTML = "" ;
                str4 = txt4.split("");
                str4.length = 541;
              } 
            });
            
      
           
  
         </script>
        
      <?php } ?>
      </div>
     
      
          <div class="mobile-only">
      <?php if($idpage == 1) {?>
      <div class="container" style="margin-top:3%;margin-bottom:3%">
      <div class="row" style="margin-left:7%;">
      <div class="col-12">
      <div class="wrapper-apropos">
          <div class="introduction-apropos">
            <h4 class="titre-apropos"> A propos de nous (1/5)</h4>
              <p class="intro-about" style="float:left">
              Pour mieux nous connaître, nous vous invitons à parcourir cette page à travers différentes questions que les PME, associations professionnelles ou chambres de métiers ainsi que les jeunes talents se posent.
              </p>
          </div>
        </div>
           <div class="body-apropos">
              <div class="background-about">
                <div class="row">
                  <div class="col-11">
                      <div class="accordion">
                        <p class="text-center"> Au fait c’est quoi guiduchoix24 ? Qui en sont les bénéficiaires ? Et comment ça marche ?</p>
                      </div>
                  </div>
                  <div class="col-4">
                  <img class="img-gdc24" src="<?php echo base_url();?>/assets/image/gdc24.png">
                  </div>
                
                  <div class="col-4">
                    <p class="ecoute">  Ecoutez-moi <span><i id="fermer1" class="fa fa-times"></i></span></p>
                  </div>
                  <div class="col-4">
                  <audio class="audio-personnalise" id="audio11" src="<?php echo base_url();?>/assets/interview/interview.mp3" controls>
                    </audio>
                  
                  </div>
                </div>
                <div class="reponse-about" id="reponse1">
                  <div id="str1"></div>
                </div>
              
                <a href="<?php echo site_url("Apropos_Controller/about");?>/2"><button  id="suivant" type="submit" class="btn primary">Suivant</button></a>
      </div>
              </div>
          </div>
        </div>
      </div>
      <script>
          var string1 = "L\’association Guiduchoix24 est une initiative pour promouvoir et développer les petites et moyennes entreprises (PME) ainsi que les jeunes talents des domaines sportifs et loisirs créatifs de l\’Océan Indien et de l\’Afrique.- D\’une part, elle aide les PME en les accompagnant bénévolement dans leurs choix de matériels et services. Et pour cela elle met gratuitement à leur disposition divers guides conseils pratiques ou des avis d’un expert à travers son mini portail Web Leconseiller Entreprises. Elle organise également des ateliers de conseils pour les PME.  - D\’autre part, elle accompagne, à travers des dispositifs éducatifs de son mini portail Web Guidutalent, le développement des jeunes talents sportifs et loisirs créatifs. Par l’aide des tuteurs bénévoles, elle organise également pour eux des ateliers pratiques.";
          var bouton1 = document.getElementById("audio11");
          var str1 = string1.split("");
          var el1 = document.getElementById('str1');
          var reponse1 = document.getElementById('reponse1');
          var running1;
          bouton1.addEventListener("play",function(){
            console.log("wi");     
              (function animate() {
                  if(str1.length>0){
                    el1.innerHTML += str1.shift();
                    running1 = setTimeout(animate,65);
                    console.log(str1.length);
                  }    
                  else if(str1.length===0){
                    el1.innerHTML = "";
                    str1 = string1.split("");
                    str1.length = 824;
                    console.log(str1.length);
                  }
                  else{
                    clearTimeout(running1);
                  }
            })();
          });
          bouton1.addEventListener("pause",function(){
            (function inanimate(){
              clearTimeout(running1);
            })();
          });
          var fermer1 = document.getElementById("fermer1");
          fermer1.addEventListener("click",function(){
            (function close(){
              bouton1.pause();
              bouton1.currentTime = 0;
              if(str1.length > 0 || str1.length === 0) {
                el1.innerHTML = "";
                str1 = string.split("");
                str1.length = 824;
              } 
            })();
          });
       </script>
      <?php } else if($idpage==2) { ?>
        <div class="container" style="margin-top:3%;margin-bottom:3%">
      <div class="row" style="margin-left:7%;">
      <div class="col-12">
      <h4 class="titre-apropos"> A propos de nous (2/5) </h4>
          <div class="body-apropos">
              <div class="background-about">
                  <div class="row">
                
                    <div class="col-11">
                        <div class="accordion"  >
                          <a style="text-decoration:none;" >Ok, nous aimerions encore bien comprendre quel est l’idée de base précise qui a conduit à sa création ? 
                          </a>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                  <img class="img-gdc24" src="<?php echo base_url();?>/assets/image/gdc24.png">
      </div>
      <div class="col-6">
                  <a data-toggle="collapse" data-target="#reponse" id="question" > <p class="lire">Lisez moi <i class="fa fa-chevron-down"></i></p></a>
      </div>
      </div>
                  <div id="reponse" class="collapse" data-parent="#question">
                  <div class="reponse-about" id="reponse">
                      <p>
                      Nous pensons qu’un mauvais choix, une erreur d’achat d`un produit ou service pourraient avoir des conséquences financières graves pour le micro-entrepreneur, ceci pouvant même compromettre l’avenir de son entreprise. Il en est de même pour un jeune talent sans encadrement ou mal accompagné qui risquerait également de compromettre ses dons ou son avenir.
                      </p>
                  </div>
      </div>
                </div>
                <a href="<?php echo site_url("Apropos_Controller/about");?>/1"><button  id="precedent" type="submit" class="btn primary">Précédent</button></a>

                    <a href="<?php echo site_url("Apropos_Controller/about");?>/3"><button  id="suivant" type="submit" class="btn primary">Suivant</button></a>
                </div>    
               
          
          
            </div>
      </div>
        </div>
        
     
     
      <?php } else if($idpage == 3) { ?>
        <div class="container" style="margin-top:3%;margin-bottom:3%">
      <div class="row" style="margin-left:7%;">
      <div class="col-12">
      <h4 class="titre-apropos"> A propos de nous (3/5) </h4>
           <div class="body-apropos">
            
                <div class="background-about">
                    <div class="row">
                      <div class="col-11">
                          <div class="accordion"  id="question3">
                          <p class="text-center"> Et pouvez-vous nous dire qui est-ce qui pourrait y adhérer ? Et Comment ça marche avec l’adhésion ? Est-ce payant ?</p>
                          </div>
                      </div>
                      <div class="col-4">
                      <img class="img-gdc24" src="<?php echo base_url();?>/assets/image/gdc24.png">
                      
                      </div>
                      <div class="col-4">
                        <p class="ecoute"> Ecoutez-moi  <span><i id="fermer2" class="fa fa-times"></i></span></p>
                      </div>
                      <div class="col-4">
                      <audio class="audio-personnalise" id="audio2" src="<?php echo base_url();?>/assets/interview/interview2.mp3" controls>
                        </audio>
                      </div>
                    </div>
                    <div class="reponse-about" id="reponse2">
                      <div id="str2"></div>
                

                    </div>
                    <a href="<?php echo site_url("Apropos_Controller/about");?>/2"><button  id="precedent" type="submit" class="btn primary">Précédent</button></a>

<a href="<?php echo site_url("Apropos_Controller/about");?>/4"><button  id="suivant" type="submit" class="btn primary">Suivant</button></a>
                  </div>
      </div>
      </div>
      </div>
      </div>
      <script>
            var txt2 = "Peut adhérer, toutes petites moyennes entreprises respectant nos conditions et notre caractère non religieux et apolitique; et il en est de même pour les jeunes talents, toutes personnes physiques ou morales qui veulent des conseils ou accompagnement dans sa discipline respective.Pour les PME l’adhésion se fait soit en groupe à travers les syndicats ou associations professionnelles ou alors individuellement à travers le bouton inscription.Et pour les jeunes talents l’adhésion se passe en groupe à travers leurs associations ou écoles ou universités.Sauf exception, ces services sont gratuits pour les PME et pour les jeunes talents.";
            
            var audio2 = document.getElementById("audio2");
         
            var str2 = txt2.split("");
       
            var el2 = document.getElementById('str2');
  
            var reponse2 = document.getElementById('reponse2');         
        
            var running2;

            audio2.addEventListener("play",function(){
              (function animate() {
                if(str2.length>0){
                      el2.innerHTML += str2.shift();
                      running2 = setTimeout(animate,65);
                      console.log(str2.length);
                }    
                else if(str2.length===0){
                  el2.innerHTML = "";
                  console.log(string);
                  str2 = txt2.split("");
                  str2.length = 636;
                  console.log(str2.length);
                }
                else{
                  clearTimeout(running2);
                }
              })();
            });
            audio2.addEventListener("pause",function(){
              (function inanimate(){
                clearTimeout(running2);
              })();
            });
            var fermer2 = document.getElementById("fermer2");
            fermer2.addEventListener("click",function(){
              audio2.pause();
              audio2.currentTime = 0;
              if(str2.length > 0  || str2.length === 0) {
                el2.innerHTML = "" ;
                str2 = txt2.split("");
                str2.length = 636;
              } 
            });
         </script>
      <?php } else if($idpage == 4) { ?>
        <div class="container" style="margin-top:3%;margin-bottom:3%">
      <div class="row" style="margin-left:7%;">
      <div class="col-12">
      <h4 class="titre-apropos"> A propos de nous (4/5) </h4>
           <div class="body-apropos">
                  <div class="background-about">
                      <div class="row">
                  
                        <div class="col-11">
                            <div class="accordion"  id="question4">
                            <p class="text-center">  Ok pourriez-vous me donner plus de précisions sur vos outils de guide conseils pour PME ?</p>
                            </div>
                        </div>
                        <div class="col-4">
                        <img class="img-gdc24" src="<?php echo base_url();?>/assets/image/gdc24.png">
                        </div>
                        <div class="col-4">
                        <p class="ecoute"> Ecoutez-moi  <span><i id="fermer3" class="fa fa-times"></i></span></p>
                         
                        </div>
                        <div class="col-4">
                          <audio class="audio-personnalise" id="audio3" src="<?php echo base_url();?>/assets/interview/interview3.mp3" controls>
                          </audio>
                        </div>
                      </div>
                      <div class="reponse-about" id="reponse3">
                        <div id="str3"></div>
        

                      </div>
                      <a href="<?php echo site_url("Apropos_Controller/about");?>/3"><button  id="precedent" type="submit" class="btn primary">Précédent</button></a>
                      <a href="<?php echo site_url("Apropos_Controller/about");?>/5"><button  id="suivant" type="submit" class="btn primary">Suivant</button></a>
                    </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    <script>
   
            var txt3 = "A travers le mini portail Leconseiller Entreprises, nous mettons à la disposition des PME une série de guides pratiques sur divers thèmes leur permettant d’éviter au quotidien mauvais choix, une erreur d’achat d`un produit ou service. Et en collaboration avec les associations professionnelles ou chambres de métiers, nous organisons des ateliers présentiels et pratiques d’une journée mais dont le programme et le déroulement font l’objet d’une communication à part.Vous pourriez aussi lire d’autres articles de nos experts d’un domaine respectif ou leur poser des questions en leur adressant un message sur place qui vous sera indiqué.";
            var audio3 = document.getElementById("audio3");
            var str3 = txt3.split("");
            var el3 = document.getElementById('str3');
            var reponse3 = document.getElementById('reponse3');
            var running3;
            audio3.addEventListener("play",function(){
              (function animate() {
                if(str3.length>0){
                      el3.innerHTML += str3.shift();
                      running3 = setTimeout(animate,63);
                      console.log(str3.length);
                }    
                else if(str3.length===0){
                  el3.innerHTML = "";
                  //console.log(string);
                  str3 = txt3.split("");
                  str3.length = 636;
                  console.log(str3.length);
                }
                else{
                  clearTimeout(running3);
                }
              })();
            });
            audio3.addEventListener("pause",function(){
              (function inanimate(){
                clearTimeout(running3);
              })();
            });
            var fermer3 = document.getElementById("fermer3");
            fermer3.addEventListener("click",function(){
              audio3.pause();
              audio3.currentTime = 0;
              if(str3.length > 0  || str3.length === 0) {
                el3.innerHTML = "" ;
                str3 = txt3.split("");
                str3.length = 636;
              } 
            });
         </script>
      <?php } else if($idpage == 5) { ?>
        <div class="container" style="margin-top:3%;margin-bottom:3%">
      <div class="row" style="margin-left:7%;">
      <div class="col-12">
      <h4 class="titre-apropos"> A propos de nous (5/5)</h4>
           <div class="body-apropos">
                    <div class="background-about">
                        <div class="row">
                         
                          <div class="col-11">
                              <div class="accordion">
                              <p class="text-center">  Ok pourriez-vous nous donner plus de précisions sur vos outils de guide conseils pour les jeunes talent ?</p>
                              </div>
                          </div>
                          <div class="col-4">
                          <img class="img-gdc24" src="<?php echo base_url();?>/assets/image/gdc24.png">

                          
                          </div>
                          <div class="col-4">
                        <p class="ecoute"> Ecoutez-moi  <span><i id="fermer4" class="fa fa-times"></i></i></span></p>

                          </div>
                          <div class="col-4">
                          <audio class="audio-personnalise" id="audio4" src="<?php echo base_url();?>/assets/interview/interview4.mp3" controls>
                            </audio>
                          </div>
                        </div>
                        <div class="reponse-about" id="reponse4">
                          <div id="str4"></div>
                 

                        </div>
                    </div>
                    <a href="<?php echo site_url("Apropos_Controller/about");?>/4"><button id="precedent" type="submit" class="btn primary">Précédent</button></a>
                    <a href="<?php echo site_url("Apropos_Controller/about");?>/1" id="suivant">Retour</a>
                </div>    
               
          
      </div>
      </div>
      </div>
    
      <script>
            var txt4 = "A travers le mini portail Guidutalent, nous mettons à la disposition des jeunes talents sportifs et loisirs créatifs une série de dispositifs éducatifs textes ou multimédias dans diverses disciplines et seront accompagnés par des tuteurs bénévoles ou encadreurs de leurs associations respectives. Et en collaboration avec les associations ou instances publiques jeunesse ou avec les communes, nous organisons des ateliers présentiels et pratiques d’une journée mais dont le programme et le déroulement font l’objet d’une communication à part.";
            var audio4 = document.getElementById("audio4");
            var str4 = txt4.split("");
            var el4 = document.getElementById('str4');
            var reponse4 = document.getElementById('reponse4');
            var running4;
            audio4.addEventListener("play",function(){
              (function animate() {
                if(str4.length>0){
                      el4.innerHTML += str4.shift();
                      running4 = setTimeout(animate,60);
                      console.log(str4.length);
                }    
                else if(str4.length===0){
                  el4.innerHTML = "";
                  // console.log(string);
                  str4 = txt4.split("");
                  str4.length = 541;
                  console.log(str4.length);
                }
                else{
                  clearTimeout(running4);
                }
              })();
            });
  
            audio4.addEventListener("pause",function(){
              (function inanimate(){
                clearTimeout(running4);
              })();
            });
            var fermer4 = document.getElementById("fermer4");
            fermer4.addEventListener("click",function(){
              audio4.pause();
              audio4.currentTime = 0;
              if(str4.length > 0  || str4.length === 0) {
                el4.innerHTML = "" ;
                str4 = txt4.split("");
                str4.length = 541;
              } 
            });  
         </script>
        
      <?php } ?>
      </div>
     
      <!-- fin main body -->

      <div class="container">
          <div class="row">
          
            <div class="inscription-card">
              <div class="col-12 box">
               
                <p class="lead">S'inscrire ici</p>
                <p class="text-muted">Devenez un adhérent</p>

                <hr>
               
                  
              
                    
                      <br>
                <form action="<?php echo site_url()?>" method="post">
                
                <div class="form-group">
                    <label>Email</label>
                    <input  type="text" name="email" class="form-control" style="color:black;width:300px;margin-left:2%">
                   
                     
                  </div>
                  <div class="form-inline">
                  <div class="form-group">
                  <div class="row">
                  <div class="col-6">
                    <label>Entreprise</label>
                    <input  type="text" name="entreprise" class="form-control" style="height:calc(1.5em + .75rem + 2px);color:black;margin-left:2%">
                  </div>
                  <div class="col-6">
                    <label >Activité</label>
                    <input  type="text" name="activite" class="form-control" style="height:calc(1.5em + .75rem + 2px);color:black;margin-left:2%">
                    </div>
                    </div>
                  </div>
                  </div>
                  <div class="form-group">
                    <label>Adresse</label>
                    <input  type="text" name="adresse" class="form-control" style="color:black;width:300px;margin-left:2%">
                  </div>
                <div class="form-group">
                    <label >Nom et prénom</label>
                    <input  type="text" name="nom" class="form-control" style="color:black;width:300px;margin-left:2%">
                  </div>
                
                  <div class="form-group">
               
                    <label >Téléphone</label>
                    <div class="row">
                    <div class="col-4">
                      <select name="idpays" class="form-control" style="color:black">
                         <option value="">Code pays</option>
                          <option value="+212">+212</option>
                          <option value="+230">+230</option>
                          <option value="+237">+237</option>
                          <option value="+261">+261</option>
                          <option value="+262">+262</option>
                          <option value="+269">+269</option>
                      </select>
                      </div>
                      <div class="col-6">
                    <input type="text" name="telephone" class="form-control" style="color:black;">
                </div>
                </div>
                </div>
                <div class="form-group">
             
                    <label>Whatsapp</label>
                    <div class="row">
                    <div class="col-4">
                    <select name="idpays2" class="form-control" style="color:black">
                        <option value="null">Code pays</option>
                          <option value="+212">+212</option>
                          <option value="+230">+230</option>
                          <option value="+237">+237</option>
                          <option value="+261">+261</option>
                          <option value="+262">+262</option>
                          <option value="+269">+269</option>
                      </select>
                      </div>
                      <div class="col-6">
                    <input  type="text" name="whatsapp" class="form-control" style="color:black;">
                   </div>
                  
                    </div>
                    </div>
                  </div>
                  </div>
                  
               </div>
                 
               
                  <!-- <div class="form-group">
                    <label for="password-login">Mot de passe</label>
                    <input id="password-login" type="password" class="form-control" style="width:300px;margin-left:2%">
                  </div>
                  <div class="form-group">
                    <label for="password-login">Retaper le mot de passe</label>
                    <input id="password-login" type="password" class="form-control" style="width:300px;margin-left:2%">
                  </div> -->
                  <div style="margin-top:-50px;margin-bottom:50px;" class="text-center">
                    <button type="submit" class="btn btn-personnalized"><i class="fa fa-user-md"></i> Inscription</button>
                  </div>

                </form>
              </div>
</div>
            </div>
       
          </div>
 

      <footer>
        <?php include("assets/include/footer.php");?>
        <script>
            $(document).ready(function(){
                $(".collapse").each(function(){
                  $(this).siblings(".accordion").find(".fa.fa-angle-right");
                });
                $(".collapse").on('show.bs.collapse', function(){
                  $(this).parent().find(".fa.fa-angle-right").addClass("rotate");
                }).on('hide.bs.collapse', function(){
                  $(this).parent().find(".fa.fa-angle-right").removeClass("rotate");
                });
            });
         </script>
      
      </footer>
  </body>
  

</html>
