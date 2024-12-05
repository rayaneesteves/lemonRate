<script>
    alert("CHEGOU AQUI" )
</script>
<?php

include_once "conexao.php";
session_start();



// Verifica se as variáveis de sessão existem antes de acessá-las
if (isset($_SESSION["nome"], $_SESSION["email"], $_SESSION["senha"], $_SESSION["status"])) {
    echo "Nome: " . $_SESSION["nome"] . "<br>";
    echo "Email: " . $_SESSION["email"] . "<br>";
    echo "Senha: " . $_SESSION["senha"] . "<br>";
    echo "Status: " . $_SESSION["status"] . "<br>";
} else {
    echo "Nenhuma variável de sessão encontrada.";
}



$sql = "DELETE FROM `usuário` WHERE nome = '$nome' AND email = '$email' AND senha = '$senha' AND idusuario = '$idusuario'";

$result = $conn->query($sql);
?>
