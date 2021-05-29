<?php 

   include('classes/header-menu.php');
   $cab = new Cabecalho();

                     //pagina - Description - Keywords
   $cab->retornarHeader("advogados", "advogados", "advogados", "Advogados do Brasil | Advogados Tributaristas");
?>
      <div class="owl-carousel owl-theme">
         <div class="item">
            <img src="./images/tribunal.jpg" class="img-responsive" alt="">
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
      <br>
      <div class="container">
         <h1 class="page-header">Categoria Compliance e ética</h1>
         <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
               <thead>
                  <tr>
                     <th>ID</th>
                     <th>Nome </th>
                     <th>E-Mail</th>
                     <th>OAB</th>
                     <th>Telefone</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                     include_once('classes/advogados.php');
                     $user = new Advogados();
                     
                     foreach($user->listFiltroEspecialidade('tributarista') as $campo)
                     {
                     
                     ?>	  
                  <tr>
                     <th><?php echo $campo['id'];?></th>
                     <td><?php echo $campo['nome'];?></td>
                     <td><?php echo $campo['email'];?></td>
                     <td><?php echo $campo['oab'];?></td>
                     <td><?php echo $campo['telefone'];?></td>
                  </tr>
                  <?php } ?>
               </tbody>
            </table>
         </div>
      </div>
<?php include('classes/footer.php');?>   