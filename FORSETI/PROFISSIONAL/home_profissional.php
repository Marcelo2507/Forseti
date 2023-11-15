<?php
  session_start();
  include_once('../Php/conex.php');

  
  $cd = $_SESSION['cd'];
  

   $sql = "SELECT * FROM advogado where cd = $cd";
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
    // Loop através dos resultados e exibir as informações
    while ($row = $result->fetch_assoc()) {
        $nome = $row['nome'];
        $oab = $row['oab'];
        $foto = $row['foto'];
        // Exibir as informações
        /*
        echo "<h1>ID: $cd<br></h1>";
        echo "<h1>Nome: $nome<br></h1>";
        echo "<h1>Email: $email<br></h1>";
        */
    }
} else {
    echo "Nenhum resultado encontrado.";
}
$_SESSION['nome'] = $nome;
$_SESSION['foto'] = $foto;
// Verificar se o login foi realizado com sucesso
if (isset($_SESSION['login_success']) && $_SESSION['login_success']) {
    $loginSuccess = true;
    unset($_SESSION['login_success']); // Remover a variável de sessão para evitar que o alerta seja exibido novamente após o refresh
} else {
    $loginSuccess = false;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/home_usuario.css">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <title>Home profissional</title>

</head>

<body>

<?php include_once('nav.php'); ?>

<div id="alertContainer" style="margin-top:65px;"></div>


<!--fim do menu-->

<br>
<br>
<br>
<br>

<!--Card-->

<div class="row" style="padding:50px 0;">
  <div class="card green">
    <a href="componenteCurricular.php?cd=<?php echo $_SESSION['cd'];?>" style="text-decoration: none; color:black; display: block;">
      <h2>Cadastrar meu currículo</h2>
      <img class="image" src="../img/cadastrar.png" alt="money" />
    </a>
  </div>

  <div class="card blue">
    <a href="atualizarInf.php?cd=<?php echo $_SESSION['cd'];?>" style="text-decoration: none; color:black; display: block;">
      <h2>Atualizar minhas informações</h2>
      <img class="image" src="../img/cnpj.png" alt="settings" />
    </a>
  </div>

  <div class="card red">
    <a href ="chat.php?cd=<?php echo $_SESSION['cd'];?>" style="text-decoration: none; color:black; display: block;">
      <h2>Chat</h2>
      <h4 style="visibility: hidden;">.</h4>
      <img class="image" src="../img/verificar.png" alt="article" />
    </a>
  </div>
</div>
<br>

<!--Noticias -->
<div class="galery">
    <h1 style=" margin: 0 auto 30px auto; color: #fff; border-bottom:1px solid white; width: fit-content;">Notícias</h1>

    <div class="cont-not">

      <div class="card" style="width: 18rem; padding: 10px; background: #d3d3d3;">
        <h4 style="padding: 0.3em;">CAASP celebra o Dia das Mães</h4>
        <img class="card-img-top" src="../img/not2.png?text=Image cap" style=" border-radius:10px" alt="Imagem de capa do card">
        <div class="card-body">
          <p class="card-text" style="color:black">No dia 12 de maio, a Caixa de Assistência dos Advogados de São Paulo (CAASP) promove evento especial ao Dia das Mães. <a target="_blank" href="https://www.caasp.org.br/noticias.asp?cod_noticia=5419#:~:text=No%20dia%2012%20de%20maio,exclusivos%20ofertados%20por%20empresas%20parceiras.">Saiba mais</a></p>
        </div>
      </div>

      <div class="card" style="width: 18rem; padding: 10px; background: #d3d3d3;">
        <h4 style="padding: 0.3em;">OAB divulga Exame de Ordem Unificado</h4>
        <img class="card-img-top" src="../img/not1.jpg?text=Image cap" style=" border-radius:10px" alt="Imagem de capa do card">
        <div class="card-body">
          <p class="card-text" style="color:black">As inscrições poderão ser feitas entre 17h de 24 de abril e 17h de 2 de maio de 2023. O último dia para pagamento da taxa de inscrição é 9 de junho de 2023. <a target="_blank" href="https://www.oab.org.br/noticia/60906/oab-divulga-edital-do-38-exame-de-ordem-unificado#:~:text=A%20OAB%20Nacional%2C%20por%20meio,2%20de%20maio%20de%202023.">Saiba mais</a></a></p>
        </div>
      </div>

      <div class="card" style="width: 18rem; padding: 10px; background: #d3d3d3;">
        <h4 style="padding: 0.3em;">OAB Jabaquara celebra 40 anos e reinaugura a Casa da Advocacia</h4>
        <img class="card-img-top" src="../img/not3.png?text=Image cap" style=" border-radius:10px" alt="Imagem de capa do card">
        <div class="card-body">
          <p class="card-text" style="color:black">No último dia 12 de abril, a OAB Jabaquara-Saúde completou 40 anos de existência e comemorou a data com a reinauguração da 116ª Subseção. <a target="_blank" href="https://jornaldaadvocacia.oabsp.org.br/noticias/oab-jabaquara-celebra-40-anos-e-reinaugura-a-casa-da-advocacia/">Saiba mais</a></p>
        </div>
      </div>

      <div class="card" style="width: 18rem; padding: 10px; background: #d3d3d3;">
        <h4 style="padding: 0.3em;">Novo provimento para estágio profissional da advocacia é aprovado em reunião do pleno</h4>
        <img class="card-img-top" src="../img/not4.jpg?text=Image cap" style=" border-radius:10px" alt="Imagem de capa do card">
        <div class="card-body">
          <p class="card-text" style="color:black">O Conselho Federal da Ordem dos Advogados do Brasil (OAB) aprovou por unanimidade, na segunda-feira (22/5), novas regras do estágio profissional de advocacia. <a target="_blank" href="https://www.oab.org.br/noticia/61013/novo-provimento-para-estagio-profissional-da-advocacia-e-aprovado-em-reuniao-do-pleno#:~:text=Novo%20provimento%20para%20est%C3%A1gio%20profissional%20da%20advocacia%20%C3%A9%20aprovado%20em%20reuni%C3%A3o%20do%20pleno,-Provimento%20aprovado%20aperfei%C3%A7oa&text=O%20Conselho%20Federal%20da%20Ordem,do%20est%C3%A1gio%20profissional%20de%20advocacia.">Saiba mais</a></p>
        </div>
      </div>

    </div>
  </div>

<!-- fim noticias -->

<!-- footer -->


  <footer class="footer" style="padding: 50px 50px 0px 50px; color:white;">

    <center>
      <p style="color: #ffffff;">Forseti - Todos os Direitos Reservados.</p> 
    </center>
    <br>
  </footer>

</section>

<!-- fim footer -->




<!-- js bt-->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<!-- js bt -->
 <?php if ($loginSuccess) { ?>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var alertElement = document.createElement('div');
                alertElement.className = 'alert alert-primary alert-dismissible fade show';
                alertElement.innerHTML = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Login realizado com sucesso!';

                var container = document.getElementById('alertContainer');
                container.appendChild(alertElement);
            });
        </script>
    <?php } ?>

<!-- script calendario -->
<script src = "js/calendario.js" defer type="text/javascript"> </script>
<!-- fim script calendario -->
</body>

</html>