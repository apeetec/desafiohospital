<?php
require_once ('./sql/class/db.class.php');
class UserDelete
{
    private PDO $connection;

    public function __construct()
    {
        $this->connection = Database::getInstance()->getConnection();
    }

    public function deleteUser(int $id): bool
    {
        $stmt = $this->connection->prepare("DELETE FROM tab_usuario WHERE usu_codigo = :id");
        return $stmt->execute([':id' => $id]);
    }
}
