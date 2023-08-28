<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Conexão com o banco de dados
    $conn = new mysqli("localhost", "seu_usuario", "sua_senha", "sistema_login");
    
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }
    
    $query = "SELECT id, nivel_acesso FROM usuarios WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->bind_result($id, $nivelAcesso);
    
    if ($stmt->fetch()) {
        $_SESSION['username'] = $username;
        $_SESSION['nivel_acesso'] = $nivelAcesso;
        echo "success";
    } else {
        echo "error";
    }
    
    $stmt->close();
    $conn->close();
}
?>
