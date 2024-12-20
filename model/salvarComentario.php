<?php
try {
include_once "conexao.php";
// Ajuste o caminho para o arquivo de conexão corretamente
session_start();

// Receber os dados vindos do formulário
$comentador = $_SESSION['idusuario'];
$idfilmecomentado = $_POST["idfilmecomentado"];
$comentario = $_POST["comentario"];
$nota = $_POST["avaliacao"];


// Query SQL usando prepared statement
$sql = "INSERT INTO comentários (comentador , idfilmecomentado, comentario, nota) VALUES ($comentador, $idfilmecomentado, '$comentario', $nota)";



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