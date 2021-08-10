<?php

   include_once('classes/advogados.php');
   session_start();
   
   $user = new Advogados();
   
   if(!isset($_GET['id']) && isset($_SESSION['email']) ){
      foreach($user->busca("SELECT * FROM advogados WHERE email = '".$_SESSION['email']."'ORDER BY id ASC") as $campo);
   }else if(isset($_GET['id']) && $user->conferirSessao() == 'Admin'){
      foreach($user->busca("SELECT * FROM advogados WHERE id = ' ".$_GET['id']." ' ") as $campo);
   }


if(isset($_POST['Editar'])){//se clicar em editar vai salvar os novos campos do form
   
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
      echo "<script>alert('Dados alterados com Sucesso!'); document.location.href='todosAd.php';</script>";
   }
} 

include('classes/header-menu.php');
$cab = new Cabecalho();

                     //pagina - Description - Keywords
$cab->retornarHeader("editar", "editar", "editar", "Advogados do Brasil | Editar Perfil");

?>

<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <form method="post">
               <br><br>
               <h1 class="text-center">Editar</h1>
               <h2 class="text-center"><?= isset($_GET['id']) && $user->conferirSessao() == 'Admin' ?  $campo['nome'] : NULL ?> </h2>
               <br>
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

               <div class="form-group col-md-6">
                  <label for="inputAddress" class="col-form-label">Endereço</label>
                  <input type="text" class="form-control" id="endereco" placeholder="R. Exemplo N 59 Porto Alegre" name="endereco" value="<?php echo $campo['endereco'];?>" >
               </div>

               <div class="form-row">
                  <div class="form-group col-md-6">
                     <label for="inputAddress2" class="col-form-label">Telefone</label>
                     <input type="numeric" class="form-control" id="inputAddress2" placeholder="(55) 51 9 9999 9999" name="telefone" value="<?php echo $campo['telefone'];?>" >
                  </div>
               </div>

                  <div class="form-group col-md-6">
                     <label for="inputAddress2" class="col-form-label">Especialidade:</label>
                     
                     <select name="especialidade">
                        <option value="Vara de familia">Vara de Familia </option>
                        <option value="compliance e ética">Compliance e ética</option>
                        <option value="tributarista">Tributarista</option>
                     </select>
                  </div>

                  <div class="form-group col-md-6">
                     <label for="inputCity" class="col-form-label">Sexo</label><br>
                     <input type="radio"  id="sexo" name="sexo" value="M" <?= $campo['sexo'] == 'M' ? 'Checked' :  NULL ?> > Masculino<br>       
                     <input type="radio"  id="sexo" name="sexo" value="F" <?= $campo['sexo'] == 'F' ? 'Checked' :  NULL ?> > Feminino<BR>
                     <br>
                  </div>
               
               <br>
               <input type="submit" name="Editar" value="Editar"/>
                 
            </form>
        </div>
      </div>
</div>
<br>

<?php include('classes/footer.php');?>  