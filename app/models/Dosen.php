<?php

namespace models;

use core\Database;
use core\FlashMessage;

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

	public function report($tableName, $addData = [])
	{
		$isInsertSuccess = null;

		$addData['user_id'] = intval($this->db->lastInsertId());
		$isInsertSuccess = $this->db->inserts($tableName, $addData);

		$message = null;
		if ($isInsertSuccess) {
			$this->fm->message("success", "adding data $tableName");
			$message = $this->fm->getFlashData("success");
		} else {
			$this->fm->message("warning", "error occur in adding data $tableName");
			$message =  $this->fm->getFlashData("warning");
		}
		return $message;
	}
}