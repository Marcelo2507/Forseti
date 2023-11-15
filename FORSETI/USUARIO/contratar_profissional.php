<?php
session_start();
include_once('../php/conex.php');
$email = $_SESSION['email'];
$nome = $_SESSION['nome'];
$foto = $_SESSION['foto'];
$sql = "SELECT * FROM advogado";
date_default_timezone_set('America/Sao_Paulo');
$data = ""; // Definir a variável $data com um valor padrão
$error = "pesquisando";

if (!empty($_GET['search'])) {
    $data = $_GET['search'];
    $data = strtolower($data);

    // Filtro por nome
    $sql .= " WHERE nome LIKE '%$data%'";

    if (!empty($_GET['especialidade'])) {
        $especialidade = $_GET['especialidade'];

        // Filtro por especialidade apenas se o nome não retornar resultados
        $sql .= " OR (nome NOT LIKE '%$data%' AND especialidade LIKE '%$especialidade%')";
    }
} elseif (!empty($_GET['especialidade'])) {
    $especialidade = $_GET['especialidade'];

    // Filtro por especialidade quando não há filtro de nome
    $sql .= " WHERE especialidade LIKE '%$especialidade%'";
}

if (!empty($_GET['estado'])) {
    $estado = $_GET['estado'];

    // Filtro por estado apenas se o nome e a especialidade não retornarem resultados
    if (strpos($sql, 'WHERE') !== false) {
        $sql .= " AND sessional LIKE '%$estado%'";
    } else {
        $sql .= " WHERE sessional LIKE '%$estado%'";
    }
}

if (!empty($_GET['cidade'])) {
    $cidade = $_GET['cidade'];

    // Filtro por cidade apenas se o nome, especialidade e estado não retornarem resultados
    if (strpos($sql, 'WHERE') !== false) {
        $sql .= " AND subsessao LIKE '%$cidade%'";
    } else {
        $sql .= " WHERE subsessao LIKE '%$cidade%'";
    }
}

$sql .= " ORDER BY 
              CASE WHEN nome LIKE '%$data%' THEN 1 ELSE 2 END,
              CASE WHEN especialidade LIKE '%" . (isset($especialidade) ? $especialidade : "") . "%' THEN 1 ELSE 2 END,
              CASE WHEN sessional LIKE '%" . (isset($estado) ? $estado : "") . "%' THEN 1 ELSE 2 END,
              CASE WHEN subsessao LIKE '%" . (isset($cidade) ? $cidade : "") . "%' THEN 1 ELSE 2 END,
              nome ASC, especialidade ASC";

$sql .= " LIMIT 4";

$result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!--CSS-->
        <link rel="stylesheet" type="text/css" href="../css/contratar_profissional.css">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
        <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <!--JS-->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


        <title>Contratar profissional</title>
    </head>
    <body>
        <!--Menu da página-->
<?php include_once('nav.php'); ?>

<!--fim do menu-->
    <div class ="pai" style="padding:10px 0">
        <a href="home_usuario.php"> <img src="../img/btnVoltar2.png" class="btnVoltar"></a>
        <div class="container">
            <div class="row">
                <!--Filtro-->
                <div class="col-12 col-md-4 filtro" id="filtro">
                <div class="bg-light" style="padding:15px; border-radius:15px">
                            
                <label>Nome do profissional</label>
                <br>
                <input type="text" class="inputs" id="pesquisar" placeholder="Informe o nome do profissional">

                <br>
                <label>Especialização</label>
                <br>
                <select name="especialidade" class="inputs" id="especialidade" name="especialidade">
                    <option disabled selected value="0">Selecione uma especialidade</option>
                    <option value="Criminal">Criminal</option>
                    <option value="Penal">Penal</option>
                    <option value="Empresarial">Empresarial</option>
                    <option value="Trabalhista">Trabalhista</option>
                </select>
                <!-- <input type="text" class="inputs" placeholder="Informe a especialidade"> -->
                <br>
                <label>Estado</label>
                <br>
                <select  class="inputs" id="estado" name="estado">
                    <option disabled selected value="0">Selecione um estado</option>
                    <option value="SP">São Paulo - SP</option>
                    <option value="RJ">Rio de Janeiro - RJ</option>
                </select>
                <br>
                <label>Cidade</label>
                <br>

                <select  class="inputs" id="cidade" name="cidade">
                    <option disabled selected value="0">Selecione uma Cidade</option>
                </select>
                                
                <br>
                <br>
                <button type="search" class="button" onclick ="searchData()">Filtrar</button>
                                
                </div>
                </div>
                                
                <div class=" col-12 col-md-8" style="margin-left: 1.5">
                    <div class="row">
                        <!--Pesquisar
                                    
                        <div class="col-11 navegação">
                            <br>
                            <input class="form-control" type="search" placeholder="Pesquisar" aria-label="Search" style="margin-left: 1%;" id="pesquisar">
                            <br>
                        </div>
                                    
                        -->
                        <?php
                            while($user_date = mysqli_fetch_assoc($result)){
                                ?>
                        <div class="col-11" style="margin:10px 0">

                            <div class="row">
                                <div class="adv bg-light">
                                        
                                    <!--<img src="img/advogado1.png" style="width: 40%; padding-left: 1em;">-->
                                        
                                <!--informações card-->
                                    <div class="col-sm-7">

                                    
                                        <?php
                                        echo'<h4>'.$user_date['nome'].'</h4>'.'<img src="https://img2.gratispng.com/20180802/xaw/kisspng-clip-art-portable-network-graphics-computer-icons-user-staff-person-man-profile-boss-circle-svg-png-5b62ed560cb369.529707841533209942052.jpg" style="width: 100px; padding:10px;">';
                                        echo'<p style="margin:0 4px 0 0">Inscrição OAB: '.'<b>'.$user_date['oab'].'</b>'.'</p>';
                                        echo'<p style="margin:0 4px 0 0">Seccional: '.'<b>'.$user_date['sessional'].'</b>'.'</p>';
                                        echo' <meta charset="UTF-8"> <p style="margin:0 4px 0 0">Subseção: '.'<b>'.$user_date['subsessao'].'</b>'.'</p>';
                                        echo'<p style="margin:0 4px 0 0">Especialidade: '.'<b>'.$user_date['especialidade'].'</b>'.'</p>';
                                        echo'<br>';

                                        $dataNascimento = date('d/m/Y', strtotime($user_date['dt_nasc']));
                  
                                        ?>
                                        

                                        
                                    </div>
                                     
                                    <button class="btnPerfil" data-toggle="modal" data-target="#modalExemplo<?php echo $user_date['cd']; ?>">
                                        Ver perfil
                                    </button>
                                    
                                    <!-- Modal -->
                                <div class="modal fade" id="modalExemplo<?php echo $user_date['cd']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content" style="background:#FFD700; color:white">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Perfil</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body" style="background: white; color:black;">
                                        <div style="text-align: center;">
                                        <h4><?php echo $user_date['nome']; ?></h4>
                                            <img src="https://img2.gratispng.com/20180802/xaw/kisspng-clip-art-portable-network-graphics-computer-icons-user-staff-person-man-profile-boss-circle-svg-png-5b62ed560cb369.529707841533209942052.jpg" style="width: 100px; padding: 10px;">
                                            <p style="margin:0 4px 0 0">Inscrição OAB: <b><?php echo $user_date['oab']; ?></b></p>
                                            <p style="margin:0 4px 0 0">Seccional: <b><?php echo $user_date['sessional']; ?></b></p>
                                            <p style="margin:0 4px 0 0">Subseção: <b><?php echo $user_date['subsessao']; ?></b></p>                                           
                                            <p style="margin:0 4px 0 0">Sexo: <b><?php echo $user_date['sexo']; ?></b></p>
                                            <p style="margin:0 4px 0 0">Especialidade: <b><?php echo $user_date['especialidade']; ?></b></p>
                                            <p style="margin:0 0 0 0">Data de nascimento: <b><?php echo $dataNascimento; ?></b></p>
                                         </div>
                                      </div>
                                      <div class="modal-footer" >
                                        <button type="button" class="btn btnFechar" data-dismiss="modal">Fechar</button>
                                        <a href="chat.php?cd=<?php echo $user_date['cd'];?>">
                                            <button type="button" class="btn btn-light">Chat</button>
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        }
                     ?>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <footer class="footer" style="padding: 50px 50px 0px 50px; color:white; background: black;">
    
    <center>
    <p style="color: #ffffff;">Forseti - Todos os Direitos Reservados.</p> 
    </center>
    <br>
  </footer>

  <script type="text/javascript">

      


      /*search.addEventListener('keydown', function(event){


        if(event.key == 'Enter'){
          searchData()  
        }

      });*/
        let estado = document.getElementById('estado');
        let cidade = document.getElementById('cidade');

        estado.onchange = function(){
           
            if(estado.value === "RJ"){
                cidade.innerHTML = '<option disabled selected value="0">Selecione uma Cidade</option> <option value ="Maricá">Maricá</option> <option value ="Macaé">Macaé</option> '
            } else if(estado.value === "SP"){
                cidade.innerHTML = '<option disabled selected value="0">Selecione uma Cidade</option> <option value ="Itanhaém">Itanhaém</option> <option value ="Santos">Santos</option> '
                }
            }

            
      function searchData(){
        alert("<?php echo $error; ?>");
        let especialidade = document.getElementById('especialidade');
        let nome = document.getElementById('pesquisar');
        estado = document.getElementById('estado');
        cidade = document.getElementById('cidade');

        let url = 'contratar_profissional.php?search='+ encodeURIComponent(nome.value) +
            '&especialidade=' + encodeURIComponent(especialidade.value) +
            '&estado=' + encodeURIComponent(estado.value)+
            '&cidade=' + encodeURIComponent(cidade.value);

            window.location.href = url;
      }
  </script>

    </body>
</html>