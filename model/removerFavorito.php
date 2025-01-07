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

$query = $conn->prepare("DELETE FROM favoritos WHERE user_id = ? AND movie_id = ?");
$query->bind_param('ii', $userId, $movieId);

if ($query->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Erro ao remover dos favoritos']);
}

$conn->close();
?>
