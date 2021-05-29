<?php
	
	$login= $_POST['email'];
	$pass= $_POST['senha'];

	include_once('advogados.php');
	$user = new Advogados();
		
	$status = $user->logar($login, $pass);

	if($status == 0)
	{
		//header('Location: login.html');
		echo "<script>document.location.href='../login.html';</script>";
	}
	else
	{
		session_start();
		$_SESSION['logado'] = 1;
		$_SESSION['email'] = $login;
		header("Location:../index.php");
	}
				
?>