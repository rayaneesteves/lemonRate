<?php
// Configurações do banco de dados
$host = "52.233.90.226";
$username = "lemonrate";
$password = "U_FY%jd$J~";
$database = "lemonrate_db";

// Criando a conexão
$conn = new mysqli($host, $username, $password, $database);

// Verificando a conexão
if ($conn->connect_error) {
    "<script>
    alert('deu erro')
    </script>";
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

echo "Conexão estabelecida com sucesso!";
?>
