<?php
class UserInsert
{
    private PDO $connection;

    public function __construct()
    {
        $this->connection = Database::getInstance()->getConnection();
    }

    /**
     * Insere um novo usuário na tabela tab_usuario
     * @param string $login Login do usuário
     * @param string $senha Senha do usuário (em texto plano)
     * @return bool true em caso de sucesso, false em caso de erro
     */
    public function insertUser(string $login, string $senha, string $nome): bool
    {
        try {
            

            $stmt = $this->connection->prepare(
                'INSERT INTO tab_usuario (usu_login_acesso, usu_senha, usu_nome) VALUES (:login, :senha, :nome)'
            );
            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
            $stmt->bindParam(':login', $login);
            $stmt->bindParam(':senha', $senhaHash); // ou $senhaHash
            $stmt->bindParam(':nome', $nome);
            return $stmt->execute();
        } catch (PDOException $e) {
            // logar erro ou exibir mensagem, se necessário
            return false;
        }
    }
}
