<?php 
   include('classes/header-menu.php');
   $cab = new Cabecalho();
   
                     //pagina - Description - Keywords
   $cab->retornarHeader("login", "login", "login", "Advogados do Brasil | Login");
?>
      <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
      <br>
      <div class="container espaco">
            <div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12"  align="center">
                  <form class="form-inline" action="classes/logar.php" method="post">
                        <div class="form-group col-md-12">  
                              <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="E-mail" name="email" >
                        </div>
                        <br>
                        <div class="form-group col-md-12 mx-sm-3">
                              <input type="password" class="form-control" id="inputPassword2" placeholder="Senha" name="senha" >
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary" value="enviar" >Logar</button>
                        <button style="color:red" type="submit" class="btn btn-primary" name="Cadastro"><a href="cadastro.php" title="Cadastro">Cadastrar-Se</a></button>
                  </form>
            </div>
      </div>
<?php include('classes/footer.php');?>