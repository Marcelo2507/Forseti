<?php
    session_start();

if(isset($_GET['oab']) && isset($_GET['senha'])){
    include_once('conex.php');
    $sql = 'SELECT * FROM advogado WHERE oab ="'.$_GET['oab'].'" AND senha ="'.$_GET['senha'].'"';
        $result = $conn->query($sql);

        // Checa se o usuário foi encontrado
        if ($result->num_rows > 0) {
            // Inicia a sessão e salva o email do usuário nela
            $row = $result->fetch_assoc();
            $_SESSION['oab'] = $_GET['oab'];
            $_SESSION['cd'] = $row['cd'];
            $_SESSION['foto'] = $row['foto'];
            $_SESSION['nome'] = $row['nome'];

            $_SESSION['login_success'] = true;
            $_SESSION['username'] = $row['username'];
            // Redireciona para a página inicial
            header("Location: ../PROFISSIONAL/home_profissional.php");
        } else {
            // Caso contrário, exibe mensagem de erro e redireciona para a página de login
            echo "Email ou senha incorretos.";
            header("Location: ../PROFISSIONAL/login_advogado.html");
        }
    }
    ?>
