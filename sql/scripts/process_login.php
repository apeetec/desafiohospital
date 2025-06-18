<?php
// Inicia a sessão
session_start();

// Conexão com o banco
require_once __DIR__ . '/../class/db.class.php';
// Classe de login
require_once __DIR__ . '/../class/login.class.php';

// Instancia a classe Login
$login = new Login();

$username = $_POST['usuario'] ?? '';
$password = $_POST['senha'] ?? '';

if ($login->authenticate($username, $password)) {
    // Login bem-sucedido - salva dados na sessão
    $_SESSION['usu_login_acesso'] = $username;

    echo "Bem-vindo, " . htmlspecialchars($username) . "!";

    // Redirecione para uma área protegida, se quiser:
    // header("Location: /achados/pages/dashboard.php");
    // exit;
} else {
    echo "Usuário ou senha inválidos.";

    // Você pode redirecionar de volta ao formulário de login com mensagem:
    // header("Location: login.php?erro=1");
    // exit;
}
?>
