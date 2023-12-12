<?php

namespace controllers;

use core\Controller;

class Admin extends Controller
{
	public function index(): void
	{
		$data['totalDosen'] = count($this->model("Admin")->getAllDosen());
		$data['totalMahasiswa'] = count($this->model("Admin")->getAllMahasiswa());
		$data['title'] = "Admin";
		$this->view("admin/template/header", $data);
		$this->view("admin/template/menu");
		$this->view("admin/index", $data);
		$this->view("admin/template/footer");
	}

	/*Page Dosen*/
	public function pageDosen(): void
	{
		$data['dosen'] = $this->model("Admin")->getAllDosen();
		$data['title'] = "Admin";
		$this->view("admin/template/header", $data);
		$this->view("admin/template/menu");
		$this->view("admin/module/dosen/index", $data);
		$this->view("admin/template/footer");
	}

	public function pageAddDosen(): void
	{
		$data['title'] = "Admin";
		$this->view("admin/template/header", $data);
		$this->view("admin/template/menu");
		$this->view("admin/module/dosen/add/index", $data);
		$this->view("admin/template/footer");
	}

	public function addDosen(): void
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$data = [
				"NIP" => $_POST["nip"],
				"nama" => $_POST["nama"],
				"tgl_lahir" => $_POST["tgl_lahir"],
				"jenis_kelamin" => $_POST["jenis_kelamin"],
				"alamat" => $_POST["alamat"],
				"no_telp" => $_POST["no_telp"]
			];

			$fkData = [
				"user" => [
					"username" => $_POST["username"],
					"password" => $_POST["password"],
					"level" => "dosen"
				],
			];

			$_SESSION["flashMessage"] = $this->model("Admin")->add("dosen", $data, $fkData);
			$_SESSION["moduleName"] = "dosen";
			unset($data);
			header("Location: " . BASEURL . "/Admin/pageDosen");
		}
	}

	public function editDosenPage(): void
	{
		$NIP = $_POST['NIP'];
		$data['dosen'] = $this->model("Admin")->getDosen($NIP);
		$data['title'] = "Admin";
		$this->view("admin/template/header", $data);
		$this->view("admin/template/menu");
		$this->view("admin/module/dosen/edit/index", $data);
		$this->view("admin/template/footer");
	}

	public function editUser(): void
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$data = [];

			/*receive data that non insertData and unset that*/
			$userLevel = $_POST['userLevel'];
			$fkData = [
				"user" => [
					"username" => $_POST["username"],
					"password" => $_POST["password"],
					"level" => strtolower($userLevel),
					"conditionEdit" => "id_user = " . $_POST["conditionFk"],
				],
			];
			unset($_POST["userLevel"]);
			unset($_POST['username']);
			unset($_POST['password']);
			unset($_POST["conditionFk"]);


			foreach ($_POST as $column => $value) {
					$data[$column] = $value;
			}

			$_SESSION["flashMessage"]["$userLevel"] = $this->model("Admin")->edit("$userLevel", $data, $fkData);
			unset($data);
			header("Location: " .  BASEURL . "/Admin/page" . ucfirst($userLevel));
		}

	}


	/*Page Mahasiswa*/
	public function pageMahasiswa()
	{
		$data['mahasiswa'] = $this->model("Admin")->getAllMahasiswa();
		$data['title'] = "Admin";
		$this->view("admin/template/header", $data);
		$this->view("admin/template/menu");
		$this->view("admin/module/mahasiswa/index", $data);
		$this->view("admin/template/footer");
	}

	public function pageAddMahasiswa()
	{
		$data['kelas'] = $this->model("Admin")->getAllKelas();
		$data['title'] = "Admin";
		$this->view("admin/template/header", $data);
		$this->view("admin/template/menu");
		$this->view("admin/module/mahasiswa/add/index", $data);
		$this->view("admin/template/footer");
	}

	public function addMahasiswa(): void
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$data = [
				"NIM" => $_POST["nim"],
				"nama" => $_POST["nama"],
				"tgl_lahir" => $_POST["tgl_lahir"],
				"jenis_kelamin" => $_POST["jenis_kelamin"],
				"alamat" => $_POST["alamat"],
				"no_telp" => $_POST["no_telp"],
				"kelas_id" => $_POST["kelas_id"]
			];

			$fkData = [
				"user" => [
					"username" => $_POST["username"],
					"password" => $_POST["password"],
					"level" => "mahasiswa"
				],
			];

			$_SESSION["flashMessage"] = $this->model("Admin")->add("mahasiswa", $data, $fkData);
			$_SESSION["moduleName"] = "mahasiswa";
			unset($data);
			header("Location: " . BASEURL . "/Admin/pageMahasiswa");
		}
	}

	public function editMahasiswaPage()
	{
		$NIM = $_POST['NIM'];
		$data['mahasiswa'] = $this->model("Admin")->getMahasiswa($NIM);
		$data['kelas'] = $this->model("Admin")->getAllKelas();
		$data['title'] = "Admin";
		$this->view("admin/template/header", $data);
		$this->view("admin/template/menu");
		$this->view("admin/module/mahasiswa/edit/index", $data);
		$this->view("admin/template/footer");
	}

	/*Page Validasi*/
	public function pageValidasi()
	{
		$data['title'] = "Admin";
		$this->view("admin/template/header", $data);
		$this->view("admin/template/menu");
		$this->view("admin/module/validasi/index", $data);
		$this->view("admin/template/footer");
	}

	public function pageDetailValidasi()
	{
		$data['title'] = "Admin";
		$this->view("admin/template/header", $data);
		$this->view("admin/template/menu");
		$this->view("admin/module/validasi/detail-validasi/index", $data);
		$this->view("admin/template/footer");
	}
}