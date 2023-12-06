<?php

namespace controllers;

use core\Controller;

class LandingPage extends Controller
{
	public function index(): void
	 {
		 $data['title'] = "Home";
		 $data['tingkat'] =  $this->model("Pelanggaran")->getAllTingkatan();
		 $data['jenis'] = $this->model("Pelanggaran")->getAllJenisFromTingkatan($data['tingkat']);
		 $this->view("templates/header", $data);
		 $this->view("index", $data);
		 $this->view("templates/footer");
	 }
}