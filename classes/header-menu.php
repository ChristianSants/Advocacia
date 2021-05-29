<?php

Class Cabecalho
{

    public function retornarHeader($pagina, $description, $keywords, $titulo)
    {
 
?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <meta name="description" content="<?php echo $description; ?>">
      <meta name="keywords" content="<?php echo $keywords; ?>">
      <title><?php echo $titulo; ?></title>
      <!-- Bootstrap -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <!-- Style CSS -->
      <link href="css/style.css" rel="stylesheet">
      <link href="css/estilo.css" rel="stylesheet">
      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css?family=PT+Serif:400,400i,700,700i" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
      <!-- FontAwesome CSS -->
      <link rel="stylesheet" type="text/css" href="css/fontello.css">
      <link href="css/font-awesome.min.css" rel="stylesheet">
      <link href="css/owl.carousel.min.css" rel="stylesheet">
      <link href="css/owl.theme.default.css" rel="stylesheet">
   </head>

   <body>
      <!-- header-start -->
      <div class="header-wrapper">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-2 col-sm-4 col-md-3 col-xs-12">
                  <div class="logo"> <a href="index.php"><img src="./images/logo.png"  class="img-responsive" alt=""></a> </div>
               </div>
               <div class="col-lg-7 col-md-9 col-sm-12 col-xs-12">
                  <div class="navigation-wrapper">
                      
                     <?php 
                        include_once('advogados.php');
                        $user = new Advogados();
                        $status = $user->conferirSessao();
                        if($status != 'Logado'){
                     ?>
                        <div id="navigation">
                            <ul>
                                <li class="<?php echo $pagina == "index" ? "active" : ''; ?>">
                                    <a href="index.php" title="Home">Home</a>
                                </li>
                                <li class="<?php echo $pagina == "login" ? "active" : ''; ?>">
                                    <a href="login.php" title="Login">Login</a>
                                </li>
                                <li class="<?php echo $pagina == "cadastro" ? "active" : ''; ?>">
                                    <a href="cadastro.php" title="Cadastro">Cadastrar-Se</a>
                                </li>
                                <li class="has-sub <?php echo $pagina == "advogados" ? "active" : ''; ?>">
                                    <a href="#" title="practice Area">Categorias de Advogados</a>
                                    <ul>
                                        <li><a href="todosAd.php" title="Practice Area">Todos Advogados</a></li>
                                        <li><a href="vara-de-familia.php" title="Vara de Familia">Vara de Familia</a></li>
                                        <li><a href="compliance.php" title="Compliance e ética">Compliance e ética</a></li>
                                        <li><a href="tributarista.php" title="Tributarista">Tributarista</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                     <?php }else{ ?>
                        <div id="navigation">
                            <ul>
                                <li class="<?php echo $pagina == "index" ? "active" : ''; ?>">
                                    <a href="index.php" title="Home">Home</a>
                                </li>
                                <li class="has-sub <?php echo $pagina == "advogados" ? "active" : ''; ?>">
                                    <a href="#" title="practice Area">Categorias de Advogados</a>
                                    <ul>
                                        <li><a href="todosAd.php" title="Practice Area">Todos Advogados</a></li>
                                        <li><a href="vara-de-familia.php" title="Vara de Familia">Vara de Familia</a></li>
                                        <li><a href="compliance.php" title="Compliance e ética">Compliance e ética</a></li>
                                        <li><a href="tributarista.php" title="Tributarista">Tributarista</a></li>
                                    </ul>
                                </li>
                                <li class="<?php echo $pagina == "editar" ? "active" : ''; ?>">
                                    <a href="editar.php" title="Editar">Editar</a>
                                </li>
                                <li class="<?php echo $pagina == "logout" ? "active" : ''; ?>">
                                    <a href="classes/logout.php" title="Sair">Deslogar</a>
                                </li>
                            </ul>
                        </div>
                     <?php } ?>  

                  </div>
               </div>
               <div class="col-lg-2 hidden-md hidden-sm hidden-xs">
                  <div class="call-info">
                     <p class="call-text">(51) 98531-6322 </p>
                  </div>
               </div>
               <div class="col-lg-1 hidden-md hidden-sm hidden-xs">
                  <div class="social ">
                     <ul>
                        <li>
                           <?php 
                              $user = new Advogados();
                              $status = $user->conferirSessao();
                              if($status != 'Logado'){
                              ?>
                           <img src="images/of.png">
                           <?php }else{ ?>
                           <img src="images/on.png">
                           <?php } ?>    
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>

<?php } } ?>