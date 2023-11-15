<?php 
    include_once('conex.php');

    if (isset($_GET['q'])) {
    $termo = $_GET['q'];

    // Executar a consulta no banco de dados
    $sql = "SELECT * FROM advogados WHERE nome LIKE '%$termo%'";
    $resultado = $conn->query($sql);

    // Exibir os resultados
    if ($resultado->num_rows > 0) {
        while ($linha = $resultado->fetch_assoc()) {
            echo $linha['campo1'] . ' - ' . $linha['campo2'] . '<br>';
        }
    } else {
        echo 'Nenhum resultado encontrado.';
    }
}
?>