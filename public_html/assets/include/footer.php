<div class="web-only bar" style="height:auto;">
  <div class="container">
    <div class="row" style="color:#fff;margin-bottom:0px"> 
      <div class="col-sm-4">
        <h1 class="lead text-left" style="padding-top:20px;padding-bottom: 20px;">Contactez-nous:</h1>
        <p class="text-muted text-left" style="color:#fff !important"><i class="fa fa-envelope"></i> guiduchoix2424@gmail.com</p>
        <p class="text-muted text-left" style="color:#fff !important"><i class="fa fa-whatsapp"></i> +261 32 26 394 61</p>
        <p class="text-muted text-left" style="color:#fff !important"><i class="fa fa-phone"></i> +261 34 23 652 04</p>
      </div>
    </div>
    <div class="row">
      <div class="col-6">
        <div class="copyright">
            <p>&copy;Guiduchoix24.com 2019</p>
        </div>
      </div>
      <div class="col-6">
        <div  class="socialbtns"> 
          <ul>
            <li><a href="#" class="fa fa-lg fa-facebook"></a></li>
            <li><a href="#" class="fa fa-lg fa-whatsapp"></a></li>
          </ul>
        </div>
      </div>
    </div>
</div>


<div class="mobile-only">
<div class="bar" style="height:60px">
  <div class="copyright">
      <p>&copy;Guiduchoix24.com 2019</p>
      <br/>
      
  </div>
  <div  class="socialbtns">
  
        <ul>
          <li><a href="#" class="fa fa-lg fa-facebook"></a></li>
          <li><a href="#" class="fa fa-lg fa-linkedin"></a></li>
          <li><a href="#" class="fa fa-lg fa-twitter"></a></li>
        </ul>
      </div>
</div>
</div>

<script src="<?php echo base_url("assets/js/jquery.min.js");?>"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>


<script src="<?php echo base_url("assets/bootstrap/js/bootstrap.min.js");?>"></script>
<script src="<?php echo base_url("assets/js/caroussel.js");?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script>
    $(document).ready(function(){
              $('.parrains-animation').slick({
                  slidesToShow: 3,
                  slidesToScroll: 3,
                  autoplay: true,
                  autoplaySpeed: 5000,
                  arrows: false,
                  dots: false,
                  pauseOnHover: true,
                  responsive: [{
                      breakpoint: 768,
                      settings: {
                          slidesToShow: 3
                      }
                  }, {
                      breakpoint: 520,
                      settings: {
                          slidesToShow: 3
                      }
                  }]
              });
          });

</script>
<script>

  $("#search-icon").click(function() {
    $(".bar").toggleClass("search");
    $(".bar").toggleClass("no-search");
    $(".search-input").toggleClass("search-active");
  });

  $('.menu-toggle').click(function(){
    $(".bar").toggleClass("mobile-nav");
    $(this).toggleClass("is-active");
  });
  const $responsive = $('.topnav');
  $(document).mouseup(e=>{
    if(!$responsive.is(e.target) && $responsive.has(e.target).length===0){
      $responsive.removeClass('responsive');
    }
  });
  $('#myTopnav').on('click',()=>{
    $('.topnav').toggleClass('responsive');
  });
  $('#contact').on('click',()=>{
    window.location.href = "<?php echo site_url("Accueil_Controller/contact");?>";
  })
  
</script>

<!-- <script type="text/javascript">
  $(document).ready(function(){
    $('body').bind('cut copy',function(e){
      e.preventDefault();
    });
  });
  $(document).ready(function(){
    $('body').on('contextmenu',function(e){
      return false;
    });
  })
</script> -->


