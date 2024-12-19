<?php
session_start();
session_destroy(); // Destroi os dados da sessão
header("Location: ../view/login.html");
exit();
?>
