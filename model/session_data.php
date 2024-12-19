<?php
session_start();
include_once "conexao.php"; // Inclua seu arquivo de conexão com o banco de dados

// Verifique se o usuário está logado
if (isset($_SESSION["email"])) {
    // Receber as informações do perfil do POST
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];

    // Query para atualizar as informações do usuário
    $sql = "UPDATE usuário SET nome = ?, descricao = ? WHERE email = ?";
    
    // Usando prepared statement para evitar SQL Injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nome, $descricao, $_SESSION["email"]);
    
    if ($stmt->execute()) {
        // Atualizar as informações na sessão
        $_SESSION["nome"] = $nome;
        echo json_encode(["status" => "sucesso"]);
    } else {
        echo json_encode(["status" => "erro", "message" => "Falha ao atualizar o perfil"]);
    }

    $stmt->close();
} else {
    echo json_encode(["status" => "erro", "message" => "Usuário não autenticado"]);
}
?>