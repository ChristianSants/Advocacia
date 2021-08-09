<?php

   include_once('classes/advogados.php');
   session_start();
   
   $user = new Advogados();
   
   if(!isset($_GET['id']) && isset($_SESSION['email']) ){
      foreach($user->busca("SELECT * FROM advogados WHERE email = '".$_SESSION['email']."'ORDER BY id ASC") as $campo);
   }else if(isset($_GET['id']) && $user->conferirSessao() == 'Admin'){
      foreach($user->busca("SELECT * FROM advogados WHERE id = ' ".$_GET['id']." ' ") as $campo);
   }


if(isset($_POST['Editar'])){//se clicar em 'Editar', edita o produto e mostra o botão EDITAR
   
   $nome = $_POST['nome'];//pega o componente 'nome' do formulario
   $telefone = $_POST['telefone'];//pega o componente 'descricao' do formulario
   $endereco = $_POST['endereco'];
   $cpf = $_POST['cpf'];
   $email = $_POST['email'];
   $sexo = $_POST['sexo'];
   $dtNasc = $_POST['dtNasc'];
   $senha = $_POST['senha'];
   $especialidade = $_POST['especialidade'];
   $oab = $_POST['oab'];
        
   $status = $user->update($nome, $telefone, $endereco, $cpf, $email, $sexo, $dtNasc, $senha, $especialidade, $oab, $_SESSION['email']);
   //header("Location: index.php");//Comando javascript para redirecionar para index.php
   if($status != 1){
      echo "<script>alert('Erro, tente novamente!');</script>";
   }else{
      echo "<script>alert('Dados alterados com Sucesso!'); document.location.href='index.php';</script>";
   }
} 

include('classes/header-menu.php');
$cab = new Cabecalho();

                     //pagina - Description - Keywords
$cab->retornarHeader("editar", "editar", "editar", "Advogados do Brasil | Editar Perfil");

?>


      <form method="post">
         <div class="form-group col-md-6">
            <label for="inputCity" class="col-form-label">Nome Completo</label>
            <input type="text" class="form-control" id="nome" placeholder="Nome Sobrenome" name="nome" value="<?php echo @$campo['nome'];?>" >
         </div>
         <div class="form-group col-md-6">
            <label for="inputCity" class="col-form-label">Data de nascimento</label>
            <input type="date" class="form-control" id="datanasc" name="dtNasc" value="<?php echo @$campo['dtNasc'];?>" >
         </div>
         <div class="form-group col-md-6">
            <label for="inputCity" class="col-form-label">OAB</label>
            <input type="text" class="form-control" id="oab"  placeholder="99999999" name="oab" value="<?php echo $campo['oab'];?>">
         </div>
         <div class="form-row">
            <div class="form-group col-md-6">
               <label for="inputZip" class="col-form-label">CPF</label>
               <input type="text" class="form-control"   placeholder="999.999.999-99" name="cpf" maxlength="11" value="<?php echo $campo['cpf'];?>">
            </div>
            <div class="form-group col-md-6">
               <label for="inputEmail4" class="col-form-label">E-mail</label>
               <input type="email" class="form-control" id="email" placeholder="exemplo@hotmail.com" name="email" value="<?php echo $campo['email'];?>">
            </div>
            <div class="form-group col-md-6">
               <label for="inputPassword4" class="col-form-label">Senha</label>
               <input type="password" class="form-control" id="inputPassword4" name="senha"  placeholder="Senha"  value="<?php echo $campo['senha'];?>" >
            </div>
         </div>
         <div class="form-group">
            <label for="inputAddress" class="col-form-label">Endereço</label>
            <input type="text" class="form-control" id="endereco" placeholder="R. Exemplo N 59 Porto Alegre" name="endereco" value="<?php echo $campo['endereco'];?>" >
         </div>
         <div class="form-row">
            <div class="form-group">
               <label for="inputAddress2" class="col-form-label">Telefone</label>
               <input type="numeric" class="form-control" id="inputAddress2" placeholder="(55) 51 9 9999 9999" name="telefone" value="<?php echo $campo['telefone'];?>" >
            </div>
            <div class="form-group">
               <label for="inputAddress2" class="col-form-label">Especialidade:</label>
               <select name="especialidade">
                  <option value="Vara de familia">Vara de Familia </option>
                  <option value="compliance e ética">Compliance e ética</option>
                  <option value="tributarista">Tributarista</option>
               </select>
            </div>
            <label for="inputCity" class="col-form-label">Sexo</label><br>
            <input type="radio"  id="sexo" name="sexo" value="M" > Masculino<br>       
            <input type="radio"  id="sexo" name="sexo" value="F" > Feminino<BR>
            <br>
         </div>
         <br>
         <input type="submit" name="Editar" value="Editar"/>
         <?php
            /*
            	//se não passar o id via GET, não está editando. Mostrará o botão Cadastrar
            		if(@!$campo['codAd']){
            	?>
         <input type="submit" name="Cadastrar" value="Cadastrar"/>
         <!--se passar o id via GET, está editando. Mostrará o botão Editar-->
         <?php }else{ ?>
         <input type="submit" name="Editar" value="Editar"/>
         <?php } */?>   
      </form>
      <div class="footer">
         <div class="container">
            <div class="row">
               <!-- footer-about-start -->
               <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12">
                  <div class="footer-widget">
                     <div class="logo mb30">
                     </div>
                     <p>“Trabalhar com ética e transparência,  é  dever  de um profissional sério e comprometido com a causa de seu cliente. ” </p>
                     <a href="#" class="btn btn-default btn-sm">Voltar para o topo</a>
                  </div>
               </div>
               <!-- footer-about-close -->
               <!-- footer-useful links-start -->
               <div class=" col-lg-2 col-md-2 col-sm-3 col-xs-12">
                  <div class="footer-widget">
                     <h3 class="footer-title">Links</h3>
                     <ul>
                        <li><a href="index.html">Home </a></li>
                        <li><a href="login.php">Login </a></li>
                        <li><a href="cadastro.php">Cadastrar-Se</a></li>
                        <li><a href="">Advogados </a></li>
                     </ul>
                  </div>
               </div>
               <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 ">
                  <div class="footer-widget">
                     <h3 class="footer-title">Endereço e contato</h3>
                     <div class="contact-info">
                        <ul>
                           <li>Central de atendimento: </li>
                           <li>Fone: (51) 3073-5801</li>
                           <li>E-mail: Advogadosdobrasil@gmail.com</li>
                        </ul>
                     </div>
                     <div class="footer-social"> <span><a href="#"><i class="fa fa-facebook"></i></a></span> <span><a href="#"><i class="fa fa-google-plus"></i></a></span> <span><a href="#"><i class="fa fa-twitter"></i></a> </span> </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- footer-address-close -->
      </div>
   </body>
</html>