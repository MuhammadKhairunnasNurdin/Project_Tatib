<?php

namespace controllers;

use core\Controller;

class Landing extends Controller
{
 public function index () {
	 $data['title'] = "Home";
	 $this->view("templates/header", $data);
	 $this->view("index");
	 $this->view("templates/footer");
 }
}