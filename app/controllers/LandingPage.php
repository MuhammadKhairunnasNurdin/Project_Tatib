<?php

namespace controllers;

use core\Controller;

class LandingPage extends Controller
{
	public function index(): void
	 {
		 $data['title'] = "Home";
		 $data['style'] = "firstpage";
		 $data['tingkat'] =  $this->model("Peraturan")->getAllTingkatan();
		 $data['jenis'] = $this->model("Peraturan")->getAllJenisFromTingkatan($data['tingkat']);
		 $this->view("templates/header", $data);
		 $this->view("index", $data);
		 $this->view("templates/footer");
	 }
}