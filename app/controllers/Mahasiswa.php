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
		$data['history'] = $this->model("Mahasiswa")->getHistory($data['mahasiswa']['NIM']);
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
		$data['history'] = $this->model("Mahasiswa")->getHistory($data['mahasiswa']['NIM']);
		$this->view("mahasiswa/template/header", $data);
		$this->view("mahasiswa/template/menu");
		$this->view("mahasiswa/module/sanksi/index", $data);
		$this->view("mahasiswa/template/footer");
	}

	public function tingkat(): void
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$data['tingkatan'] =  $this->model("Mahasiswa")->getAllPeraturan("getTingkatan", $_POST['page']);
			$data['jenis'] = $this->model("Mahasiswa")->getAllPeraturan("getJenisTingkatan", $data['tingkatan']);
			$data['mahasiswa'] = $this->model("Mahasiswa")->getMahasiswa($_SESSION['username']);
			$data['title'] = "Mahasiswa";
			$data['tingkatan'] = "Tingkatan " . $_POST['page'];
			$this->view("mahasiswa/template/header", $data);
			$this->view("mahasiswa/template/menu");
			$this->view("mahasiswa/module/jenistatib/looks/index", $data);
			$this->view("mahasiswa/template/footer");
		}
	}

	public function rincian()
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$data['title'] = "Mahasiswa";
			$page = "";
			if ($_POST['pelanggaran_id'] === "Tingkat 1") {
				$page = '1';
			} elseif ($_POST['pelanggaran_id'] === "Tingkat 2") {
				$page = '2';
			} else {
				$page = 'bersama';
			}

			$data['mahasiswa'] = $this->model("Mahasiswa")->getMahasiswa($_SESSION['username']);
			$data['history'] = $this->model("Mahasiswa")->getHistorybyId($_POST['id_hp']);
			$this->view("mahasiswa/template/header", $data);
			$this->view("mahasiswa/template/menu");
			$this->view("mahasiswa/module/sanksi/input/sanksi-" . $page, $data);
			$this->view("mahasiswa/template/footer");
		}
	}

	public function uploadKompensasi()
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$_SESSION['flashMessage']['upload'] = $this->model("Mahasiswa")->upload($_POST['id_hp']);
			header("location: " . BASEURL . "/Mahasiswa/pageSanksi");
		}
	}
}