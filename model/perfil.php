<?php
session_start();
include '../model/conexao.php'; // Inclua a conexão com o banco de dados

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

$userId = $_SESSION['user_id']; // ID do usuário logado

// Busca as informações do usuário no banco
$query = "SELECT nome, email, descricao FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $userId);
$stmt->execute();
$stmt->bind_result($nome, $email, $descricao);
$stmt->fetch();
$stmt->close();

// Atualiza os dados do perfil
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['salvar'])) {
    $novoNome = $_POST['nome'];
    $novaDescricao = $_POST['descricao'];

    $updateQuery = "UPDATE usuarios SET nome = ?, descricao = ? WHERE id = ?";
    $updateStmt = $conn->prepare($updateQuery);
    $updateStmt->bind_param("ssi", $novoNome, $novaDescricao, $userId);

    if ($updateStmt->execute()) {
        // Atualiza os dados na sessão
        $_SESSION['nome'] = $novoNome;
        echo "<script>alert('Perfil atualizado com sucesso!');</script>";
    } else {
        echo "<script>alert('Erro ao atualizar o perfil.');</script>";
    }
    $updateStmt->close();
}
?>