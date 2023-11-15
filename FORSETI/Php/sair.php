<?php
	
    session_start();
    unset($_SESSION['email']);
    unset($_SESSION['cd']);
    session_destroy();
    header("Location: ../USUARIO/convidativa.html");
?>
