<?php
try {
include_once "conexao.php";
// Ajuste o caminho para o arquivo de conexão corretamente
session_start();

// Receber os dados vindos do formulário
$comentador = $_SESSION['idusuario'];
$idfilmecomentado = $_POST["idfilmecomentado"];
$comentario = $_POST["comentario"];


// Query SQL usando prepared statement
$sql = "INSERT INTO comentários (comentador , idfilmecomentado, comentario) VALUES ($comentador, $idfilmecomentado, '$comentario')";



    $result = $conn->query($sql);

    if ($result === TRUE) {
?>
        <script>
            window.location = "../view/avaliarFilme.html";
        </script>
    <?php

    } else {
    ?>
        <script>
            alert(" Erro ao salvar comentário. ");
            window.history.back();
        </script>
    <?php
    }
} catch (exception $e) {
    echo "". $e->getMessage();
    ?>
<?php
}

?>