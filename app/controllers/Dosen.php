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

	public function pageHistory()
	{
			$data['title'] = "Dosen";
			$this->view("dosen/template/header", $data);
			$this->view("dosen/template/menu");
			$this->view("dosen/module/history/index", $data);
			$this->view("dosen/template/footer");
	}

	public function pageLaporan()
	{
			$data['title'] = "Dosen";
			$data['kelas'] = $this->model("Admin")->getAllKelas();
			$data['mahasiswa'] = $this->model("Admin")->getAllMahasiswa();
			$this->view("dosen/template/header", $data);
			$this->view("dosen/template/menu");
			$this->view("dosen/module/laporan/index", $data);
			$this->view("dosen/template/footer");
	}

	public function pageTatib()
	{
			$data['title'] = "Dosen";
			$data['tingkat'] =  $this->model("Pelanggaran")->getAllTingkatan();
			$data['jenis'] = $this->model("Pelanggaran")->getAllJenisFromTingkatan($data['tingkat']);
			$this->view("dosen/template/header", $data);
			$this->view("dosen/template/menu");
			$this->view("dosen/module/tatib/index", $data);
			$this->view("dosen/template/footer");
	}

	public function addLaporan()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST")
		{

			header("location: " . BASEURL . "/Dosen/index");
		}
	}
}