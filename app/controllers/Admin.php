<?php

namespace controllers;

use core\Controller;

class Admin extends Controller
{
	public function index(): void
	{
		$data['title'] = "Admin";
		$this->view("admin/template/header", $data);
		$this->view("admin/template/menu");
		$this->view("admin/index");
		$this->view("admin/template/footer");
	}
	public function module(): void
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$data['page'] = $_POST['page'];

			$data['title'] = "Admin";
			$this->view("admin/template/header", $data);
			$this->view("admin/template/menu");
			$this->view("admin/module/". $_POST['page'] ."/index");
			$this->view("admin/template/footer");

		}

		if (isset($_SESSION["moduleName"])) {
			$moduleName = $_SESSION['moduleName'];
			$data['title'] = "Admin";
			$this->view("admin/template/header", $data);
			$this->view("admin/template/menu");
			$this->view("admin/module/". $moduleName ."/index");
			$this->view("admin/template/footer");
		}

	}

	public function add()
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$data = [
				"username" => $_POST["username"],
				"password" => $_POST["password"],
				"nip" => $_POST["nip"],
				"nama" => $_POST["nama"],
				"ttl" => $_POST["ttl"],
				"jenis_kelamin" => $_POST["jenis_kelamin"],
				"alamat" => $_POST["alamat"],
				"no_telp" => $_POST["no_telp"]
			];

			$_SESSION["flashMessage"] = $this->model("Admin")->add($data);
			$_SESSION["moduleName"] = "dosen";
			unset($data);
			header("Location: " .  BASEURL . "/admin/module");
		}
	}
}