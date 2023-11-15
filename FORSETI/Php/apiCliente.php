<?php

    include_once('../Php/conex.php');

// Recebe os dados do formulário
$nm_pessoa = $_POST["nm_pessoa"];
$telefone = $_POST["telefone"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$confirmar_senha = $_POST["confirmar_senha"];
$dt_nasc = $_POST["dt_nasc"];
$cidade = $_POST["cidade"];
$cep = $_POST["cep"];
$estado = $_POST["estado"];
$photoPath = '../fotos/pessoa.png';

// Verifica se as senhas são iguais
if ($senha != $confirmar_senha) {
    die("As senhas não coincidem.");
}

// Verifica se o e-mail já está cadastrado
$sql = "SELECT * FROM cliente WHERE email='$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    die("Este e-mail já está cadastrado.");
}

// Insere os dados no banco de dados


$sql = "INSERT INTO cliente (nm_pessoa, telefone, email, senha, dt_nasc, cidade, cep, estado, foto) VALUES ('$nm_pessoa', '$telefone', '$email', '$senha','$dt_nasc', '$cidade', '$cep', '$estado', '$photoPath')";


if (mysqli_query($conn, $sql)) {
    $_SESSION['login_success'] = true;
    $_SESSION['username'] = $row['username'];
    header("location:../USUARIO/login_cliente.html");
} else {
    echo "Erro ao cadastrar: " . mysqli_error($conn);
}

mysqli_close($conn);
?>