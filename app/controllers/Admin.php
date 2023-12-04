<?php

namespace controllers;

use core\Controller;

class Admin extends Controller
{
	public function index(): void
	{
		$data['title'] = "Admin";
		$this->view("templates/header", $data);
		$this->view("admin/index");
		$this->view("templates/footer");
	}
	public function module(): void
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			// $data['modul'] = $_POST['modul'];

			$data['title'] = "Admin";
			$this->view("admin/template/header", $data);
			$this->view("admin/template/menu");
			$this->view("admin/module/". $_POST['page'] ."/index");
			$this->view("admin/template/footer");
		}

	}
}