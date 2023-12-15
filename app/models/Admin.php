<?php

namespace models;

use core\Database;
use core\FlashMessage;

require_once("IGetterHistory.php");

class Admin implements IGetterHistory
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

	public function edit($tableName, $editData, $fkData = [])
	{
		$isUpdateFkSuccess = null;
		$isUpdateSuccess = null;
		if (isset($fkData)) {
			/*to avoid update fk when fk data from form is empty*/
			foreach ($fkData as $column => $value) {
				$conditionEdit = "";
				foreach ($value as $col => $val) {
					if ($val === "") {
						unset($value[$col]);
					}
					if ($col == "conditionEdit") {
						$conditionEdit = $val;
						unset($value['conditionEdit']);
					}
				}
				$isUpdateFkSuccess =  $this->db->updates("$column", $value, $conditionEdit);
			}
		}

		if ($isUpdateFkSuccess) {
			$conditionEdit = "nama = '" . $editData['condition'] . "'";
			unset($editData['condition']);
			$isUpdateSuccess = $this->db->updates($tableName, $editData, $conditionEdit);
		}

		$message = null;
		if ($isUpdateSuccess) {
			$this->fm->message("success", "update data $tableName");
			$message = $this->fm->getFlashData("success");
		} else {
			$this->fm->message("warning", "error occur in update data $tableName");
			$message =  $this->fm->getFlashData("warning");
		}
		return $message;
	}

	public function add($tableName, $addData = [], $fkData = [])
	{
		$isInsertFkSuccess = null;
		$isInsertSuccess = null;
		if (isset($fkData)) {
			foreach ($fkData as $elm => $value) {
				$isInsertFkSuccess =  $this->db->inserts($elm, $value);
			}
		}


		if ($isInsertFkSuccess) {
			$addData['user_id'] = intval($this->db->lastInsertId());
			$isInsertSuccess = $this->db->inserts($tableName, $addData);
		}

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

	public function delete($tableName, $idName, $idData)
	{
		$this->db->prepare("DELETE FROM $tableName WHERE $idName =:$idName");
		$idData = $this->db->antiDbInjection($idData);
		$this->db->bind(":$idName", $idData);
		$isDeleteSuccess = $this->db->execute();

		$message = null;
		if ($isDeleteSuccess) {
			$this->fm->message("success", "delete data $tableName");
			$message = $this->fm->getFlashData("success");
		} else {
			$this->fm->message("warning", "error occur in delete data $tableName");
			$message =  $this->fm->getFlashData("warning");
		}
		return $message;
	}

	public function verification()
	{

	}

	public function getAllDosen(): array
	{
		$this->db->prepare("SELECT d.NIP AS NIP, d.nama AS nama, alamat, no_telp, k.nama AS kelas FROM dosen d LEFT OUTER JOIN kelas k ON d.NIP = k.NIP");
		return $this->db->resultSet();
	}

	public function getAllMahasiswa(): array
	{
		$this->db->prepare("SELECT m.NIM AS NIM, m.nama, kelas_id, k.nama AS kelas, m.no_telp, m.jenis_kelamin FROM mahasiswa m INNER JOIN kelas k on k.id_kelas = m.kelas_id");
		return $this->db->resultSet();
	}

	public function getAllKelas(): array
	{
		$this->db->prepare("SELECT * FROM kelas");
		return $this->db->resultSet();
	}

	public function getDosen($NIP)
	{
		$this->db->prepare("SELECT d.NIP, user_id, d.nama AS nama, k.NIP AS DPA, tgl_lahir, alamat, no_telp, jenis_kelamin, username FROM dosen d 
    	LEFT OUTER JOIN user u ON d.user_id = u.id_user LEFT OUTER JOIN kelas k ON d.NIP = k.NIP WHERE d.NIP=:NIP");
		$this->db->bind(":NIP", $NIP);
		return $this->db->resultSet();
	}

	public function getMahasiswa($NIM)
	{
		$this->db->prepare("SELECT NIM, user_id, m.nama AS nama, k.nama AS kelas, tgl_lahir, alamat, no_telp, jenis_kelamin, username, id_kelas, kelas_id FROM mahasiswa m 
	    LEFT OUTER JOIN user u ON m.user_id = u.id_user LEFT OUTER JOIN kelas k 
		ON k.id_kelas = m.kelas_id WHERE NIM=:NIM");
		$this->db->bind(":NIM", $NIM);
		return $this->db->resultSet();
	}

	public function getAdmin($username)
	{
		$this->db->prepare("SELECT * FROM admin a JOIN user u ON a.user_id = u.id_user WHERE u.username=:username");
		$this->db->bind(":username", $username);
		return $this->db->resultSet();
	}

	public function getHistory($additionalData = null): array
	{
		$this->db->prepare("SELECT * FROM history_pelanggaran WHERE tgl_validasi IS NULL");
		return $this->db->resultSet();
	}
}