<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "usbw";
$dbname = "forseti";

// Cria a conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se houve algum erro na conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}


$cd = $_GET['cd'];
// Recebe os dados do formulário
$nome = $_POST["nome"];
$sobrenome = $_POST["sobrenome"];
$idade = $_POST["idade"];
$resumo_profi = $_POST["resumo"];
$objetivo = $_POST["objetivo"];
$historico = $_POST["historico"];
$esc_cursos = $_POST["curso"];
$especialidade = $_POST["especialidade"];




// Inicia a transação
$conn->autocommit(false);

try {
    // Insere os dados na tabela 'curriculo'
    $sql_curriculo = "INSERT INTO curriculo (id_advogado, nome, sobrenome, idade, objetivo, resumo_profi, historico) VALUES ('$cd','$nome', '$sobrenome', '$idade', '$objetivo', '$resumo_profi','$historico')
    ON DUPLICATE KEY UPDATE nome='$nome', sobrenome='$sobrenome', idade='$idade',
                      objetivo='$objetivo', resumo_profi='$resumo_profi', historico='$historico'";

    $conn->query($sql_curriculo);

    // Obtém o ID do currículo inserido
    $id_curriculo = $conn->insert_id;

    // Insere os dados na tabela 'curso'
    $sql_curso = "INSERT INTO curso (id_curriculo, esc_cursos) VALUES ('$id_curriculo', '$esc_cursos')";
    $conn->query($sql_curso);

    // Insere os dados na tabela 'especialidade'
    $sql_especialidade = "INSERT INTO especialidade (id_curriculo, especialidade) VALUES ('$id_curriculo', '$especialidade')";
    $conn->query($sql_especialidade);

    // Comita a transação
    $conn->commit();

    header('Location: ../PROFISSIONAL/home_profissional.php');
    exit();
} catch (Exception $e) {
    // Em caso de erro, desfaz a transação
    $conn->rollback();

    echo "Erro ao cadastrar o currículo: " . $e->getMessage();
}

// Reativa o modo de confirmação automática
$conn->autocommit(true);

// Fecha a conexão com o banco de dados
$conn->close();?>