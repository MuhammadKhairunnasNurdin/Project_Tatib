<?php

namespace controllers;

use core\Controller;

class Dpa extends Controller
{
	public function pageDpaMahasiswa()
	{
		$data['title'] = "Dosen";
		$data['dosen'] = $this->model("Dosen")->getDosen($_SESSION['username']);
//		$data['history'] = $_SESSION['history']['Dpa'];
		$data['mahasiswa'] = $this->model("HelperData")->getAllMahasiswa();
		$this->view("dosen/template/header", $data);
		$this->view("dosen/template/menu");
		$this->view("dosen/module/history/mahasiswa/index", $data);
		$this->view("dosen/template/footer");
	}

	public function pageDpaDetail()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$_SESSION['pageMhs']['NIM'] = $_POST['NIM'];
			header("location: " . BASEURL . "/Dpa/pageDpaDetail");
		} else {
			$data['title'] = "Dosen";
			$NIM = $_SESSION['pageMhs']['NIM'];
			$data['dosen'] = $this->model("Dosen")->getDosen($_SESSION['username']);
			$data['mahasiswa'] = $this->model("HelperData")->getAllMahasiswa();
			$data['history'] = $this->model("Mahasiswa")->getAllHistory($NIM);
			$this->view("dosen/template/header", $data);
			$this->view("dosen/template/menu");
			$this->view("dosen/module/history/mahasiswa/detail", $data);
			$this->view("dosen/template/footer");
		}
	}

	public function pageDetail()
	{
		$data['title'] = "Dosen";
		$data['dosen'] = $this->model("Dosen")->getDosen($_SESSION['username']);
		$data['history'] = $_SESSION['detailHistory']['Dpa'];
		$page = "";

		if ($data['history']['tingkatan'] === "Tingkat 1") {
			$page = "1";
		} else if ($data['history']['tingkatan'] === "Tingkat 2") {
			$page = "2";
		} else {
			$page = "3";
		}

		$this->view("dosen/template/header", $data);
		$this->view("dosen/template/menu");
		$this->view("dosen/module/history/detail_history/sanksi-$page", $data);
		$this->view("dosen/template/footer");
	}
}