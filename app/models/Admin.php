<?php

namespace models;

use core\Database;
use core\FlashMessage;

class Admin
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

	public function edit()
	{

	}

	public function add($tableName, $addData = [], $fkData = [])
	{
		if (isset($fkData)) {
			/*is sql server we cannot bindValue() to varbinary*/
			if ($this->db->dbType === "SQLSERVER" && array_key_exists("user", $fkData)) {
				$userData = $fkData['user'];
				$username = $this->db->antiDbInjection($userData['username']);
				$password = $this->db->antiDbInjection($userData['password']);
				$level = $this->db->antiDbInjection($userData['level']);
				$this->db->prepare("INSERT INTO [user](username, password, level) VALUES ('$username', CONVERT(varbinary(256), '$password'), '$level')");
				$this->db->execute();
			} else {
				foreach ($fkData as $elm => $value) {
					$this->db->insert($elm, $value);
				}
			}
		}
		$isInsertSuccess = $this->db->insert($tableName, $addData);
		$message = null;
		if ($isInsertSuccess) {
			$this->fm->message("success", "adding data dosen is success");
			$message = $this->fm->getFlashData("success");
		} else {
			$this->fm->message("warning", "error occur in adding data dosen");
			$message =  $this->fm->getFlashData("warning");
		}
		return $message;
	}

	public function delete()
	{
		// tes
	}

	public function verification()
	{

	}

	public function getDosen(): array
	{
		$this->db->prepare("SELECT d.NIP AS NIP, d.nama AS nama, alamat, no_telp, k.nama AS kelas FROM dosen d LEFT OUTER JOIN kelas k ON d.NIP = k.NIP");
		return $this->db->resultSet();
	}

	public function getMahasiswa(): array
	{
		$this->db->prepare("SELECT * FROM mahasiswa");
		return $this->db->resultSet();
	}
}