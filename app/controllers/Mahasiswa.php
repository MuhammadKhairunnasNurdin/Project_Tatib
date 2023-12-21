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
		$this->view("mahasiswa/template/menu", $data);
		$this->view("mahasiswa/index", $data);
		$this->view("mahasiswa/template/footer");
	}

	public function pageMahasiswaHistory()
	{
		$data['title'] = "Mahasiswa";
		$data['mahasiswa'] = $this->model("Mahasiswa")->getMahasiswa($_SESSION['username']);
		$data['history'] = $_SESSION['history']['Mahasiswa'];
		$this->view("mahasiswa/template/header", $data);
		$this->view("mahasiswa/template/menu", $data);
		$this->view("mahasiswa/module/history/index", $data);
		$this->view("mahasiswa/template/footer");
	}

	public function pageJenisTatib()
	{
		$data['title'] = "Mahasiswa";
		$data['mahasiswa'] = $this->model("Mahasiswa")->getMahasiswa($_SESSION['username']);
		$this->view("mahasiswa/template/header", $data);
		$this->view("mahasiswa/template/menu", $data);
		$this->view("mahasiswa/module/jenistatib/index", $data);
		$this->view("mahasiswa/template/footer");
	}

	public function pageMahasiswaSanksi()
	{
		$data['title'] = "Mahasiswa";
		$data['mahasiswa'] = $this->model("Mahasiswa")->getMahasiswa($_SESSION['username']);
		$data['history'] = $_SESSION['history']['Mahasiswa'];
		$this->view("mahasiswa/template/header", $data);
		$this->view("mahasiswa/template/menu", $data);
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
			$this->view("mahasiswa/template/menu", $data);
			$this->view("mahasiswa/module/jenistatib/looks/index", $data);
			$this->view("mahasiswa/template/footer");

		}
	}

	public function pageRincian()
	{
			$page = $_SESSION['detailHistory']['Mahasiswa']['pelanggaran_id'];
			if ($page === "Tingkat 1") {
				$page = '1';
			} elseif ($page === "Tingkat 2") {
				$page = '2';
			} else {
				$page = 'bersama';
			}

			setcookie("page", $page, time() + 10, "/");

			$data['title'] = "Mahasiswa";
			$data['mahasiswa'] = $this->model("Mahasiswa")->getMahasiswa($_SESSION['username']);
			$data['history'] = $_SESSION['detailHistory']['Mahasiswa'];
			$this->view("mahasiswa/template/header", $data);
			$this->view("mahasiswa/template/menu", $data);
			$this->view("mahasiswa/module/sanksi/input/sanksi-" . $page, $data);
			$this->view("mahasiswa/template/footer");
	}

	public function uploadKompensasi()
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$data = [];
			if (isset($_FILES['kompensasi'])) {
				$imageData = [
					'name' => $_FILES['kompensasi']['name'],
					'tmp_name' => $_FILES['kompensasi']['tmp_name']
				];
				$data = $imageData;
			}
			$id = $_POST["id_HP"];
			$_SESSION['flashMessage']['upload'] = $this->model("Mahasiswa")->upload($data, $id);
			header("location: " . BASEURL . "/HistoryPelanggaran/allHistory");
		}
	}
}