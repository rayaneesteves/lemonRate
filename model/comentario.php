<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/avaliar.css">

</head>

<body>
<h1>Comentários do filme: </h1>


    <h3>Comentários</h3>
    <?php
    try {
        include_once "conexao.php";

        session_start();

        
        $movieTitle = $_SESSION["movieTitle"];
        $comentadorC = $_SESSION["comentadorC"];

        $idfilmecomentado = $_SESSION["idfilmecomentado"];
        $comentario = $_SESSION["comentario"];

        $sql = "
        SELECT comentários.comentario, usuário.nome
        FROM comentários
        INNER JOIN usuário ON comentários.comentador = usuário.idusuario
        WHERE comentários.idfilmecomentado = '$idfilmecomentado'
    ";
    

        //echo ($sql);

        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            echo "<p>". $row["nome"]. ": ". $row["comentario"]. "</p>";
            
        }
    } catch (exception $e) {
        echo "" . $e->getMessage();
    }
    ?>
</body>

</html>