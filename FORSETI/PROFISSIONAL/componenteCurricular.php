<?php
  session_start();
  include_once('../php/conex.php');
  $cd = $_GET['cd'];
$foto = $_SESSION['foto'];
  $sql = "SELECT * FROM advogado where cd = $cd";

   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
    // Loop através dos resultados e exibir as informações
    while($user_data = mysqli_fetch_assoc($result)) {
        $nome = $user_data['nome'];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/Componente.css">
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
  <title>acompanhe seu processo</title>
</head>
<body>
	<!--Menu da página-->
	<?php include_once('nav.php'); ?>


<!--fim do menu-->

<br>
<br>
  <a href="home_profissional.php"> <img src="../img/btnVoltar2.png" class="btnVoltar"></a>
<!-- incio do código!--> 
  <div class="h3">
    <h1 style="color: #fff">Componente curricular</h1>
  </div>
  <div class="inputbox">
  	<form action="../Php/curriculo.php?cd=<?php echo $_SESSION['cd'];?>" method="POST">
		    <div class="btn-group" style="width:100%">
			  <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:100%; background: #D9D9D9; color:black; border:none; padding: 13px; border-radius:10px;">
			    Dados pessoais
			  </button>
			  <div class="dropdown-menu dropdown-menu-right" style="width:100%">
			    <input type="text" placeholder=" nome" name="nome" value=" <?php echo $nome; ?>">
			    <input type="text" placeholder=" Sobrenome" name="sobrenome">
			    <input type="text" placeholder=" Idade" name="idade">
			  </div>
			</div>

			<div class="btn-group" style="width:100%">
			  <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:100%; background: #D9D9D9; color:black; border:none; padding: 13px; border-radius:10px;">
			    Objetivos
			  </button>
			  <div class="dropdown-menu dropdown-menu-right" style="width:100%">
			    <input type="text" placeholder=" Objetivo" name="objetivo">
			  </div>
			</div>

			<div class="btn-group" style="width:100%">
			  <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:100%; background: #D9D9D9; color:black; border:none; padding: 13px; border-radius:10px;">
			    Resumo profissional
			  </button>
			  <div class="dropdown-menu dropdown-menu-right" style="width:100%">
			    <input type="text" placeholder=" Resumo" name="resumo">
			  </div>
			</div>

			<div class="btn-group" style="width:100%">
			  <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:100%; background: #D9D9D9; color:black; border:none; padding: 13px; border-radius:10px;">
			    Formação acadêmica
			  </button>
			  <div class="dropdown-menu dropdown-menu-right" style="width:100%">
			    <input type="text" placeholder=" Escolaridade" name="escolaridade">
			    <input type="text" placeholder=" Cursos complementares" name="curso">
			    <input type="text" placeholder=" Especialidade" name="especialidade">
			  </div>
			</div>

			<div class="btn-group" style="width:100%">
			  <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:100%; background: #D9D9D9; color:black; border:none; padding: 13px; border-radius:10px;">
			    Histórico profissional
			  </button>
			  <div class="dropdown-menu dropdown-menu-right" style="width:100%">
			    <input type="text" placeholder=" Experiência" name="historico">
			  </div>
			</div>
			<div class="custom-control custom-checkbox">
			  <input type="checkbox" class="custom-control-input" id="customCheck1">
			  <label class="custom-control-label" for="customCheck1" style="color:white; margin:30px 0 0 10px">Aceito os termos e condições de uso </label>
			</div>

			<div class="cont-bo">

			  <button type="button" onclick="limparInputs()" class="btn btn-secondary bo">Limpar</button>
			  <a><button type="submit" class="btn btn-secondary bo">Confirmar</button></a>
			</div>
		</form>
  </div>
  
  <footer class="footer">
    &#169
    Forseti  Todos os diretos reservados
  </footer>
  <!-- fim do código!--> 
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type="text/javascript">
	function limparInputs() {
  var inputs = document.getElementsByTagName('input');
  for (var i = 0; i < inputs.length; i++) {
    if (inputs[i].type === 'text') {
      inputs[i].value = '';
    }
  }
}
</script>
</body>
</html>