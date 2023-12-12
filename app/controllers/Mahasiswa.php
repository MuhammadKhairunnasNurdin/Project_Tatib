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
			$data['tingkat'] =  $this->model("Pelanggaran")->getAllTingkatan();
			$data['jenis'] = $this->model("Pelanggaran")->getAllJenisFromTingkatan($data['tingkat']);
			$data['title'] = "Mahasiswa";
			$this->view("Mahasiswa/template/header", $data);
			$this->view("Mahasiswa/template/menu");
			$this->view("Mahasiswa/module/". $_POST['page'] ."/index", $data);
			$this->view("Mahasiswa/template/footer");

		}
	}

	public function pageHistory()
	{
			$data['title'] = "Mahasiswa";
			$this->view("mahasiswa/template/header", $data);
			$this->view("mahasiswa/template/menu");
			$this->view("mahasiswa/module/history/index", $data);
			$this->view("mahasiswa/template/footer");
	}

	public function pageJenisTatib()
	{
			$data['title'] = "Mahasiswa";
			$this->view("mahasiswa/template/header", $data);
			$this->view("mahasiswa/template/menu");
			$this->view("mahasiswa/module/jenistatib/index", $data);
			$this->view("mahasiswa/template/footer");
	}

	public function pageSanksi()
	{
			$data['title'] = "Mahasiswa";
			$this->view("mahasiswa/template/header", $data);
			$this->view("mahasiswa/template/menu");
			$this->view("mahasiswa/module/sanksi/index", $data);
			$this->view("mahasiswa/template/footer");
	}



	public function tingkat(): void
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$data['tingkatan'] =  $this->model("Pelanggaran")->getTingkatan($_POST['page']);
			$data['jenis'] = $this->model("Pelanggaran")->getAllJenisTingkatan($data['tingkatan']);
			$data['title'] = "Mahasiswa";
			$data['tingkatan'] = "Tingkatan " . $_POST['page'];
			$this->view("Mahasiswa/template/header", $data);
			$this->view("Mahasiswa/template/menu");
			$this->view("Mahasiswa/module/jenistatib/looks/index", $data);
			$this->view("Mahasiswa/template/footer");

		}
	}
}