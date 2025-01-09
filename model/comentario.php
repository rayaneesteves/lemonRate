<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>FILME INFO 3</h1>
    <h3>Comentários</h3>
    <?php
    try {
        include_once "conexao.php";

        session_start();

        $idfilmecomentado = $_SESSION["idfilmecomentado"];
        $comentario = $_SESSION["comentario"];

        $sql = "SELECT comentario FROM comentários WHERE idfilmecomentado = '$idfilmecomentado' ";
        //echo ($sql);

        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            echo "<p>". $row["comentario"]. "</p>";
            
        }
    } catch (exception $e) {
        echo "" . $e->getMessage();
    }
    ?>
</body>

</html>