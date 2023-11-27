<?php

namespace controllers;

use core\Controller;

class Login extends Controller
{
    public function index()
    {
		$this->view("templates/header");
        $this->view("login");
		$this->view("templates/footer");
    }
}