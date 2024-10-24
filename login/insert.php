<?php
include_once "conexao.php";
//receber os dados vindo do form
$nome = $_POST["username"];
$email = $_POST["email"];
$senha = $_POST["password"];


$sql = "INSERT INTO usuário (idusuario, nome, email, senha, status)
        VALUES ('1', '$nome', '$email', $senha, '$1')";

if ($conn->query($sql) === true) {
?>
    <script>
        alert("Registro salvo com sucesso!");
        window.location = "selecionar-pessoa.php";
    </script>
<?php
} else {
?>
    <script>
        alert("Erro ao inserir o registro!");
        window.history.back();
    </script>
<?php
}
?>