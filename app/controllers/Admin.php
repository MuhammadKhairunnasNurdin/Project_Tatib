<?php

namespace controllers;

use core\Controller;

class Admin extends Controller
{
	public function index(): void
	{
		$data['totalDosen'] = count($this->model("Admin")->getAllDosen());
		$data['totalMahasiswa'] = count($this->model("Admin")->getAllMahasiswa());
		$data['admin'] = $this->model("Admin")->getAdmin($_SESSION['username']);
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

	public function addUser(): void
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$data = [];

			/*receive data that non insertData and unset that*/
			$userLevel = $_POST['userLevel'];
			$fkData = [
				"user" => [
					"username" => $_POST["username"],
					"password" => $_POST["password"],
					"level" => strtolower($userLevel)
				]
			];
			unset($_POST["userLevel"]);
			unset($_POST['username']);
			unset($_POST['password']);


			foreach ($_POST as $column => $value) {
				$data[$column] = $value;
			}

			$_SESSION["flashMessage"]["$userLevel"] = $this->model("Admin")->add("$userLevel", $data, $fkData);
			unset($data);
			header("Location: " .  BASEURL . "/Admin/page" . ucfirst($userLevel));
		}
	}

	public function editDosenPage(): void
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$NIP = $_POST['NIP'];
			$data['dosen'] = $this->model("Admin")->getDosen($NIP);
			$data['kelas'] = $this->model("Admin")->getAllKelas();
			$data['title'] = "Admin";
			$this->view("admin/template/header", $data);
			$this->view("admin/template/menu");
			$this->view("admin/module/dosen/edit/index", $data);
			$this->view("admin/template/footer");
		}
	}

	public function editDosen()
	{

		header("location: " . BASEURL . "/Admin/pageDosen");
	}

	public function editUser(): void
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$data = [];

			/*receive data that non updateData and unset that*/
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
			header("Location: " . BASEURL . "/Admin/page" . ucfirst($userLevel));
		}
	}

	public function deleteUser(): void
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$userLevel = $_POST['userLevel'];
			$idData = $_POST['idData'];
			$idName = $_POST['idName'];

			$_SESSION["flashMessage"]["$userLevel"] = $this->model("Admin")->delete("$userLevel", $idName, $idData);
			header("Location: " .  BASEURL . "/Admin/page" . ucfirst($userLevel));
		}
	}

	/*Page Mahasiswa*/
	public function pageMahasiswa(): void
	{
		$data['mahasiswa'] = $this->model("Admin")->getAllMahasiswa();
		$data['title'] = "Admin";
		$this->view("admin/template/header", $data);
		$this->view("admin/template/menu");
		$this->view("admin/module/mahasiswa/index", $data);
		$this->view("admin/template/footer");
	}

	public function pageAddMahasiswa(): void
	{
		$data['kelas'] = $this->model("Admin")->getAllKelas();
		$data['title'] = "Admin";
		$this->view("admin/template/header", $data);
		$this->view("admin/template/menu");
		$this->view("admin/module/mahasiswa/add/index", $data);
		$this->view("admin/template/footer");
	}

	public function editMahasiswaPage()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$NIM = $_POST['NIM'];
			$data['mahasiswa'] = $this->model("Admin")->getMahasiswa($NIM);
			$data['kelas'] = $this->model("Admin")->getAllKelas();
			$data['title'] = "Admin";
			$this->view("admin/template/header", $data);
			$this->view("admin/template/menu");
			$this->view("admin/module/mahasiswa/edit/index", $data);
			$this->view("admin/template/footer");
		}
	}

	public function editMahasiswa()
	{

		header("location: " . BASEURL . "/Admin/pageMahasiswa");
	}

	/*Page Validasi*/
	public function pageValidasi(): void
	{
		$data['title'] = "Admin";
		$this->view("admin/template/header", $data);
		$this->view("admin/template/menu");
		$this->view("admin/module/validasi/index", $data);
		$this->view("admin/template/footer");
	}

	public function pageDetailValidasi(): void
	{
		$data['title'] = "Admin";
		$this->view("admin/template/header", $data);
		$this->view("admin/template/menu");
		$this->view("admin/module/validasi/detail-validasi/index", $data);
		$this->view("admin/template/footer");
	}
}