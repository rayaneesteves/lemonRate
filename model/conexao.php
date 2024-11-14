<?php
// Configurações do banco de dados
$host = '52.233.90.226'; // Ajuste para o ambiente correto
$dbname = 'lemonrate_db';
$username = 'lemonrate';
$password = 'U_FY%jd$J~';

try {
    // Cria a conexão com o banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Define o modo de erro do PDO para exceção
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Exibir mensagem de erro de conexão diretamente
    echo 'Erro de conexão: ' . $e->getMessage();
    exit;
    "<script>
                alert('NAO CONECTOU');
                
              </script>";
}
?>
