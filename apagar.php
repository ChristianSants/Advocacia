<?php

include_once('classes/advogados.php');
   
$user = new Advogados();

if(!isset($_GET['id'])){ 
    echo "<script>alert('Erro, tente novamente!'); document.location.href='todosAd.php';</script>";
}
else if( isset($_GET['id']) && $user->conferirSessao() == 'Admin' ){
    $status = $user->delete($_GET['id']) ;

    if($status != 1){
        echo "<script>alert('Erro, tente novamente!');</script>";
    }else{
        echo "<script>alert('Usuário Excluido com Sucesso!'); document.location.href='todosAd.php';</script>";
    } 

}


?>