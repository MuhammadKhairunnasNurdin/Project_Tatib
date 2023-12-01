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
		if ($_SERVER["REQUIRE_METHOD"] == "POST") {
			$data['modul'] = $_POST['modul'];

			$data['title'] = "Admin";
			$this->view("templates/header", $data);
			$this->view("admin/module/". $_POST['modul'] ."/index");
			$this->view("templates/footer");

		}

	}
}