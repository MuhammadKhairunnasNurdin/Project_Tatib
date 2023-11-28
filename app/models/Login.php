<?php

namespace models;

use core\Database;
use core\FlashMessage;

class Login
{
	private Database $db;
	private FlashMessage $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new FlashMessage();
	}

	public function login(string $username, string $password): array
	{
		/*prepare our query syntax*/
		$this->db->prepare("SELECT username, password, salt, level FROM [user] WHERE username =:username");

		/*to escape special character*/
		$username = $this->db->antiDbInjection($username);
		$password = $this->db->antiDbInjection($password);

		/*replace quoted string("''") to regular string(""), because we're using that value to bind function*/
		$username = str_replace("'", "", $username);
		$password = str_replace("'", "", $password);

		/*to bind param, so param not directly used in query and bound in separated way*/
		$this->db->bind(':username', $username);

		/*execute query when safe*/
		$row = $this->db->single();

		/*when query is false because username is wrong*/
		if (!$row) {
			$this->fm->message("warning", "Username not Found");
			$controller = "login";
			$method = "Login";
			return ["controller" => $controller, "method" => $method, "errorMessage" => $this->fm->getFlashData("warning")];
		}

		$salt = $row["salt"];
		if (empty($salt)) {
			/*generate random number*/
			$randomBytes = random_bytes(16);

			/*convert binary to hexadecimal*/
			$salt = bin2hex($randomBytes);
		}

		$inputPassword = $password . $salt;
		$userPassword = password_hash(($row["password"] . $salt ), PASSWORD_DEFAULT);;
		if (!password_verify($inputPassword, $userPassword)) {
			$this->fm->message("danger", "Password is Wrong");
			$controller = "login";
			$method = "Login";
			return ["controller" => $controller, "method" => $method, "errorMessage" => $this->fm->getFlashData("danger")];
		}

		session_start();
		$_SESSION["username"] = $row["username"];
		$_SESSION["level"] = $row["level"];
		$controller = $row["level"];
		$method = "index";
		return ["controller" => $controller, "method" => $method];
	}

}