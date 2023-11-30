<?php

namespace controllers;

use core\Controller;

class Login extends Controller
{
    public function index()
    {
	    $cookieResult = $this->model("Login")->cookieVerify();
	    if ($cookieResult) {
		    header("Location: " . BASEURL . "/" . $cookieResult["controller"] . "/" . $cookieResult["method"]);
			return;
	    }
	    $data["title"] = "Login";
		$this->view("templates/header", $data);
        $this->view("login");
		$this->view("templates/footer");
    }

	public function loginVerify(): void
	{

		if ($_SERVER["REQUEST_METHOD"] = "POST") {

		if (isset($_POST['remember'])) {
			setcookie('username', $_POST['username'], time() + 120, "/");
			setcookie('password', $_POST['password'], time() + 120, "/");
		}


		var_dump($_SESSION);
			$data = [
				"username" => $_POST["username"],
				"password" => $_POST["password"],
				"remember" => ""
			];
			if (isset($_POST["remember"])) {
				$data["remember"] = $_POST["remember"];
			}
			$loginLocation = $this->model("Login")->verify($data["username"], $data["password"], $data["remember"]);
			unset($data);

			$controller = $loginLocation["controller"];
			$method = $loginLocation["method"];
			/*if some error in login occur*/
			if (count($loginLocation) === 3) {
				$data["message"] = $loginLocation["errorMessage"];
				header("Location: /$controller/$method" . $data["message"]);
			}

			header("Location: " . BASEURL . "/$controller/$method");
		}
	}
}