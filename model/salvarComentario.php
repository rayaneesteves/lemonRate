<?php
// Configuração do banco de dados
$servername = "127.0.0.1";
$username = "lemonrate"; // Substitua pelo seu usuário do banco de dados
$password = 'U_FY%jd$J~';     // Substitua pela sua senha do banco de dados
$dbname = "lemonrate_db"; // Substitua pelo nome do seu banco de dados

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão com o banco de dados falhou: " . $conn->connect_error);
}

// Verificar se os dados foram enviados
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $comentador = $_POST['comentador'];
    $idfilmecomentado = $_POST['idfilmecomentado'];
    $comentario = $_POST['comentario'];
    ?>
    <script>
        alert("AQUIIIIIIIIIII")
    </script>
    <?php


    // Validar dados
    if (empty($comentador) || empty($idfilmecomentado) || empty($comentario)) {
        echo "Todos os campos são obrigatórios!";
        exit;
    }
    ?>
    <script>
        alert("FOIII AQUIII")
    </script>
    <?php
    // Query para inserir o comentário
    $stmt = $conn->prepare("INSERT INTO comentarios (comentador, idfilmecomentado, comentario) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $comentador, $idfilmecomentado, $comentario);
    $result = $conn->query($stmt);
?>
<script>
    alert("EXATAMENTE AQUIII")
</script>
<?php
    if ($stmt->execute()) {
        echo "Comentário enviado com sucesso!";
    } else {
        echo "Erro ao salvar o comentário: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
<script>
    alert("ESTA AQUII")
</script>
<?php
?>
