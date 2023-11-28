<?php

namespace controllers;

use core\Controller;

class Login extends Controller
{
    public function index()
    {
		session_start();
	    $data = [
			"title" => "Login",
	    ];
		$this->view("templates/header", $data);
        $this->view("login");
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

			if (count($loginLocation) === 3) {
				$data["message"] = $loginLocation["errorMessage"];
			}
			$data["title"] = $loginLocation["title"];

			$this->view("templates/header", $data);
			$this->view($loginLocation["viewLocation"], $data);
			$this->view("templates/footer");
			exit();
		}
	}
}