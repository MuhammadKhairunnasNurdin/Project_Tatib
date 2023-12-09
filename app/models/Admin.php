<?php

namespace models;

use core\Database;

class Admin
{
	private Database $db;
	public function __construct()
	{
		$this->db = new Database();
	}
	public function __destruct() {
		unset($this->db);
	}

	public function edit()
	{

	}

	public function add()
	{

	}

	public function delete()
	{

	}

	public function verification()
	{

	}

	public function getDosen(): array
	{
		$this->db->prepare("SELECT * FROM dosen");
		return $this->db->resultSet();
	}

	public function getMahasiswa(): array
	{
		$this->db->prepare("SELECT * FROM mahasiswa");
		return $this->db->resultSet();
	}
}