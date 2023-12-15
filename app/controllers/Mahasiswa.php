<?php

namespace controllers;

use core\Controller;

class Mahasiswa extends Controller
{
	public function index(): void
	{
		$data['title'] = "Mahasiswa";
		$data['mahasiswa'] = $this->model("Mahasiswa")->getMahasiswa($_SESSION['username']);
		$this->view("mahasiswa/template/header", $data);
		$this->view("mahasiswa/template/menu");
		$this->view("mahasiswa/index", $data);
		$this->view("mahasiswa/template/footer");
	}

	public function pageHistory()
	{
		$data['title'] = "Mahasiswa";
		$data['mahasiswa'] = $this->model("Mahasiswa")->getMahasiswa($_SESSION['username']);
		$this->view("mahasiswa/template/header", $data);
		$this->view("mahasiswa/template/menu");
		$this->view("mahasiswa/module/history/index", $data);
		$this->view("mahasiswa/template/footer");
	}

	public function pageJenisTatib()
	{
		$data['title'] = "Mahasiswa";
		$data['mahasiswa'] = $this->model("Mahasiswa")->getMahasiswa($_SESSION['username']);
		$this->view("mahasiswa/template/header", $data);
		$this->view("mahasiswa/template/menu");
		$this->view("mahasiswa/module/jenistatib/index", $data);
		$this->view("mahasiswa/template/footer");
	}

	public function pageSanksi()
	{
		$data['title'] = "Mahasiswa";
		$data['mahasiswa'] = $this->model("Mahasiswa")->getMahasiswa($_SESSION['username']);
		$this->view("mahasiswa/template/header", $data);
		$this->view("mahasiswa/template/menu");
		$this->view("mahasiswa/module/sanksi/index", $data);
		$this->view("mahasiswa/template/footer");
	}

	public function tingkat(): void
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$data['tingkatan'] =  $this->model("Peraturan")->getTingkatan($_POST['page']);
			$data['jenis'] = $this->model("Peraturan")->getJenisTingkatan($data['tingkatan']);
			$data['mahasiswa'] = $this->model("Mahasiswa")->getMahasiswa($_SESSION['username']);
			$data['title'] = "Mahasiswa";
			$data['tingkatan'] = "Tingkatan " . $_POST['page'];
			$this->view("mahasiswa/template/header", $data);
			$this->view("mahasiswa/template/menu");
			$this->view("mahasiswa/module/jenistatib/looks/index", $data);
			$this->view("mahasiswa/template/footer");
		}
	}
}