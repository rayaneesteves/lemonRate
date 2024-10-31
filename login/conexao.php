<?php
// Configurações do banco de dados
//$host = '127.0.0.1'; // Servidor do banco de dados
$dbname = 'lemonrate_db'; // Nome do banco de dados
$host='localhost';
$username='root';
$password='';
//$username = 'lemonrate';  Nome de usuário do banco de dados
//$password = 'U_FY%jd$J~';  Senha do banco de dados

try {
    // Cria a conexão com o banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Define o modo de erro do PDO para exceção
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e) {
    ?>
    <script>
        console.log(<?php addslashes($e)?>)
    </script>
    <?php
    echo 'Erro: ' . $e->getMessage();
}
?>