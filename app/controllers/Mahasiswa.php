<?php

namespace controllers;

use core\Controller;

class Mahasiswa extends Controller
{
	public function index()
	{
		$data['title'] = "Mahasiswa";
		$this->view("templates/header", $data);
		$this->view("mahasiswa/index");
		$this->view("templates/footer");
	}
}