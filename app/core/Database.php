<?php

namespace core;

use PDO;
use PDOException;

class Database
{
    private PDO $databaseHandler;
    private mixed $statement;

    public function __construct()
    {
        $option = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->databaseHandler = new PDO(SQLSERVER_DSN, SQLSERVER_CONFIG["user"], SQLSERVER_CONFIG["password"], $option);
        } catch (PDOException $e) {
            die("connection failed: " . $e->getMessage());
        }
    }

	public function escapeString($data): false|string
	{
		/*The PDO::quote() method performs the following actions:

		1. Escaping Special Characters:
		The method scans the input string and escapes any special
		characters that have a special meaning in SQL queries. This
		includes characters such as single quotes ('), double quotes ("),
		backslashes (\), and null bytes (\0).Escaping is typically done by
		adding a backslash (\) before each occurrence of a character.

		2.Quoting the String:
		After escaping the special characters, the method wraps the string
		in single quotes (').Quoting the string is necessary for proper SQL
		syntax when using the escaped string in queries.

		3.Handling Database Character Set:
		The PDO::quote() method takes into account the character set used
		by the database connection. It performs any transformations
		or conversions to ensure that the escaped and quoted string is
		compatible with the database character set.

		4.Returning the Result:
		The PDO::quote() method returns the escaped and quoted string as
		the result.The returned string can be used safely in SQL queries
		without the risk of SQL injection attacks.*/
		return $this->databaseHandler->quote($data);
	}

    public function query($query): void
    {
        $this->statement = $this->databaseHandler->prepare($query);
    }


    public function bind($param, $value, $type = null): void
    {
        if (is_null($type)) {
            $type = match (true) {
                is_int($value) => PDO::PARAM_INT,
                is_bool($value) => PDO::PARAM_BOOL,
                is_null($value) => PDO::PARAM_NULL,
                default => PDO::PARAM_STR,
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
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single()
    {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_ASSOC);
    }
}