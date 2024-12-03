<?php
try {
    include_once "conexao.php";

    session_start();

    // Receber os dados do formulário
    $email = isset($_POST["email"]) ? trim($_POST["email"]) : null;
    $senha = isset($_POST["senha"]) ? trim($_POST["senha"]) : null;

    // Validação básica
    if (empty($email) || empty($senha)) {
        echo "<script>
                alert('Por favor, preencha todos os campos.');
                window.location = '../view/login.html';
              </script>";
        exit;
    }

    // Query segura com prepared statement
    $sql = "SELECT * FROM usuário WHERE email = ? AND senha = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $senha);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar se há usuário correspondente
    if ($result->num_rows > 0) {
        $dadosusuario = $result->fetch_assoc();

        // Criar variáveis de sessão
        $_SESSION["nome"] = $dadosusuario["nome"];
        $_SESSION["email"] = $dadosusuario["email"];
        $_SESSION["status"] = $dadosusuario["status"];

        echo "<script>
                window.location = '../view/homepage.html';
              </script>";
    } else {
        echo "<script>
                alert('Usuário ou senha inválidos.');
                window.location = '../view/login.html';
              </script>";
    }
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}
?>
