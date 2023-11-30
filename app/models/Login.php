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

	public function cookieVerify(): array
	{
		if (isset($_COOKIE["id"]) && isset($_COOKIE["username"])) {
			$id = $_COOKIE["id"];
			$username = $_COOKIE["username"];

			/*prepare our query syntax*/
			$this->db->prepare("SELECT id_user, username, password, salt, level FROM [user] WHERE id_user =:id_user");

			/*to bind param, so param not directly used in query and bound in separated way*/
			$this->db->bind(':id_user', $id);

			/*execute query when safe*/
			$row = $this->db->single();

			if ($username !== hash("sha256", $row["username"])) {
				return [];
			}

			$controller = $row["level"];
			$method = "index";
			return ["controller" => $controller, "method" => $method];
		}
		return [];
	}

	public function verify(string $username, string $password, $remember = null): array
	{
		/*prepare our query syntax*/
		$this->db->prepare("SELECT id_user, username, password, salt, level FROM [user] WHERE username =:username");

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
			$controller = "Login";
			$method = "login";
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
			$controller = "Login";
			$method = "login";
			return ["controller" => $controller, "method" => $method, "errorMessage" => $this->fm->getFlashData("danger")];
		}

		session_start();
		$_SESSION["username"] = $row["username"];
		$_SESSION["level"] = $row["level"];

		if ($remember) {
			setcookie("id", $row["id_user"], time() + 300, "/");
			setcookie("username", hash("sha256", $username), time()+300, "/");
		}

		$controller = $row["level"];
		$method = "index";
		return ["controller" => $controller, "method" => $method];
	}

}