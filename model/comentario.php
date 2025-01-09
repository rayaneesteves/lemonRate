<?php
try{
    include_once "conexao.php";

    session_start();

    $idfilmecomentado = $_SESSION["idfilmecomentado"];
$comentario = $_SESSION["comentario"];

$sql = "SELECT comentario FROM comentários WHERE idfilmecomentado = '$idfilmecomentado' ";

$result = $conn->query($sql);

echo ($result);


} catch (exception $e) {
    echo "". $e->getMessage();

}
?>