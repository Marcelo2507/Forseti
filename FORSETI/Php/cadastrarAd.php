<?php
// Conexão com o banco de dados
include_once('conex.php');

// Recebe os dados do formulário
$photoPath = '../fotos/pessoa.png';



// Insere os dados no banco de dados
$sql = "INSERT INTO advogado(nome, email, senha, oab, dt_nasc, sexo, sessional, subsessao, especialidade, foto)VALUES('Rodrigo','ro@ro', 123, '4344','2004-09-01','M','RJ','Maricá','Criminal', '$photoPath'),
    ('Gabriel','ro@ro', 123, '3214','2004-09-01','M','SP','Santos','Empresarial', '$photoPath'),
    ('Matheus','ro@ro', 123, '4264','2004-09-01','M','RJ','Macaé','Trabalhista', '$photoPath'),
    ('Brandon','ro@ro', 123,'2214','2004-09-01','M','SP','Itanhaém','Penal', '$photoPath'),
    ('Marcelo','ro@ro', 123, '2614','2004-09-01','M','SP','Itanhaém','Criminal', '$photoPath'),
    ('Jonas','ro@ro', 123, '4264','2004-09-01','M','RJ','Macaé','Empresarial', '$photoPath'),
    ('Rodolfo','ro@ro', 123,'2214','2004-09-01','M','SP','Itanhaém','Trabalhista', '$photoPath'),
    ('Pamela','ro@ro', 123, '3214','2004-09-01','M','SP','Santos','Penal', '$photoPath'),
    ('Arthur','ro@ro', 123, '4264','2004-09-01','M','RJ','Macaé','Criminal', '$photoPath'),
    ('Miguel','ro@ro', 123,'2214','2004-09-01','M','SP','Itanhaém','Empresarial', '$photoPath'),
    ('Antonio','ro@ro', 123, '3214','2004-09-01','M','SP','Santos','Trabalhista', '$photoPath'),
    ('Jose','ro@ro', 123, '4264','2004-09-01','M','RJ','Macaé','Penal', '$photoPath'),
    ('Davi','ro@ro', 123,'2214','2004-09-01','M','SP','Santos','Criminal', '$photoPath'),
    ('Matheus','ro@ro', 123, '3214','2004-09-01','M','SP','Itanhaém','Empresarial', '$photoPath'),
    ('Gabriel','ro@ro', 123, '4264','2004-09-01','M','RJ','Maricá','Trabalhista', '$photoPath'),
    ('Rodrigo','ro@ro', 123,'2214','2004-09-01','M','SP','Itanhaém','Penal', '$photoPath')";


   

if (mysqli_query($conn, $sql)) {
    
    header("Location:../USUARIO/convidativa.html");
} else {
    echo "Erro ao cadastrar: " . mysqli_error($conn);
}

mysqli_close($conn);
?>