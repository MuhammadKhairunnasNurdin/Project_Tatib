<?php

namespace controllers;

use core\Controller;

class Dosen extends Controller
{
	public function index()
	{
		$data['title'] = "Dosen";
		$this->view("dosen/template/header", $data);
		$this->view("dosen/template/menu");
		$this->view("dosen/index");
		$this->view("dosen/template/footer");
	}
	public function module(): void
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$data['page'] = $_POST['page'];

			$data['title'] = "Dosen";
			$data['tingkat'] =  $this->model("Pelanggaran")->getAllTingkatan();
			$data['jenis'] = $this->model("Pelanggaran")->getAllJenisFromTingkatan($data['tingkat']);
			$this->view("dosen/template/header", $data);
			$this->view("dosen/template/menu");
			$this->view("dosen/module/". $_POST['page'] ."/index", $data);
			$this->view("dosen/template/footer");

		}

	}
}