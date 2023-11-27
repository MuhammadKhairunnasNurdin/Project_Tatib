<?php

namespace models;

class Login
{
	public function cek_login()
	{

	}

	public function logout()
	{
		session_destroy();
		require_once "app/controllers.php";
	}
}