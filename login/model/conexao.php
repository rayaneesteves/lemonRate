<?php
// Configurações do banco de dados
$host = 'localhost:3307'; // Ajuste para o ambiente correto
$dbname = 'lemonrate_db';
$username = 'root';
$password = '';

try {
    // Cria a conexão com o banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Define o modo de erro do PDO para exceção
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Exibir mensagem de erro de conexão diretamente
    echo 'Erro de conexão: ' . $e->getMessage();
    exit;
}
?>
