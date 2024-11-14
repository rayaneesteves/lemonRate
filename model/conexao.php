<?php
// Parâmetros de conexão com o banco de dados
define('HOST', 'localhost');
define('PORT', 3307); // Porta específica do MySQL
define('USER', 'lemonrate@localhost'); // Nome do usuário
define('PASSWORD', 'U_FY%jd$J~'); // Senha do usuário
define('DB', 'lemonrate_db'); // Nome do banco de dados

// Criar uma conexão com o banco de dados
$conn = new mysqli(HOST, USER, PASSWORD, DB, PORT);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
} else {
    echo "Conexão bem-sucedida!";
}

// Fechar a conexão
$conn->close();
?>
