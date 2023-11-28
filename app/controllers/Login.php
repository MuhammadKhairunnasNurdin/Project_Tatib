<?php

namespace controllers;

use core\Controller;

class Login extends Controller
{
    public function index()
    {
	    $data["title"] = "Login";
		$this->view("templates/header", $data);
        $this->view("login", $data);
		$this->view("templates/footer");
    }

	public function loginVerify(): void
	{
		if ($_SERVER["REQUEST_METHOD"] = "POST") {
			$data = [
				"username" => $_POST["username"],
				"password" => $_POST["password"],
			];
			$loginLocation = $this->model("Login")->login($data["username"], $data["password"]);
			unset($data);

			$controller = $loginLocation["controller"];
			$method = $loginLocation["method"];
			/*if some error in login occur*/
			if (count($loginLocation) === 3) {
				$data["message"] = $loginLocation["errorMessage"];
				header("Location: /$controller/$method" . urldecode($data["message"]));
			}

			header("Location: " . BASEURL . "/$controller/$method");
		}
	}
}