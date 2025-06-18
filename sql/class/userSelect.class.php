<?php
require_once ('./sql/class/db.class.php');
class UserSelect
{
    private PDO $connection;

    public function __construct()
    {
        $this->connection = Database::getInstance()->getConnection();
    }

    /**
     * @return array
     */
    public function getAllUsers(): array
    {
        $stmt = $this->connection->prepare("
            SELECT 
                usu_codigo,
                usu_login_acesso,
                usu_nome
            FROM 
                tab_usuario
            ORDER BY 
                usu_codigo ASC
        ");

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
