<?php

namespace controllers;

use core\Controller;

class Mahasiswa extends Controller
{
	public function index(): void
	{
		$data['title'] = "Mahasiswa";
		$this->view("mahasiswa/template/header", $data);
		$this->view("mahasiswa/template/menu");
		$this->view("mahasiswa/index");
		$this->view("mahasiswa/template/footer");
	}

	public function module(): void
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$data['page'] = $_POST['page'];

			$data['title'] = "Mahasiswa";
			$this->view("Mahasiswa/template/header", $data);
			$this->view("Mahasiswa/template/menu");
			$this->view("Mahasiswa/module/". $_POST['page'] ."/index");
			$this->view("Mahasiswa/template/footer");

		}
	}
}