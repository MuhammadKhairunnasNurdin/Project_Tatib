<?php

namespace controllers;

use core\Controller;

class Admin extends Controller
{
	public function index(): void
	{
		$data['totalDosen'] = count($this->model("HelperData")->getAllDosen());
		$data['totalMahasiswa'] = count($this->model("HelperData")->getAllMahasiswa());
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
		$data['dosen'] = $this->model("HelperData")->getAllDosen();
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
			$_SESSION['editDosen']['NIP'] = $_POST['NIP'];
			header("location: " . BASEURL . "/Admin/editDosenPage");
		} else {
			$NIP = $_SESSION['editDosen']['NIP'];
			$data['dosen'] = $this->model("HelperData")->getDosen($NIP);
			$data['kelas'] = $this->model("HelperData")->getAllKelas();
			$data['title'] = "Admin";
			$this->view("admin/template/header", $data);
			$this->view("admin/template/menu");
			$this->view("admin/module/dosen/edit/index", $data);
			$this->view("admin/template/footer");
		}
	}


	public function editUser(): void
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$data = [];
			$dataKelas = [];

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

			if (isset($_POST["id_dosen"]) AND isset($_POST["kelas_id"])) {
				setcookie("kelas_id", $_POST['kelas_id'], time() + 5, "/");
				setcookie("NIP", $_POST['id_dosen'], time() + 5, "/");
				$dataKelas = [
					'NIP' => $_POST["id_dosen"],
					'id_kelas' => $_POST["kelas_id"]
				];

				$this->model("Admin")->editKelas("kelas", $dataKelas);
				unset($_POST["id_dosen"]);
				unset($_POST["kelas_id"]);
			} else{
				unset($_POST['kelas_id']);
			}

			foreach ($_POST as $column => $value) {
				$data[$column] = $value;
			}

			var_dump($data);
			setcookie("userlevel", $userLevel, time() + 1, "/");
			setcookie("dosen", $data["NIP"], time() + 1, "/");

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
	public function pageMahasiswa()
	{
		$data['mahasiswa'] = $this->model("HelperData")->getAllMahasiswa();
		$data['title'] = "Admin";
		$this->view("admin/template/header", $data);
		$this->view("admin/template/menu");
		$this->view("admin/module/mahasiswa/index", $data);
		$this->view("admin/template/footer");
	}

	public function pageAddMahasiswa()
	{
		$data['kelas'] = $this->model("HelperData")->getAllKelas();
		$data['title'] = "Admin";
		$this->view("admin/template/header", $data);
		$this->view("admin/template/menu");
		$this->view("admin/module/mahasiswa/add/index", $data);
		$this->view("admin/template/footer");
	}

	public function editMahasiswaPage()
	{
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			$_SESSION['editMahasiswa']['NIM'] = $_POST['NIM'];
			header("location: " . BASEURL . "/Admin/editMahasiswaPage");
		} else {
			$NIM = $_SESSION['editMahasiswa']['NIM'];
			$data['mahasiswa'] = $this->model("HelperData")->getMahasiswa($NIM);
			$data['kelas'] = $this->model("HelperData")->getAllKelas();
			$data['title'] = "Admin";
			$this->view("admin/template/header", $data);
			$this->view("admin/template/menu");
			$this->view("admin/module/mahasiswa/edit/index", $data);
			$this->view("admin/template/footer");
		}
	}


	/*Page Validasi*/
	public function pageAdminValidasi(): void
	{
		$data['title'] = "Admin";
		$data['validasi'] = $_SESSION['history']['Admin'];
		$this->view("admin/template/header", $data);
		$this->view("admin/template/menu");
		$this->view("admin/module/validasi/index", $data);
		$this->view("admin/template/footer");
	}

	public function pageDetailValidasi(): void
	{
			$data['title'] = "Admin";
			$data['validasi'] = $_SESSION['detailHistory']['Admin'];
			$this->view("admin/template/header", $data);
			$this->view("admin/template/menu");
			$this->view("admin/module/validasi/detail-validasi/index", $data);
			$this->view("admin/template/footer");
	}

	public function validate()
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$_SESSION['flashMessage']['validate'] = $this->model("Admin")->validation($_POST['id_HP']);
			header("location: " . BASEURL . "/Admin/pageAdminValidasi");
		}
	}

	public function rejectValidation()
	{
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$_SESSION['flashMessage']['validate'] = $this->model("Admin")->reject($_POST['id_HP']);
			header("location: " . BASEURL . "/Admin/pageAdminValidasi");
		}
	}
}