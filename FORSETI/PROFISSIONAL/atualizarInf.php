<?php
  session_start();
  include_once('../Php/conex.php');
    $nome = $_SESSION['nome'];
    $foto = $_SESSION['foto'];
    $cd = $_GET['cd'];
 
  $sql = "SELECT * FROM advogado where cd = $cd";

   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
    // Loop através dos resultados e exibir as informações
    while($user_data = mysqli_fetch_assoc($result)) {
        $nome = $user_data['nome'];
        $dataNasc = $user_data['dt_nasc'];
        $cnpj = $user_data['cnpj'];
        $email = $user_data['email'];
        $cidade = $user_data['subsessao'];
     
        $estado = $user_data['sessional'];
        $senha = $user_data['senha'];
    }
}

  ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--CSS-->
    <link href="../css/atualizar_inf.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Atualizar informações</title>
</head>

    <body>

    <?php include_once('nav.php'); ?>


<a href="home_profissional.php"> <img src="../img/btnVoltar2.png" class="btnVoltar"></a>
<div class ="container" style="margin:-20px auto; padding: 50px 0;">
  <br>
  <br>
  <center>
  <h1 style="color: #E3AA00;">Atualização de dados</h1>
</center>
  <br>
  <div class="formulario">

  <form class="form" method="post" action="../php/editAdvo.php" onsubmit="return validarFormulario()">
    <input type="hidden" name="cd" value="<?php echo $cd; ?>">
    <div class="form-item">
    <label class="label"> Nome: </label><br>
    <input class="input" type="text" name="nome" placeholder=" Digite seu nome" value="<?php echo $nome; ?>"><br>
    </div>

    <div class="form-item">
      <label class="label"> Data de nascimento </label><br>
    <input class="input" id="date" type="date" value ="<?php echo $dataNasc;?>" name="dataNasc">
    </div>

    <div class="form-item">
    <label class="label"> CNPJ: </label><br>
    <input class="input" type="text" name="cnpj" placeholder=" (00)12345-6789" value ="<?php echo $cnpj; ?>"><br>
    </div>

    <div class="form-item">
    <label class="label"> E-mail: </label><br>
    <input class="input" type="text" name="email" id ="email" placeholder=" seuemailaqui72@hotmail.com " value ="<?php echo $email; ?>"><br>
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1">Estado </label><br>
      <select class="input" id="estado" name="estado" required> 
        <option disabled selected value="">Selecione um estado</option>
        <option value="RJ" required>Rio de Janeiro</option>  
        <option value="SP" >São Paulo</option>  
       </select> 
    </div>

    <div class="form-group">
      <label for="exampleInputEmail1"> Cidade </label><br>
      <select class="input" id="cidade" name="cidade" required> 
      <option disabled selected value="">Selecione uma Cidade</option> 
       
       </select>
    </div>


    <div class="form-item">
    <label class="label"> Senha: </label><br>
    <input class="input" type="password" name="senha" id ="senha" placeholder=" Digite sua senha" value ="<?php echo $senha; ?>"><br>
    </div>

    <div class="form-item">
    <label class="label"> Confirmar senha: </label><br>
    <input class="input" type="password" name="senha" placeholder=" Digite novamente" value ="<?php echo $senha; ?>"><br><br>
    </div>

    <div style="margin-left: 14%; margin-right: auto; width: 85%;">
    <button class ="buttom" style="width: 40%; background-color:black; border: #000 solid 2px; border-radius: 5px; font-size: 1em; padding: 5px; cursor:pointer; border:none; color:white">
      Cancelar
    </button>
    <button type="submit" id="update" name ="update" class ="buttom" style="width: 40%; background-color: #FFC000; color: black; border-radius: 5px; font-size: 1em;  padding: 5px; cursor:pointer; border:none;">
      Confirmar
    </button>
    </div>

    <br>
    <br>

  </form>
  </div>
  </div>
<!-- fim formalrio -->
<br>
<br>
<br>
<br>
<!-- footer -->
<footer class="footer" style="padding: 50px 50px 0px 50px; color:white; background-color: #000;">

  <center>
  <p style="color: #ffffff;">Forseti - Todos os Direitos Reservados.</p> 
  </center>
  <br>
</footer>

</section>

<!-- fim footer -->

    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- FIM JS -->
<script type="text/javascript">
        let estado = document.getElementById('estado');
        let cidade = document.getElementById('cidade');

        

        estado.onchange = function(){
           
            if(estado.value === "RJ"){
                cidade.innerHTML = '<option disabled selected value="">Selecione uma Cidade</option> <option value ="Maricá">Maricá</option> <option value ="Macaé">Macaé</option> '
            } else if(estado.value === "SP"){
                cidade.innerHTML = '<option disabled selected value="">Selecione uma Cidade</option> <option value ="Itanhaém">Itanhaém</option> <option value ="Santos">Santos</option> '
                }
            }

            
        </script>

    </body>

</html>