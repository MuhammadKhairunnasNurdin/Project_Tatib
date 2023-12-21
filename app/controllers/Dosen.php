<?php

namespace controllers;

use core\Controller;

class Dosen extends Controller
{
	public function index()
	{
		$data['title'] = "Dosen";
		$data['dosen'] = $this->model("Dosen")->getDosen($_SESSION['username']);
		$this->view("dosen/template/header", $data);
		$this->view("dosen/template/menu");
		$this->view("dosen/index", $data);
		$this->view("dosen/template/footer");
	}

	public function pageHistory()
	{
		$data['title'] = "Dosen";
		$data['dosen'] = $this->model("Dosen")->getDosen($_SESSION['username']);
		$this->view("dosen/template/header", $data);
		$this->view("dosen/template/menu");
		$this->view("dosen/module/history/index", $data);
		$this->view("dosen/template/footer");
	}

	public function pageLaporan()
	{
		$data['title'] = "Dosen";
		$data['dosen'] = $this->model("Dosen")->getDosen($_SESSION['username']);
		$data['kelas'] = $this->model("HelperData")->getAllKelas();
		$data['mahasiswa'] = $this->model("HelperData")->getAllMahasiswa();
		$data['tingkat'] = $this->model("Dosen")->getAllPeraturan("getAllTingkatan");
		$data['jenis'] = $this->model("Dosen")->getAllPeraturan("getAllJenisTingkatan");
		$data['sanksi'] = $this->model("Dosen")->getAllPeraturan("getAllSanksi");
		$this->view("dosen/template/header", $data);
		$this->view("dosen/template/menu");
		$this->view("dosen/module/laporan/index", $data);
		$this->view("dosen/template/footer");
	}

	public function pageTatib()
	{
		$data['title'] = "Dosen";
		$data['dosen'] = $this->model("Dosen")->getDosen($_SESSION['username']);
		$data['tingkat'] =  $this->model("Dosen")->getAllPeraturan("getAllTingkatan");
		$data['jenis'] = $this->model("Dosen")->getAllPeraturan("getAllJenisFromTingkatan", $data['tingkat']);
		$this->view("dosen/template/header", $data);
		$this->view("dosen/template/menu");
		$this->view("dosen/module/tatib/index", $data);
		$this->view("dosen/template/footer");
	}

	public function addLaporan()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST")
		{
			$data = [];
			$tableName = "history_pelanggaran";

			if (isset($_FILES['bukti_pelanggaran'])) {
				$imageData = [
					'name' => $_FILES['bukti_pelanggaran']['name'],
					'tmp_name' => $_FILES['bukti_pelanggaran']['tmp_name']
				];
				$data['bukti_pelanggaran'] = $imageData;
			}

			foreach ($_POST as $column => $value) {
				$data[$column] = $value;
			}

			$nim = $data['NIM'];

			$_SESSION["flashMessage"]["$tableName"] = $this->model("Dosen")->report("$tableName", $nim, $data);
			unset($data);
			header("location: " . BASEURL . "/Dosen/index");
		}
	}

	public function pageDosenHistory()
	{
		$data['title'] = "Dosen";
		$data['lapor'] = $_SESSION['history']['Dosen'];
		$this->view("dosen/template/header", $data);
		$this->view("dosen/template/menu");
		$this->view("dosen/module/history/terlapor/index", $data);
		$this->view("dosen/template/footer");
	}

	public function pageDetailTerlapor()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$_SESSION['pageTerlapor']['NIM'] = $_POST['NIM'];
			header("location: " . BASEURL . "/Dosen/pageDetailTerlapor");
		} else {
			$data['title'] = "Dosen";
			$NIM = $_SESSION['pageTerlapor']['NIM'];
			$data['dosen'] = $this->model("Dosen")->getDosen($_SESSION['username']);
			$data['mahasiswa'] = $this->model("Mahasiswa")->getAllHistory($NIM);
			$this->view("dosen/template/header", $data);
			$this->view("dosen/template/menu");
			$this->view("dosen/module/history/terlapor/detail", $data);
			$this->view("dosen/template/footer");
		}
	}

	public function pageDetail()
	{
		$data['title'] = "Dosen";
		$data['dosen'] = $this->model("Dosen")->getDosen($_SESSION['username']);
		$data['history'] = $_SESSION['detailHistory']['Dosen'];
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