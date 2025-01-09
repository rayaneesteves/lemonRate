<?php
header('Content-Type: application/json');
$data = json_decode(file_get_contents('php://input'), true);

$userId = $data['userId'];
$movieId = $data['movieId'];

// Conectar ao banco de dados
$conn = new mysqli('localhost', 'root', '', 'lemonrate');

if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Erro de conexão']));
}

$query = $conn->prepare("INSERT INTO favoritos (user_id, movie_id) VALUES (?, ?)");
$query->bind_param('ii', $userId, $movieId);

if ($query->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Erro ao adicionar aos favoritos']);
}

$conn->close();
?>
