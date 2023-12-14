<?php

namespace models;

use core\Database;
use core\FlashMessage;

class Dosen
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
		// test push from branch anas fix
	}

	public function classHistory()
	{
		// tes push in branch frontend
		// tes push in branch frontend
		// test push 2 from brach anas
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