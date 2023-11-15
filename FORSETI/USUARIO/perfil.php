<?php
session_start();
include_once('../Php/conex.php');
$email = $_SESSION['email'];
date_default_timezone_set('America/Sao_Paulo');
$cd = $_GET['cd'];

  $sql = "SELECT * FROM cliente where cd = $cd";

   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
    // Loop através dos resultados e exibir as informações
    while($user_data = mysqli_fetch_assoc($result)) {
        $nome = $user_data['nm_pessoa'];
        $dataNasc = date('d/m/Y', strtotime($user_data['dt_nasc']));
        $ano = date('Y', strtotime($dataNasc));
        $telefone = $user_data['telefone'];
        $email = $user_data['email'];
        $cidade = $user_data['cidade'];
        $cep = $user_data['cep'];
        $estado = $user_data['estado'];
        $senha = $user_data['senha'];
        $foto = $user_data['foto'];
    }
}







// Diretório de destino para salvar a imagem

$uploadDir = '../fotos/';
// Verifica se um arquivo foi enviado
if (isset($_FILES['file'])) {
    $file = $_FILES['file'];

    
// Obtém o nome original do arquivo
    $fileName = $file['name'];

    // Obtém o caminho temporário do arquivo
    $tmpFilePath = $file['tmp_name'];

$newFileName = $nome . '_' . time() . '_' . $fileName;
    // Move o arquivo para o diretório de destino
    move_uploaded_file($tmpFilePath, $uploadDir . $newFileName);

    // Define o caminho da imagem no perfil
    $photoPatch = $uploadDir . $newFileName;

    if($photoPatch) {

        $sql = "UPDATE cliente SET foto = '$photoPatch'  WHERE cd='$cd'";
       //echo "<script>alert('deu certo');</script>";
    }
    
    
} 
$_SESSION['foto'] = $foto;


$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/perfil.css">
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <title>Perfil</title>

</head>

<body>
<div>
<!--Menu da página-->
<?php include_once('nav.php'); ?>
<!--fim do menu-->
    <a href="home_usuario.php"> <img src="../img/btnVoltar2.png" class="btnVoltar"></a>

<!--perfil-->
<div style="padding:70px 40px">
    <div class="container-fluid px-1 px-md-2 px-lg-4 py-5 mx-auto">
    <div class="row">
        <!-- Perfil -->
        <div class="col-xl-6 col-lg-4 col-md-4 col-sm-12">
            <div class="card border-0" style="margin: 10px 0">
                <div class="row justify-content-center">
                    <h3 class="mb-4" >Perfil</h3>
                </div>
                <div style="width: 20%; height: auto; background-color: rgb(143, 143, 143); padding: 8px; border-radius: 12px; margin-left: auto; margin-right: auto;">
                    <!--<img name="perfil" src="../img/pessoa.png" style="width: 100%; float: left;"> -->
                    <img id="perfil-image" src="<?php echo $foto; ?>" style="width: 100%; float: left;">
                   
                </div>

                <br>
                
                <div class ="botads" style="color:black;">
                    <button style="border-radius:10px; padding:4px;" data-toggle="modal" data-target="#ExemploModalCentralizado">Selecione seu arquivo</button>
                </div>
                    <div class="modal fade" id="ExemploModalCentralizado" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="TituloModalCentralizado">Foto de perfil</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form enctype="multipart/form-data" method="POST" action="" id="upload-form">
                                
                                <div class ="botads" style="color:black;">
                                    <label class="custom-file-upload botads" style="text-align:center;">
                                      <input type="file" name="file" class ="botads" id="upload-file">
                                      Selecione um arquivo
                                    </label>

                                </div>
                            
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="submit" name="" class="btn btn-primary">Salvar mudanças</button>
                          </div>
                      </form>
                        </div>
                      </div>
                    </div>

                <label>Nome: <b><?php echo $nome;?></b></label>
                
                <label>Data de Nascimento: <b><?php echo $dataNasc;?></b></label>
                <label>Email: <b><?php echo $email;?></b></label>
                <label>Cep: <b><?php echo $cep;?>-000</b></label>
                <label>Estado: <b><?php echo $estado;?></b></label>
                <label>Cidade: <b><?php echo $cidade;?></b></label>
                <label>Telefone: <b><?php echo $telefone;?></b></label>
            </div>
        </div>
          
            <!-- Contratos em andamento e Comunidade -->
            <div class="col-xl-6 col-lg-8 col-md-8 col-sm-12">
                <div class="card border-0" style="margin: 10px 0;">
                    <div class="row justify-content-center">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <h3 class="mb-4" >Contratos em andamento</h3>
                            <div class="box">
                                    <div style="display: flex; flex-direction:row; justify-content:space-between">
                                        <p >Contrato 1</p>
                                        <a href="">
                                            <img src="../img/contrato.png" alt="contrato" style="width: 40%; ">
                                        </a>
                                    </div>
                                </div>
                                <br>
                                <div class="box">
                                    <div style="display: flex; flex-direction:row; justify-content:space-between">
                                        <p >Contrato 2</p>
                                        <a href="">
                                            <img src="../img/contrato.png" alt="contrato" style="width: 40%; ">
                                        </a>
                                    </div>
                                </div>
                                <br>
                                <div class="box">
                                    <div style="display: flex; flex-direction:row; justify-content:space-between">
                                        <p >Contrato 3</p>
                                        <a href="">
                                            <img src="../img/contrato.png" alt="contrato" style="width: 40%; ">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="card border-0">
                            <h3 class="mb-4">Comunidade</h3>
                            <div class="comunidade" style="display: flex; justify-content: space-between; padding: 16px; flex-wrap: wrap;">
                                <img src="../img/oab.png" style="width:80px; height: 25px;" class="logos">
                                <img src="../img/jus.jpg" style="width:80px; height: 25px;" class="logos">
                                <img src="../img/tjsp.jpg" style="width:80px; height: 35px;" class="logos">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                
        </div>
    </div>
</div>




 <footer class="footer">
  <p>Forseti - Todos os Direitos Reservados.</p> 
  </footer>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script>
  // Verifica se um arquivo foi selecionado
  document.getElementById('upload-file').addEventListener('change', function() {
    var reader = new FileReader();
    reader.onload = function(e) {
      document.getElementById('perfil-image').src = e.target.result;
    }
    reader.readAsDataURL(this.files[0]);
  });





  document.getElementById('upload-form').addEventListener('submit', function(e) {
    e.preventDefault(); // Impede o envio padrão do formulário
    var formData = new FormData(this); // Cria um objeto FormData com os dados do formulário

    // Envia os dados via AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', ''); // Insira a URL de destino aqui
    xhr.onload = function() {
      if (xhr.status === 200) {
        // Atualiza a imagem de perfil se o envio for bem-sucedido
        document.getElementById('perfil-image').src = xhr.responseText;
        $('#ExemploModalCentralizado').modal('hide'); // Fecha o modal após o envio
      } else {
        // Trate erros ou exiba uma mensagem de erro
      }
    };
    xhr.send(formData);
  });


</script>

    </body>
</html>