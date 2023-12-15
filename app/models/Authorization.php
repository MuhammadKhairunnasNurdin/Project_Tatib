<?php

namespace models;

use core\Database;
use core\FlashMessage;

class Authorization
{
	private Database $db;
	private FlashMessage $fm;

	public function __construct()
	{

		$this->db = new Database();
		$this->fm = new FlashMessage();
	}

	public function __destruct() {
		unset($this->db);
	}

	public function verify(string $username, string $password, $remember = ""): array
	{
		/*prepare our query syntax*/
		$this->db->prepare("SELECT id_user, username, password, salt, level FROM user WHERE username =:username");

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
			$controller = "Authorization";
			$method = "index";
			$message = $this->fm->getFlashData("warning");
			return ["controller" => $controller, "method" => $method, "errorMessage" => $message];
		}

		$salt = $row['salt'];
//		$userPassword = $row['password'];
//		$inputPassword = $password . $salt;
//		/*checking with hash() method wit algorithm sha256, cause in our
//		database, password is hashed with sha2_256, and to check that we
//		can't use password verify() method with default hash algorithm*/
//		$inputPassword = hash("sha256", $inputPassword, true);
//		if (!($userPassword === $inputPassword))
		$inputPassword = $password . $salt;
		$userPassword = password_hash(($row["password"] . $salt ), PASSWORD_DEFAULT);;
		if (!password_verify($inputPassword, $userPassword)){
			$this->fm->message("danger", "Password is Wrong");
			$controller = "Authorization";
			$method = "index";
			return ["controller" => $controller, "method" => $method, "errorMessage" => $this->fm->getFlashData("danger")];
		}

		$_SESSION["username"] = $row["username"];

		$controller = $row["level"];
		$method = "index";
		return ["controller" => $controller, "method" => $method];
	}

	public function logout(): string
	{
		session_unset();
		session_destroy();
		return BASEURL;
	}

}