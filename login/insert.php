<?php

try{


include_once "conexao.php";

// Receber os dados vindos do formulário
$nome = $_POST["username"];
$email = $_POST["email"];
$senha = $_POST["senha"];

// Hash da senha para maior segurança
$senha_hashed = password_hash($senha, PASSWORD_DEFAULT);

// Query SQL - corrigindo aspas para $senha e removendo o valor fixo de idusuario
$sql = "INSERT INTO usuário (nome, email, senha, status) 
        VALUES ('$nome', '$email', '$senha_hashed', '1')";

// Verificando se a query foi bem-sucedida
/*if ($conn->query($sql) === true) {
?>
    <script>
        alert("Registro salvo com sucesso!");
        window.location = "selecionar-pessoa.php";
    </script>
<?php
} else {
?>
    <script>
        alert("Erro ao inserir o registro: <?= $conn->error ?>");
        window.history.back();
    </script>
<?php
}*/
}catch (Exception $e){
    ?>
    <script>
        console.log(<?php addslashes($e)?>)
    </script>
    <?php
    echo 'Erro: ' . $e->getMessage();

}
?>
