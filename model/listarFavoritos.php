<?php
// Conectar ao banco de dados
$host = "127.0.0.1";
$username = "lemonrate";
$password = 'U_FY%jd$J~';
$database = "lemonrate_db";
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Erro ao conectar: ' . $e->getMessage()]);
    exit;
}

// Obter o ID do usuário (do parâmetro da URL)
$userId = isset($_GET['userId']) ? (int)$_GET['userId'] : null;

if (!$userId) {
    echo json_encode(['error' => 'Usuário não fornecido']);
    exit;
}

// Consulta SQL para listar filmes favoritados
$sql = "SELECT m.id, m.title FROM favoritos f
        JOIN filmes m ON f.filme_id = m.id
        WHERE f.usuario_id = :userId";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
$stmt->execute();

// Verifica se existem favoritos
$movies = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($movies) {
    echo json_encode($movies);
} else {
    echo json_encode([]);
}
?>
