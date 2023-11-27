<?php

namespace controllers;

use core\Controller;

class Dosen extends Controller
{
	public function index()
	{
		$data['title'] = "Dosen";
		$this->view("templates/header", $data);
		$this->view("dosen/index");
		$this->view("templates/footer");
	}
}