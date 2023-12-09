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
			if ($_POST['page'] == "dosen")
			{
				$data['user'] = $this->model("Admin")->getDosen();
			}

			if ($_POST['page'] == "mahasiswa")
			{
				$data['user'] = $this->model("Admin")->getMahasiswa();
			}

			$data['title'] = "Admin";
			$this->view("admin/template/header", $data);
			$this->view("admin/template/menu");
			$this->view("admin/module/". $_POST['page'] ."/index", $data);
			$this->view("admin/template/footer");

		}

	}
}