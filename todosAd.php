<?php 

   include('classes/header-menu.php');
   $cab = new Cabecalho();

                     //pagina - Description - Keywords
   $cab->retornarHeader("advogados", "advogados", "advogados", "Advogados do Brasil | Todos Advogados");
?> 

      <script>

         var editarPop = (id) => {
            varWindow = window.open (
               'editar.php?id='+id, 
               'popup',
               "width=1000, height=500, top=150, left=100, scrollbars=no ")
         }

      </script>

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
         <h1 class="page-header">Todos Advogados</h1>
         <div class="table-responsive">
            <table class="sortable table table-striped table-bordered table-hover">
               <thead>
                  <tr>
                              
                  <?php 
                     $user = new Advogados();
                     $status = $user->conferirSessao();
                     if($status != 'Admin'){
                  ?>
                      
                     <th class=" sorttable_sorted">ID<span id="sorttable_sortfwdind">&nbsp;▾</span></th>
                     <th>Nome </th>
                     <th>E-Mail</th>
                     <th>OAB</th>
                     <th>Telefone</th>
                     <th>Especialidade</th>

                  <?php }else{ ?>

                     <th class=" sorttable_sorted">ID<span id="sorttable_sortfwdind">&nbsp;▾</span></th>
                     <th>Nome </th>
                     <th>E-Mail</th>
                     <th>OAB</th>
                     <th>Telefone</th>
                     <th>Especialidade</th>
                     <th>Administrator</th>

                  <?php } ?>  

                  </tr>
               </thead>
               <tbody>
                  <?php
                                       
                     foreach($user->list('id') as $campo)
                     {

                     ?>	  
                  <tr>

                  <?php 
                     $user = new Advogados();
                     $status = $user->conferirSessao();
                     if($status != 'Admin'){
                  ?>

                     <th><?php echo $campo['id'];?></th>
                     <td><?php echo $campo['nome'];?></td>
                     <td><?php echo $campo['email'];?></td>
                     <td><?php echo $campo['oab'];?></td>
                     <td><?php echo $campo['telefone'];?></td>
                     <td><?php echo $campo['especialidade'];?></td>

                  <?php }else{ ?>

                     <th><?php echo $campo['id'];?></th>
                     <td><?php echo $campo['nome'];?></td>
                     <td><?php echo $campo['email'];?></td>
                     <td><?php echo $campo['oab'];?></td>
                     <td><?php echo $campo['telefone'];?></td>
                     <td><?php echo $campo['especialidade'];?></td>
                     <!--<td><form method="POST"><input type="submit" name="Excluir" value="Excluir"/></form></td>--> 
                     <td><a><i class="fa fa-pencil-square" onclick="editarPop(<?= $campo['id'] ?>)" ></i></a>
                         <a href="apagar.php?id=<?=$campo['id']?>"><i class="fa fa-times-circle"></i></a></td>
                         
                  <?php } ?>  

                  </tr>
                  <?php } ?>
               </tbody>
            </table>
         </div>
      </div>

       <!-- Ordenar Tabela -->
       <script type="text/javascript" src="https://kryogenix.org/code/browser/sorttable/sorttable.js"></script>

<?php include('classes/footer.php');?>   