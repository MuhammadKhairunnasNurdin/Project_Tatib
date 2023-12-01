<?php

namespace controllers;

use core\Controller;

class Authorization extends Controller
{
    public function index()
    {
	    if (isset($_COOKIE["id"])) {
	        $cookieResult = $this->model("Authorization")->cookieVerify();
		    header("Location: " . BASEURL . "/" . $cookieResult["controller"] . "/" . $cookieResult["method"]);
			return;
	    }
	    $data = [
			"title" => "Login",
//		    "flashMessage" => $message
	    ];
		$this->view("templates/header", $data);
        $this->view("login", $data);
		$this->view("templates/footer");
    }

	public function loginVerify(): void
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$data = [
				"username" => $_POST["username"],
				"password" => $_POST["password"],
				"remember" => ""
			];
			if (isset($_POST["remember"])) {
				$data["remember"] = $_POST["remember"];
			}
			$loginLocation = $this->model("Authorization")->verify($data["username"], $data["password"], $data["remember"]);
			unset($data);

			$controller = $loginLocation["controller"];
			$method = $loginLocation["method"];
			/*if some error in login occur*/
			if (count($loginLocation) === 3) {
				$data["message"] = $loginLocation["errorMessage"];
				header("Location: /$controller/$method?data=" . urlencode(json_encode($data)));
			}

			header("Location: " . BASEURL . "/$controller/$method");
		}
	}

	public function logout() {
		session_unset();
		session_destroy();
		setcookie("id", "", time(), "/");
		setcookie("username", "", time(), "/");
		header("Location: " . BASEURL);

	}

}