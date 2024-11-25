<?php
// Configurações do banco de dados
$host = "127.0.0.1";
$username = "lemonrate";
$password = "U_FY%jd$J~";
$database = "lemonrate_db";

// Criando a conexão
$conn = new mysqli($host, $username, $password, $database);

// Verificando a conexão
if ($conn->connect_error) {
   
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

?>
