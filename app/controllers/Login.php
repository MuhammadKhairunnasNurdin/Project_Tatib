<?php

namespace controllers;

use core\Controller;

class Login extends Controller
{
    public function index()
    {
		$data['title'] = "Login";
		$this->view("templates/header", $data);
        $this->view("login");
		$this->view("templates/footer");
    }
}