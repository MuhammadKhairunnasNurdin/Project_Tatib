<?php

namespace controllers;

use core\Controller;

class Admin extends Controller
{
	public function index(): void
	{
		$data['title'] = "Admin";
		$this->view("admin/template/header", $data);
		$this->view("admin/template/menu");
		$this->view("admin/index");
		$this->view("admin/template/footer");
	}
	public function module(): void
	{
		$data['dosen'] = $this->model("Admin")->getDosen();
		$data['mahasiswa'] = $this->model("Admin")->getMahasiswa();
		$data['kelas'] = $this->model("Admin")->getAllKelas();

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if ($_POST['page'] == "dosen")
			{
//				$data['user'] = $this->model("Admin")->getDosen();
				$data['user'] = $data['dosen'];
			}

			if ($_POST['page'] == "mahasiswa")
			{
//				$data['user'] = $this->model("Admin")->getMahasiswa();
				$data['user'] = $data['mahasiswa'];
//				$data['kelas'] = $this->model("Admin")->getAllKelas();
			}

			$data['title'] = "Admin";
			$this->view("admin/template/header", $data);
			$this->view("admin/template/menu");
			$this->view("admin/module/". $_POST['page'] ."/index", $data);
			$this->view("admin/template/footer");
			return;
		}

		if (isset($_SESSION["moduleName"])) {
			$moduleName = $_SESSION['moduleName'];
			if ($moduleName == "dosen")
			{
//				$data['user'] = $this->model("Admin")->getDosen();
				$data['user'] = $data['dosen'];
			}

			if ($moduleName == "mahasiswa")
			{
//				$data['user'] = $this->model("Admin")->getMahasiswa();
				$data['user'] = $data['mahasiswa'];
			}
			$data['title'] = "Admin";
			$this->view("admin/template/header", $data);
			$this->view("admin/template/menu");
			$this->view("admin/module/". $moduleName ."/index", $data);
			$this->view("admin/template/footer");
			return;
		}


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
			header("Location: " .  BASEURL . "/Admin/module");
		}
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
			header("Location: " .  BASEURL . "/Admin/module");
		}
	}
}