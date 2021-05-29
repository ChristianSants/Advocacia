<?php
    require_once '../model/conexao.class.php';
    require_once '../model/crud.class.php';
	
	$con = new Conexao();
	$con->connect();
	
	$crud = new Crud('advogados');
	$id = $_GET['id'];
	$crud->excluir("id = $id");
	
	$con->disconnect();
	
	header("../index.php");
?>

