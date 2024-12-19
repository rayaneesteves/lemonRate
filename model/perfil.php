<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['nome']) || !isset($_SESSION['email'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Usuário</title>
    <link rel="stylesheet" href="../css/perfil.css">
</head>

<body>
    <header>
        <!-- Seu cabeçalho aqui -->
    </header>

    <main>
        <div class="profile-details">
            <h1>Perfil do Usuário</h1>
            <p><strong>Nome:</strong> <?php echo htmlspecialchars($_SESSION['nome']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($_SESSION['email']); ?></p>

            <form action="../model/logout.php" method="POST">
                <button type="submit">Logout</button>
            </form>
        </div>
    </main>
</body>

</html>