<?php
// Ativar a exibição de erros para depuração
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    // Ajuste o caminho para o arquivo de conexão corretamente
    include_once "../model/conexao.php";

    // Receber os dados vindos do formulário
    $nome = $_POST["username"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Hash da senha para maior segurança
    $senha_hashed = password_hash($senha, PASSWORD_DEFAULT);

    // Query SQL usando prepared statement
    $sql = "INSERT INTO usuário (nome, email, senha, status) VALUES (:nome, :email, :senha, '1')";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $senha_hashed);

    // Executa a query e verifica se foi bem-sucedida
    if ($stmt->execute()) {
        echo "<script>
                alert('Registro salvo com sucesso!');
                window.location = 'selecionar-pessoa.php';
              </script>";
    } else {
        echo "<script>
                alert('Erro ao inserir o registro.');
                window.history.back();
              </script>";
    }
} catch (Exception $e) {
    // Exibir o erro diretamente no navegador
    echo 'Erro: ' . $e->getMessage();
}
?>
