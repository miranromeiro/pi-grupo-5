<?php

class Connection
{
    private $host = 'localhost';
    private $dbname = 'moto_lazer_db';
    private $user = 'moto_lazer_admin';
    private $password = 'abc123';
    private $connection;

    // Construtor: Estabelece a conexão com o banco de dados
    public function __construct()
    {
        try {
            $this->connection = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->user, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Conexão com o banco de dados bem-sucedida!";
        } catch (PDOException $e) {
            echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
        }
    }

    // Método para obter a conexão
    public function getConnection()
    {
        return $this->connection;
    }

    // Destrutor: Fecha a conexão
    public function __destruct()
    {
        $this->connection = null;
       // echo "\nConexão com o banco de dados encerrada.";
    }
}


