<?php
// Conexão com o banco
require_once __DIR__ . '/../class/db.class.php';
// Classe de Insert
require_once __DIR__ . '/../class/userInsert.class.php';



    $login = $_POST['login'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $nome = $_POST['nome'] ?? '';
    $desc = $_POST['descricao'] ?? '';

    $userInsert = new UserInsert();
    $success = $userInsert->insertUser($login, $senha,$nome);

    if ($success) {
        echo "Usuário cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar o usuário.";
    }

?>
