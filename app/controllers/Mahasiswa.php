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
		$data['history'] = $this->model("Mahasiswa")->getAllHistory($data['mahasiswa']['NIM']);
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
		$data['history'] = $this->model("Mahasiswa")->getAllHistory($data['mahasiswa']['NIM']);
		$this->view("mahasiswa/template/header", $data);
		$this->view("mahasiswa/template/menu");
		$this->view("mahasiswa/module/sanksi/index", $data);
		$this->view("mahasiswa/template/footer");
	}

	public function tingkat(): void
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$_SESSION['tingkat']['page'] = $_POST['page'];
			header("location: " . BASEURL . "/Mahasiswa/tingkat");
		} else {
			$data['title'] = "Mahasiswa";
			$data['mahasiswa'] = $this->model("Mahasiswa")->getMahasiswa($_SESSION['username']);

			if (isset($_SESSION['tingkat']['page'])){
				$data['tingkatan'] =  $this->model("Mahasiswa")->getAllPeraturan("getTingkatan", $_SESSION['tingkat']['page']);
				$data['jenis'] = $this->model("Mahasiswa")->getAllPeraturan("getJenisTingkatan", $data['tingkatan']);
				$data['tingkatan'] = "Tingkatan " . $_SESSION['tingkat']['page'];
			} else {
				$data['tingkatan'] =  $this->model("Mahasiswa")->getAllPeraturan("getTingkatan", $_POST['page']);
				$data['jenis'] = $this->model("Mahasiswa")->getAllPeraturan("getJenisTingkatan", $data['tingkatan']);
				$data['tingkatan'] = "Tingkatan " . $_POST['page'];
			}

			$this->view("mahasiswa/template/header", $data);
			$this->view("mahasiswa/template/menu");
			$this->view("mahasiswa/module/jenistatib/looks/index", $data);
			$this->view("mahasiswa/template/footer");

		}
	}

	public function rincian()
	{
		if ($_SERVER["REQUEST_METHOD"] === "POST") {
			$data['title'] = "Mahasiswa";
			$page = "";
			if ($_POST['pelanggaran_id'] === "Tingkat 1") {
				$page = '1';
			} elseif ($_POST['pelanggaran_id'] === "Tingkat 2") {
				$page = '2';
			} else {
				$page = 'bersama';
			}

			$_SESSION['rincian']['page'] = $page;
			$_SESSION['rincian']['id_hp'] = $_POST['id_hp'];
			header("location: " . BASEURL . "/Mahasiswa/rincian");
		} else {
			$data['title'] = "Mahasiswa";
			$data['mahasiswa'] = $this->model("Mahasiswa")->getMahasiswa($_SESSION['username']);
			$id_hp = $_SESSION['rincian']['id_hp'];
			$page = $_SESSION['rincian']['page'];
			$data['history'] = $this->model("Mahasiswa")->getHistorybyId($id_hp);
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