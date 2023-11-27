<?php

namespace controllers;

use core\Controller;

class Dosen extends Controller
{
	public function index()
	{
		$this->view("templates/header");
		$this->view("dosen/index");
		$this->view("templates/footer");
	}
}