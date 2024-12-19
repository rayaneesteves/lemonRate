<?php

try {
    include_once "conexao.php";

    session_start();

    // Receber os dados vindos do formulário
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Query SQL usando prepared statement
    $sql = "SELECT * FROM usuário WHERE email = '$email' AND senha = '$senha'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $dadosusuario = $result->fetch_assoc();

        $_SESSION["nome"] = $dadosusuario["nome"];
        $_SESSION["email"] = $dadosusuario["email"];
        $_SESSION["senha"] = $dadosusuario["senha"];
        $_SESSION["status"] = $dadosusuario["status"];

?>
        <script>
            window.location = "../view/homepage.html";
        </script>
        
    <?php

    } else {
    ?>
        <script>
            alert(" Erro de login ");
            window.location = "../view/login.html";
        </script>
    <?php
    }
} catch (exception $e) {
    echo "" . $e->getMessage();
}
?>