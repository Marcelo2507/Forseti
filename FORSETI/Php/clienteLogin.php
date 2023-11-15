<?php
    
	session_start();
    
	if(isset($_GET['email']) && isset($_GET['senha'])){
        include_once('conex.php');
        $sql = 'SELECT * FROM cliente WHERE email ="'.$_GET['email'].'" AND senha ="'.$_GET['senha'].'"';
        $result = $conn->query($sql);
        
        // Checa se o usuário foi encontrado
        if ($result->num_rows > 0) {
            // Inicia a sessão e salva o email do usuário nela
            //$_SESSION['email'] = $_GET['email'];
            $row = $result->fetch_assoc();
            $_SESSION['email'] = $_GET['email'];
            
            $_SESSION['nome'] = $row['nm_pessoa'];
            $_SESSION['foto'] = $row['foto'];
            $_SESSION['cd'] = $row['cd'];
            
            $_SESSION['login_success'] = true;
            $_SESSION['username'] = $row['username'];
            header("Location: ../USUARIO/home_usuario.php");
        } else {
            // Caso contrário, exibe mensagem de erro e redireciona para a página de login
            echo "Email ou senha incorretos.";
            header("Location: login.html");
        }
    }

?>