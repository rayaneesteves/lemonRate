<?php
    include_once "conexao.php";


    // Ajuste o caminho para o arquivo de conexão corretamente

    // Receber os dados vindos do formulário
    $nome = $_POST["username"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Query SQL usando prepared statement
    $sql = "INSERT INTO usuário (nome, email, senha, status) VALUES ('$nome', '$email', '$senha', '1')";

    try{

$result = $conn-> query ($sql):

   if($result === TRUE ){
?>
<script>
    window.location= "../view/homepage.html";
</script>
<?php

   }else{
    ?>
    <script>
alert( " Erro ao inserir registro. ");
window.history.back();
    </script>
    <?php
   }

} catch ( mysql_sql_exception) {
?>
<script>
window.location= "../view/perfil.html";
</script>
<?php
}
?>
