<?php

namespace controllers;

use core\Controller;

class Dpa extends Controller
{
	public function pageDpaMahasiswa()
	{
		$data['title'] = "Dosen";
		$data['dosen'] = $this->model("Dosen")->getDosen($_SESSION['username']);
		$data['history'] = $_SESSION['history']['Dpa'];
		$data['mahasiswa'] = $this->model("Admin")->getAllMahasiswa();
		$this->view("dosen/template/header", $data);
		$this->view("dosen/template/menu");
		$this->view("dosen/module/history/mahasiswa/index", $data);
		$this->view("dosen/template/footer");
	}

	public function pageDpaDetail()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$_SESSION['pageMhs']['NIM'] = $_POST['NIM'];
			header("location: " . BASEURL . "/Dosen/pageDetailMahasiswa");
		} else {
			$data['title'] = "Dosen";
//			$NIM = $_SESSION['pageMhs']['NIM'];
			$data['dosen'] = $this->model("Dosen")->getDosen($_SESSION['username']);
			$data['mahasiswa'] = $this->model("Mahasiswa")->getAllHistory($NIM);
			$this->view("dosen/template/header", $data);
			$this->view("dosen/template/menu");
			$this->view("dosen/module/history/mahasiswa/detail", $data);
			$this->view("dosen/template/footer");
		}
	}
}