<?php
class Database
{
    private static ?self $instance = null;
    private PDO $connection;

    // Dados sensíveis como usuário e senha podem ser carregados de um arquivo .env ou constantes protegidas
    private string $host = 'localhost';
    private string $dbname = 'hospital';
    private string $user = 'root';
    private string $pass = '';
    private string $charset = 'utf8mb4';

    // Construtor privado para impedir múltiplas instâncias
    private function __construct()
    {
        $this->connect();
    }

    // Método que retorna a instância única
    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    // Conexão segura com opções recomendadas
    private function connect(): void
    {
        $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset={$this->charset}";

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,   // Erros via exceção
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,         // Retorno seguro e legível
            PDO::ATTR_EMULATE_PREPARES   => false,                    // Desativa emulação para evitar SQL Injection
        ];

        try {
            $this->connection = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            // Nunca exiba o erro diretamente em produção!
            error_log('Erro de conexão: ' . $e->getMessage());
            die('Erro ao conectar com o banco de dados.');
        }
    }

    // Retorna a conexão PDO
    public function getConnection(): PDO
    {
        return $this->connection;
    }

    // Impede clonagem
    private function __clone() {}

    // Impede unserialize
    public function __wakeup()
    {
        throw new Exception("Não é permitido desserializar uma instância singleton.");
    }
}

$db = Database::getInstance();      // Obtém a instância singleton da classe
$connection = $db->getConnection(); // Obtém o objeto PDO da conexão

