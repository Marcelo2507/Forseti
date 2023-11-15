<?php
// Conexão com o banco de dados
include_once('conex.php');

// Recebe os dados do formulário
$nm_pessoa = $_POST["nm_pessoa"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$confirmar_senha = $_POST["confirmar_senha"];
$oab = $_POST["oab"];
$dt_nasc = $_POST["dt_nasc"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];
$cnpj = $_POST["cnpj"];
$photoPath = '../fotos/pessoa.png';

// Verifica se as senhas são iguais
if ($senha != $confirmar_senha) {
    die("As senhas não coincidem.");
}

// Verifica se o e-mail já está cadastrado
$sql = "SELECT * FROM advogado WHERE email='$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    die("Este e-mail já está cadastrado.");
}

// Insere os dados no banco de dados
$sql = "INSERT INTO advogado (nome, email, senha, oab, dt_nasc, subsessao, sessional, cnpj, foto) VALUES ('$nm_pessoa', '$email', '$senha', '$oab', '$dt_nasc', '$cidade', '$estado', '$cnpj', '$photoPath')";

   

if (mysqli_query($conn, $sql)) {
    
    header("Location:../PROFISSIONAL/login_advogado.html");
    exit();
} else {
    echo "Erro ao cadastrar: " . mysqli_error($conn);
}

mysqli_close($conn);
?>