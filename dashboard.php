<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.html");
    exit();
}

$nivelAcesso = $_SESSION['nivel_acesso'];

if ($nivelAcesso == 1) {
    echo "Bem-vindo, Usuário!";
} elseif ($nivelAcesso == 2) {
    echo "Bem-vindo, Administrador!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1>Painel de Controle</h1>
    <p>Conteúdo restrito com base no nível de acesso.</p>
    <a href="logout.php">Sair</a>
</body>
</html>
