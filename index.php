<?php //include('header-menu.php');?>

<?php 

   include('classes/header-menu.php');
   $cab = new Cabecalho();

                     //pagina - Description - Keywords
   $cab->retornarHeader("index", "Home", "Home", "Advogados do Brasil | Home");
?>

      <div class="owl-carousel owl-theme">
         <div class="container">
            <div class="row">
               <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                  <div class="slider-captions">
                     <h1 class="slider-title">Adovgados do Brasil
                     </h1>
                     <p class="slider-text hidden-xs"> </p>
                     <a href="about.html" class="btn btn-default btn-lg hidden-xs"> Know about us</a> 
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
      <img style="width: 100% !important; height: 400px !important; object-fit: cover;" src="images/banner.jpg" class="img-responsive" alt="...">
      <b>
      <div class="space-medium bg-default">
         <div class="container">
            <div class="row">
               <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                  <div class="counter-block">
                     <div class="counter-icon"><i class="icon-student"></i></div>
                     <div class="counter-content">
                        <h1 class="counter-title">+ 1500 </h1>
                        <span class="counter-text">Clientes felizes</span> 
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                  <div class="counter-block">
                     <div class="counter-icon"><i class="icon-libra"></i></div>
                     <div class="counter-content">
                        <h1 class="counter-title">+ 20 </h1>
                        <span class="counter-text">
                        ANOS DE EXPERIÊNCIA</span> 
                     </div>
                  </div>
               </div>
               <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                  <div class="counter-block">
                     <div class="counter-icon"><i class="icon-agreement"></i></div>
                     <div class="counter-content">
                        <h1 class="counter-title">+ 1750 </h1>
                        <span class="counter-text">Casos bem sucedidos</span> 
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

   <?php include('classes/footer.php');?>    