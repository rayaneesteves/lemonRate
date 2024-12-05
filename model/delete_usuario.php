<?php
include_once "conexao.php";
session_start();

// Verifica se o usuário está logado
if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];

    // Excluir o usuário logado
    $sql = "DELETE FROM usuário WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    if ($stmt->execute()) {
        session_destroy(); // Destruir a sessão após exclusão
        echo "<script>
                alert('Usuário excluído com sucesso.');
                window.location = '../view/login.html';
              </script>";
    } else {
        echo "Erro ao excluir usuário.";
    }
} else {
    echo "Nenhum usuário logado.";
}
?>
