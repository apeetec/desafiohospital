<?php
class UserUpdate
{
    private PDO $connection;

    public function __construct()
    {
        $this->connection = Database::getInstance()->getConnection();
    }

    /**
     * Atualiza campos específicos de um usuário
     * @param int $id - ID do usuário a ser atualizado
     * @param array $fields - Array associativo com os campos a atualizar
     * @return bool - true se sucesso, false se erro
     */
    public function updateUser(int $id, array $fields): bool
    {
        if (empty($fields)) {
            return false;
        }

        // Monta os campos dinamicamente com placeholders
        $setParts = [];
        $params = [];
        foreach ($fields as $key => $value) {
            $setParts[] = "$key = :$key";
            $params[":$key"] = $value;
        }

        $params[":id"] = $id;
        $sql = "UPDATE tab_usuario SET " . implode(", ", $setParts) . " WHERE usu_codigo = :id";

        $stmt = $this->connection->prepare($sql);
        return $stmt->execute($params);
    }
}
