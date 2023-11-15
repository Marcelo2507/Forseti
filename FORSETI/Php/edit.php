<?php
	session_start();
	include_once('conex.php');

	if(isset($_POST['update'])){
		$cd = $_POST['cd'];
		$nome = $_POST['nm_pessoa'];
		$dataNasc = $_POST['dataNasc'];
		$telefone = $_POST['telefone'];
		$cidade = $_POST['cidade'];
		$cep = $_POST['cep'];
		$estado = $_POST['estado'];
		$senha = $_POST['senha'];
		$conf_senha = $_POST['confimar_senha'];
		$email = $_POST['email'];

  		$sql = "UPDATE cliente SET nm_pessoa ='$nome', dt_nasc ='$dataNasc', telefone ='$telefone', estado ='$estado', cidade ='$cidade', cep ='$cep', email ='$email', senha ='$senha'  WHERE cd='$cd'";
  	}
  $result = $conn->query($sql);

  header('Location: ../USUARIO/home_usuario.php');
?>