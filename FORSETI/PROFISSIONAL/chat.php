<!--chat-->
<?php
session_start();
include_once('../php/conex.php');

$nome = $_SESSION['nome'];

$cd = $_GET['cd'];

$sql = "SELECT * FROM advogado where cd = $cd";
   $result = $conn->query($sql);

   if ($result->num_rows > 0) {
    // Loop através dos resultados e exibir as informações
    while ($row = $result->fetch_assoc()) {
        $nome = $row['nome'];
        $email = $row['email'];

        $foto = $row['foto'];
        // Exibir as informações
        /*
        echo "<h1>ID: $cd<br></h1>";
        echo "<h1>Nome: $nome<br></h1>";
        echo "<h1>Email: $email<br></h1>";
        */
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <!--cabeçaçho-->
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="../css/chat.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    </head>
    <!--conteudo chat-->
    <body>
        
        <div class="container-fluid">
        
                <!--nav das imagens recebidas-->
                <div class="row">
                    
            <div class="col-sm-12">
                 <a href="home_profissional.php"> <img src="../img/btnVoltar2.png" class="btnVoltar"></a>
                    <div id="offCanvas" class="offCanvas">
                        <a href="home_profissional.php"> <img src="../img/btnVoltar2.png" class="btnVoltar"></a>
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                        
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar" id="search">
                            <button class="btn btn-outline-success my-2 my-sm-0 border border-dark" type="submit" style="background: #e6ff03; color: #000;"id="botao" >Pesquisar</button>
                        </form>
                        <br>
                        <br>
                        <a href="#">
                            <div class="text-menseger">
                                <div class="images">
                                <img src="<?php echo $foto;?>"class="foto">
                                </div>
                                <div class="textinho">
                                <h2><?php echo $nome; ?></h2>
                                <p>Boa noite</p>
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="text-menseger">
                                <div class="images">
                                <img src="../img/user.png" class="foto">
                                </div>
                                <div class="textinho">
                                <h2>Richard Alves</h2>
                                <p>Boa noite</p>
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="text-menseger">
                            <div class="images">
                            <img src="../img/user.png" class="foto">
                            </div>
                            <div class="textinho">
                            <h2>Marcelo Arnaldo</h2>
                            <p>Boa noite</p>
                            </div>
                        </div>
                        </a>
                        
                    </div>
                    
                    <div id="hamburguer">
                        <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
                    </div>
                    <div class="online">
                        <img src="<?php echo $foto;?>" style=" float: left; width:56px; height:36px; padding:0 8px; border-radius:50%;">
                        <p style="font-size:2.2em;">&nbsp;<?php echo $nome; ?></p>  
                    </div>  
                </div>
                    
                <!--tela do chat-->
               
                    <div class="msg">
                        
                       <div class="linha-envio">
                            <div class="envio">
                                <p>Oi</p>
                            </div>
                       </div>
                       
                       <div class="linha-resposta">
                            <div class="resposta">
                                <p>Oi</p>
                            </div>
                            
                        </div>
                        <div class="linha-resposta">
                            <div class="resposta">
                                <p>Boa noite</p>
                            </div>
                            
                        </div>

                    </div>

                        <div class="col-12">
                        
                        <!--enviar mensagem-->
                        
                                 <form method="POST">
                            <input type="text" class="mensagem" name="mensagem">
                        
                            <button type="submit" class="enviar" name="chats">Enviar</button>
                        </form>

                        </div>
                      </div>      
           
            </div>
         

        
        <script type="text/javascript" src="../js/chat.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script type="text/javascript">
            // Função para abrir o painel lateral
function openNav() {
  document.getElementById("offCanvas").style.width = "250px";
}

// Função para fechar o painel lateral
function closeNav() {
  document.getElementById("offCanvas").style.width = "0";
}

// Função para enviar a mensagem
function enviarMensagem() {
  var mensagemInput = document.querySelector('.mensagem');
  var mensagem = mensagemInput.value;

  // Limpar o campo de mensagem
  mensagemInput.value = '';

  // Criar uma nova linha de envio de mensagem
  var linhaEnvio = document.createElement('div');
  linhaEnvio.classList.add('linha-envio');
  var envio = document.createElement('div');
  envio.classList.add('envio');
  var mensagemTexto = document.createElement('p');
  mensagemTexto.textContent = mensagem;
  envio.appendChild(mensagemTexto);
  linhaEnvio.appendChild(envio);

  // Adicionar a nova linha de envio à tela do chat
  var telaChat = document.querySelector('.msg');
  telaChat.appendChild(linhaEnvio);

  // Rolar a tela do chat para exibir a nova mensagem
  var telaChat = document.querySelector('.msg');
telaChat.scrollTop = telaChat.scrollHeight;
}

// Capturar o evento de clique no botão de enviar
var botaoEnviar = document.querySelector('.enviar');
botaoEnviar.addEventListener('click', function(event) {
    event.preventDefault(); // Impedir o envio do formulário

    enviarMensagem();
});

// Capturar o evento de pressionar a tecla Enter no campo de mensagem
var mensagemInput = document.querySelector('.mensagem');
mensagemInput.addEventListener('keypress', function(event) {
  if (event.key === 'Enter') {
    event.preventDefault(); // Impedir que a tecla Enter faça uma quebra de linha no campo de mensagem
    enviarMensagem();
  }
});
        </script>

    </body>
</html>