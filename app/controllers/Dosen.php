<?php

namespace controllers;

use core\Controller;

class Dosen extends Controller
{
	public function index()
	{
		$data['title'] = "Dosen";
		$data['ovf'] = "1";
		$this->view("dosen/template/header", $data);
		$this->view("dosen/template/menu");
		$this->view("dosen/index");
		$this->view("dosen/template/footer");
	}

	public function pageHistory()
	{
		$data['title'] = "Dosen";
		$data['ovf'] = "1";
		$this->view("dosen/template/header", $data);
		$this->view("dosen/template/menu");
		$this->view("dosen/module/history/index", $data);
		$this->view("dosen/template/footer");
	}

	public function pageLaporan()
	{
		$data['title'] = "Dosen";
		$data['ovf'] = "1";
		$data['kelas'] = $this->model("Admin")->getAllKelas();
		$data['mahasiswa'] = $this->model("Admin")->getAllMahasiswa();
		$data['tingkat'] = $this->model("Peraturan")->getAllTingkatan();
		$data['jenis'] = $this->model("Peraturan")->getAllJenisTingkatan();
		$data['sanksi'] = $this->model("Peraturan")->getAllSanksi();
		$this->view("dosen/template/header", $data);
		$this->view("dosen/template/menu");
		$this->view("dosen/module/laporan/index", $data);
		$this->view("dosen/template/footer");
	}

	public function pageTatib()
	{
		$data['title'] = "Dosen";
		$data['ovf'] = "0";
		$data['tingkat'] =  $this->model("Peraturan")->getAllTingkatan();
		$data['jenis'] = $this->model("Peraturan")->getAllJenisFromTingkatan($data['tingkat']);
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

			foreach ($_POST as $column => $value) {
				$data[$column] = $value;
			}
			$_SESSION["flashMessage"]["$tableName"] = $this->model("Dosen")->report("$tableName", $data);
			unset($data);
			header("location: " . BASEURL . "/Dosen/index");
		}
	}

	public function pageTerlapor()
	{
		$data['title'] = "Dosen";
		$data['ovf'] = "1";
		$this->view("dosen/template/header", $data);
		$this->view("dosen/template/menu");
		$this->view("dosen/module/history/terlapor/index", $data);
		$this->view("dosen/template/footer");
	}

	public function pageMahasiswa()
	{
		$data['title'] = "Dosen";
		$data['ovf'] = "1";
		$this->view("dosen/template/header", $data);
		$this->view("dosen/template/menu");
		$this->view("dosen/module/history/mahasiswa/index", $data);
		$this->view("dosen/template/footer");
	}
}