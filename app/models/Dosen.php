<?php

namespace models;

use core\Database;
use core\FlashMessage;

require_once("IGetterHistory.php");
require_once("Peraturan.php");

class Dosen implements IGetterHistory
{
	protected Peraturan $object;
	protected Database $db;
	protected FlashMessage $fm;

	public function __destruct()
	{
		unset($this->db);
	}
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new FlashMessage();
	}

	public function getHistory($additionalData = null): array
	{
		if (isset($additionalData)) {
			$this->db->prepare("SELECT * FROM history_pelanggaran WHERE NIP =:NIP");
			$additionalData = $this->db->antiDbInjection($additionalData);
			$this->db->bind(":NIP", $additionalData);
			return $this->db->resultSet();
		}
		return [];
	}

	public function getPelanggaran(string $funcName)
	{
		return $this->object->$funcName();
	}

	public function getDosen($username)
	{
		$this->db->prepare("SELECT d.nama AS nama, d.NIP AS NIP, k.NIP AS DPA, k.nama AS kelas FROM dosen d 
    	LEFT OUTER JOIN user u ON d.user_id = u.id_user
	     LEFT OUTER JOIN kelas k ON k.NIP = d.NIP
	     WHERE u.username=:username");
		$this->db->bind(":username", $username);
		return $this->db->single();
	}

	public function report($tableName, $nim, $addData = [])
	{
		$isInsertSuccess = null;

//		$addData['user_id'] = intval($this->db->lastInsertId());
		$isInsertSuccess = $this->db->inserts($tableName, $addData);

		$message = null;
		if ($isInsertSuccess) {
			$this->fm->message("success", "report $nim");
			$message = $this->fm->getFlashData("success");
		} else {
			$this->fm->message("warning", "error occur in adding data $tableName");
			$message =  $this->fm->getFlashData("warning");
		}
		return $message;
	}
}