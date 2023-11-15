<?php
	session_start();
	include_once('conex.php');

	if(isset($_POST['update'])){
		$cd = $_POST['cd'];
		$nome = $_POST['nome'];
		$dataNasc = $_POST['dataNasc'];
		$cnpj = $_POST['cnpj'];
		$cidade = $_POST['cidade'];
		$estado = $_POST['estado'];
		$senha = $_POST['senha'];
		$conf_senha = $_POST['confimar_senha'];
		$email = $_POST['email'];

  		$sql = "UPDATE advogado SET nome ='$nome', dt_nasc ='$dataNasc', cnpj ='$cnpj', sessional ='$estado', subsessao ='$cidade', email ='$email', senha ='$senha'  WHERE cd='$cd'";
  	}
  $result = $conn->query($sql);

  header('Location: ../PROFISSIONAL/home_profissional.php');
?>