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
         
         var ordenar = () => {
            
            var valor = document.getElementById('ordem').value;
            window.location.href = '?ordem='+valor;

         }

      </script>

      <br>
      <div class="container">
         <h1 class="page-header">Todos Advogados</h1>
         
         <div class="com-md-4"></div>

         <div class="com-md-4">
            <form method="POST" class="col-md-4">
               <input type="text" name="pesquisar" placeholder="Pesquisar">
               <input type="submit" name="pesquisou" style="display: none;">
            </form>
         </div>

         <div class="col-md-4">
               <select id="ordem" name="ordem" onchange="ordenar()">
                  <option value="id" name="id" <?= @$_GET['ordem'] == 'id' ? 'selected' : NULL?> >ID</option>
                  <option value="especialidade" name="especialidade" <?= @$_GET['ordem'] == 'especialidade' ? 'selected' : NULL?> >ESPECIALIDADE</option>
               </select>
         </div>
         
         <br />
         <div class="col-md-12">
         <div class="table-responsive">
            <table class="sortable table table-striped table-bordered table-hover">
               <thead>
                  <tr>
                              
                  <?php 
                     $user = new Advogados();
                     $status = $user->conferirSessao();
                     if($status != 'Admin'){
                  ?>
                      
                  <!--   <th class=" sorttable_sorted">ID<span id="sorttable_sortfwdind">&nbsp;▾</span></th> -->
                     <th>ID </th>
                     <th>Nome </th>
                     <th>E-Mail</th>
                     <th>OAB</th>
                     <th>Telefone</th>
                     <th>Especialidade</th>

                  <?php }else{ ?>

                  <!--   <th class=" sorttable_sorted">ID<span id="sorttable_sortfwdind">&nbsp;▾</span></th> -->
                     <th>ID </th>
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
                     
                     if(isset($_POST['pesquisar'])){
                        $valor = $_POST['pesquisar']; 
                        $consulta = $user->busca("SELECT * FROM advogados WHERE nome LIKE '%$valor%'");
                     }else{
                        $consulta = $user->list(!isset($_GET['ordem']) ? 'id' : $_GET['ordem'] );   
                     }

                     foreach( $consulta as $campo )
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
      </div>

       <!-- Ordenar Tabela -->
       <script type="text/javascript" src="https://kryogenix.org/code/browser/sorttable/sorttable.js"></script>
      
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>

<?php include('classes/footer.php');?>   