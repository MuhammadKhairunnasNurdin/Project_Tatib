<?php

namespace models;

use core\Database;
use core\FlashMessage;

require_once("IGetterHistory.php");
require_once("Peraturan.php");

class Mahasiswa implements IGetterHistory
{
	private Peraturan $object;
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

	public function getPelanggaran(string $funcName)
	{
		return $this->object->$funcName();
	}

	public function getHistory($additionalData = null): array
	{
		if (isset($additionalData)) {
			$this->db->prepare("SELECT * FROM history_pelanggaran WHERE NIM =:NIM");
			$additionalData = $this->db->antiDbInjection($additionalData);
			$this->db->bind(":NIM", $additionalData);
			return $this->db->resultSet();
		}
		return [];
	}

	public function upload()
	{

	}

	public function getMahasiswa($username)
	{
		$this->db->prepare("SELECT * FROM mahasiswa m JOIN user u ON m.user_id = u.id_user WHERE u.username=:username");
		$this->db->bind(":username", $username);
		return $this->db->single();
	}
}