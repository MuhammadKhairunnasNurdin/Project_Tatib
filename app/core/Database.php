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

	public function antiDbInjection($data): string
	{
		$connect = $this->databaseHandler;
		/*convert special character to HTML entities This step helps
		prevent potential cross-site scripting (XSS) attacks by ensuring
		that the data is safely displayed in HTML.*/
		$data = htmlspecialchars($data, ENT_QUOTES);

		/*to strip or delete HTML and PHP tags*/
		$data = strip_tags($data);

		/*to delete last back slash from url*/
		$data = stripslashes($data);

		/*this function is like mysqli_real_escape_string
		 * The PDO::quote() method performs the following actions:

		1. Escaping Special Characters:
		The method scans the input string and escapes any special
		characters that have a special meaning in SQL queries. This
		includes characters such as single quotes ('), double quotes ("),
		backslashes (\), and null bytes (\0).Escaping is typically done by
		adding a backslash (\) before each occurrence of a character.this
		mean if user input <b>anas</b> and if we hadn't used quote(), so
		our data from user will became bold character meaning html element
		will have function

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
		without the risk of SQL injection attacks.

		function quote mast add ' in parameter, example: "anas" will result "'anas'"*/
		$escapedData = $connect->quote($data);
		if ($escapedData === false)
			/*return null when error occurred during escaping because database driver is not compatible*/
			return $data;
		else
			return $escapedData;
	}

    public function prepare($query): void
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
        $this->statement->bindValue($param, $value, $type);
    }

    public function execute()
    {
        return $this->statement->execute();
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

	public function lastInsertId(): bool|string
	{
		return $this->databaseHandler->lastInsertId();
	}
}