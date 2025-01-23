<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/avaliar.css">

</head>

<body>
<h1>Comentários  </h1>


    
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
    
    <script>
 document.addEventListener('DOMContentLoaded', function () {
    const API_KEY = '9545a79b119db52e58d6ac087fd08185'; // Substitua pela sua chave da API
    const BASE_URL = 'https://api.themoviedb.org/3';
    const AUTH_TOKEN = 'eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiJlZjBiZGEwMzIyYTczYzUwYWFhMGVkMTZkZTU0NDQ2MCIsIm5iZiI6MTcyNDk0OTkxNC42NjAyMjEsInN1YiI6IjY2YmUyZTMzOWVjOTYxZGMxZGMzOGM5MyIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.RawYxp-idwd9FLsehkLjlqUxb8UudvQWkoz_KYEpErw'; // Bearer Token

    async function getMovieTitle(movieId) {
        const url = `${BASE_URL}/movie/${movieId}?language=pt-BR&api_key=${API_KEY}`;
        const options = {
            method: 'GET',
            headers: {
                accept: 'application/json',
                Authorization: `Bearer ${AUTH_TOKEN}`
            }
        };

        try {
            const response = await fetch(url, options);
            if (!response.ok) {
                throw new Error(`Erro ao buscar o filme. Código: ${response.status}`);
            }
            const data = await response.json();
            return data.title; // Retorna o título do filme
        } catch (error) {
            console.error('Erro ao buscar título do filme:', error);
            return null;
        }
    }

    // Exemplo de uso:
    async function displayMovieTitle() {
        const movieId = <?php print $idfilmecomentado; ?>; // Substitua pelo ID real do filme
        const title = await getMovieTitle(movieId);
        if (title) {
            document.body.innerHTML += `<h1>Título do filme: ${title}</h1>`;
        } else {
            document.body.innerHTML += `<h1>Não foi possível obter o título do filme.</h1>`;
        }
    }

    // Chama a função para exibir o título
    displayMovieTitle();
});

</script>
</body>

</html>