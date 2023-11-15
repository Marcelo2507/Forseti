<?php
session_start();
include_once('../php/conex.php');
$email = $_SESSION['email'];
$nome = $_SESSION['nome'];
$foto = $_SESSION['foto'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" type="text/css" href="../css/acompanhe.css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <title>acompanhe seu processo</title>
</head>
<body>
  <?php include_once('nav.php'); ?>
  <section>
    <a href="home_usuario.php"> <img src="../img/btnVoltar2.png" class="btnVoltar"></a>
  <!-- incio do código!--> 
  <div style="padding:70px 0">
    <div class="h3">
      <h1 style="color:#E3AA00">Acompanhe seu processo</h1>
    </div>
    <div class="inputbox">
      <label>Nome do contratante</label>
      <input type="text" name="nome" value="Marcelo Pucci" disabled>

      <label>Nome do contratado</label>
      <input type="text" name="nome" value="Richard" disabled>
    
      <label>Data incial do processo</label>
      <input type="date" min="2023-01" max="2023-12" name="nome" value="2023-01-03" disabled>
      <br>
      <label>Situacão do processo</label>
      <progress class="processo" value="60" max="100">60%</progress>
      <BR>
      <label>Previsão de conlusão do processo</label>
      <progress class="processo2" value="60" max="100">60%</progress>
    </div>
  </div>
  </section>
 <section id="secao_4"><div class="row">

</div>

  <footer class="footer" style="padding: 50px 50px 0px 50px; color:white;">
    
    <center>
    <p style="color: #ffffff;">Forseti - Todos os Direitos Reservados.</p> 
    </center>
    <br>
  </footer>

</section>
  <!-- fim do código!--> 
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>