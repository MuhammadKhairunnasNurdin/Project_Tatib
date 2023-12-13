<?php

namespace models;

use core\Database;
use core\FlashMessage;

class Mahasiswa
{
	private Database $db;
	private FlashMessage $fm;

	public function __destruct()
	{
		unset($this->db);
	}
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new FlashMessage();
	}


	public function showHistory()
	{

	}

	public function upload()
	{

	}

	public function getMahasiswa($username)
	{
		$this->db->prepare("SELECT * FROM mahasiswa m JOIN [user] u ON m.user_id = u.id_user WHERE u.username=:username");
		$this->db->bind(":username", $username);
		return $this->db->resultSet();
	}
}