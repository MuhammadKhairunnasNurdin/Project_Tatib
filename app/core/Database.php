<?php

namespace core;

class Database
{
    private \PDO $databaseHandler;
    private mixed $statement;

    public function __construct()
    {
        $option = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->databaseHandler = new \PDO(SQLSERVER_DSN, SQLSERVER_CONFIG["user"], SQLSERVER_CONFIG["password"], $option);
        } catch (\PDOException $e) {
            die("connection failed: " . $e->getMessage());
        }
    }

    public function query($query): void
    {
        $this->statement = $this->databaseHandler->prepare($query);
    }


    public function bind($param, $value, $type = null): void
    {
        if (is_null($type)) {
            $type = match (true) {
                is_int($value) => \PDO::PARAM_INT,
                is_bool($value) => \PDO::PARAM_BOOL,
                is_null($value) => \PDO::PARAM_NULL,
                default => \PDO::PARAM_STR,
            };
        }
        $this->statement->bindParam($param, $value, $type);
    }

    public function execute(): void
    {
        $this->statement->execute();
    }

    public function resultSet()
    {
        $this->execute();
        return $this->statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function single()
    {
        $this->execute();
        return $this->statement->fetch(\PDO::FETCH_ASSOC);
    }
}