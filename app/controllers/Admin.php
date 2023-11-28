<?php

namespace controllers;

use core\Controller;

class Admin extends Controller
{
	public function index(): void
	{
		$data['title'] = "Admin";
		$this->view("templates/header", $data);
		$this->view("admin/index");
		$this->view("templates/footer");
	}
}