<?php
// Configurações do banco de dados
$servername = "127.0.0.1"; // Geralmente 'localhost'
$username_db = "lemonrate"; // Nome de usuário do MySQL (padrão é 'root')
$password_db = "U_FY%jd$J~"; // Senha do MySQL (geralmente em branco em um ambiente local)
$dbname = "lemonrate_db"; // Nome do banco de dados criado no phpMyAdmin

// Conexão com o banco de dados
$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Verificar se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os dados do formulário
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Verificar se o nome de usuário ou email já existem
    $sql = "SELECT * FROM usuario WHERE usuario = ? OR email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $usuario, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Nome de usuário ou email já estão cadastrados
        echo "O nome de usuário ou email já está cadastrado!";
    } else {
        // Criptografar a senha
        $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);

        // Inserir novo usuário no banco de dados
        $sql = "INSERT INTO usuario (usuario, email, senha) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $usuario, $email, $senha_criptografada);

        if ($stmt->execute()) {
            echo "Cadastro realizado com sucesso!";
        } else {
            echo "Erro ao cadastrar o usuário.";
        }
    }

    // Fechar o statement
    $stmt->close();
}

// Fechar a conexão
$conn->close();
?>
