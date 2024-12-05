<?php
session_start();

// Verifica se o usuário está autenticado
if (!isset($_SESSION["nome"], $_SESSION["email"])) {
    echo "<script>
            alert('Você precisa estar logado para acessar esta página.');
            window.location.href = 'login.html';
          </script>";
    exit;
}

// Variáveis da sessão
$nome = htmlspecialchars($_SESSION["nome"]);
$email = htmlspecialchars($_SESSION["email"]);
$descricao = isset($_SESSION["descricao"]) ? htmlspecialchars($_SESSION["descricao"]) : "Nenhuma descrição adicionada.";
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
  <header style="display: flex; justify-content: center; align-items: center; padding: 10px 20px; background-color: #004000; position: fixed; top: 0; left: 0; right: 0; bottom: 93%; z-index: 1001;">
    <div class="logo">
      <img src="../imagens/logo.png" alt="Logo" height="70" width="70" onclick="openSidebar()">
    </div>
    <div class="search-bar">
      <input type="text" id="searchQuery" placeholder="Digite o nome do filme...">
      <button onclick="searchMovie()">Buscar</button>
    </div>
    <div class="user-profile">
      <a href="../view/perfil.php"><img src="../imagens/user-icon.png" alt="User" height="35" width="35"></a>
    </div>
  </header>
  <div id="sidebar" class="sidebar" style="font-family: 'Times New Roman', Times, serif;">
    <a href="javascript:void(0)" class="closebtn" onclick="closeSidebar()"> &times;</a>
    <a href="../view/homepage.html">Voltar</a>
    <a href="#">Adicionar outros usuários</a>
    <a href="#">Publicações recentes</a>
    <a href="#">Curtidas</a>
    <a href="#">Rank</a>
    <a href="#">Meu perfil</a>
    <a href="../view/recomendacao.html">Para você</a>
  </div>
  <header class="profile-header">
    <div class="header-content">
      <div class="profile-avatar-container">
        <img src="../imagens/user-icon.png" alt="User Avatar" id="profile-avatar" class="profile-avatar">
        <input type="file" id="avatar-input" style="display:none;" accept="image/*">
      </div>
      <div class="user-info">
        <h1 id="profile-name"><?php echo $nome; ?></h1>
        <button id="edit-profile-btn">Editar Perfil</button>
        <p id="profile-email" class="profile-email"><?php echo $email; ?></p>
      </div>
    </div>
  </header>
  <main class="profile-main">
    <aside class="profile-sidebar">
      <nav class="profile-navigation">
        <button class="nav-btn" id="my-reviews-btn">Minhas Avaliações</button>
        <button class="nav-btn" id="favorites-btn">Favoritos</button>
        <div>
          <button class="nav-btn" id="delete-btn" onclick="confirmarExclusao()">Deletar conta</button>
          <script>
            function confirmarExclusao() {
              const confirmacao = confirm("Tem certeza que deseja excluir sua conta?");
              if (confirmacao) {
                window.location.href = "../controller/delete_account.php";
              } else {
                alert("Ação cancelada.");
              }
            }
          </script>
        </div>
      </nav>
    </aside>
    <section class="profile-content">
      <div class="profile-details">
        <p><strong>Nome:</strong> <span id="profile-name-view"><?php echo $nome; ?></span></p>
        <input type="text" id="name-input" style="display:none;" value="<?php echo $nome; ?>">

        <p><strong>Descrição:</strong></p>
        <p id="profile-description"><?php echo $descricao; ?></p>
        <textarea id="description-input" style="display:none;"><?php echo $descricao; ?></textarea>
      </div>
      <div class="profile-actions" style="display:none;" id="edit-actions">
        <button id="save-profile-btn">Salvar</button>
        <button id="cancel-edit-btn">Cancelar</button>
      </div>
    </section>
  </main>
  <script>
    function openSidebar() {
      document.getElementById("sidebar").style.width = "250px";
    }
    function closeSidebar() {
      document.getElementById("sidebar").style.width = "0";
    }
  </script>
  <script src="../controller/perfil.js"></script>
</body>

</html>
