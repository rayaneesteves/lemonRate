<?php
include_once "conexao.php";
session_start();

if (isset($_SESSION["nome"], $_SESSION["email"], $_SESSION["status"])) {
    echo "Nome: " . htmlspecialchars($_SESSION["nome"]) . "<br>";
    echo "Email: " . htmlspecialchars($_SESSION["email"]) . "<br>";
    echo "Status: " . htmlspecialchars($_SESSION["status"]) . "<br>";
} else {
    echo "Nenhuma sessão ativa.";
}
?>
