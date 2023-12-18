<?php

namespace controllers;

use core\Controller;

class Dosen extends Controller
{
	public function index()
	{
		$data['title'] = "Dosen";
		$data['ovf'] = "1";
		$data['dosen'] = $this->model("Dosen")->getDosen($_SESSION['username']);
		$this->view("dosen/template/header", $data);
		$this->view("dosen/template/menu");
		$this->view("dosen/index", $data);
		$this->view("dosen/template/footer");
	}

	public function pageHistory()
	{
		$data['title'] = "Dosen";
		$data['ovf'] = "1";
		$data['dosen'] = $this->model("Dosen")->getDosen($_SESSION['username']);
		$this->view("dosen/template/header", $data);
		$this->view("dosen/template/menu");
		$this->view("dosen/module/history/index", $data);
		$this->view("dosen/template/footer");
	}

	public function pageLaporan()
	{
		$data['title'] = "Dosen";
		$data['ovf'] = "1";
		$data['dosen'] = $this->model("Dosen")->getDosen($_SESSION['username']);
		$data['kelas'] = $this->model("Admin")->getAllKelas();
		$data['mahasiswa'] = $this->model("Admin")->getAllMahasiswa();
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
		$data['ovf'] = "0";
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

	public function pageTerlapor()
	{
		$data['title'] = "Dosen";
		$data['ovf'] = "1";
		$data['dosen'] = $this->model("Dosen")->getDosen($_SESSION['username']);
		$this->view("dosen/template/header", $data);
		$this->view("dosen/template/menu");
		$this->view("dosen/module/history/terlapor/index", $data);
		$this->view("dosen/template/footer");
	}

	public function pageMahasiswa()
	{
		$data['title'] = "Dosen";
		$data['ovf'] = "1";
		$data['dosen'] = $this->model("Dosen")->getDosen($_SESSION['username']);
		$this->view("dosen/template/header", $data);
		$this->view("dosen/template/menu");
		$this->view("dosen/module/history/mahasiswa/index", $data);
		$this->view("dosen/template/footer");
	}
}