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
		/*code for if admin edit in user authentication in mahasiswa or dosen, we must update user too*/
		$isUpdateFkSuccess = true;
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
		if ($isUpdateFkSuccess !== true) {
			$this->fm->message("danger", "$isUpdateFkSuccess in update data $tableName");
			return $this->fm->getFlashData("danger");
		}

		$conditionEdit = $editData['condition'];
		unset($editData['condition']);
		$isUpdateSuccess = $this->db->updates($tableName, $editData, $conditionEdit);

		if ($isUpdateSuccess !== true) {
			$this->fm->message("danger", "$isUpdateSuccess in update data $tableName");
			return $this->fm->getFlashData("danger");
		}
		$this->fm->message("success", "update data $tableName");
		return $this->fm->getFlashData("success");
	}

	public function add($tableName, $addData = [], $fkData = [])
	{
		/*before insert in our mahasiswa or dosen, we must create user first*/
		$isInsertFkSuccess = true;
		if (isset($fkData)) {
			foreach ($fkData as $elm => $value) {
				$isInsertFkSuccess =  $this->db->inserts($elm, $value);
			}
		}

		$lastInsertId = intval($this->db->lastInsertId());
		if ($isInsertFkSuccess !== true) {
			$this->fm->message("danger", "$isInsertFkSuccess in adding data $tableName");
			return $this->fm->getFlashData("danger");
		}

		$addData['user_id'] = $lastInsertId;
		$isInsertSuccess = $this->db->inserts($tableName, $addData);
		if ($isInsertSuccess !== true) {
			$this->db->prepare("DELETE FROM user WHERE id_user =:id");
			$this->db->bind(":id", $lastInsertId);
			$this->db->execute();
			$this->fm->message("danger", "$isInsertSuccess in adding data $tableName");
			return $this->fm->getFlashData("danger");
		}

		$this->fm->message("success", "adding data $tableName");
		return $this->fm->getFlashData("success");
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
			$this->fm->message("danger", "error occur in delete data $tableName");
			$message =  $this->fm->getFlashData("danger");
		}
		return $message;
	}

	public function validation($id_hp)
	{
		$this->db->prepare("UPDATE history_pelanggaran SET tgl_validasi= CURRENT_DATE WHERE id_HP=:id_HP");
		$id_hp = $this->db->antiDbInjection($id_hp);
		$this->db->bind(":id_HP", $id_hp);
		$isVerificationSuccess = $this->db->execute();

		$message = null;
		if ($isVerificationSuccess) {
			$this->fm->message("success", "Validate Complete");
			$message = $this->fm->getFlashData("success");
		} else {
			$this->fm->message("danger", "Validate Error");
			$message =  $this->fm->getFlashData("danger");
		}
		return $message;
	}

	public function reject($id_hp)
	{
		$this->db->prepare("UPDATE history_pelanggaran SET tgl_kompensasi= NULL WHERE id_HP=:id_HP");
		$id_hp = $this->db->antiDbInjection($id_hp);
		$this->db->bind(":id_HP", $id_hp);
		$isVerificationSuccess = $this->db->execute();

		$message = null;
		if ($isVerificationSuccess) {
			$this->fm->message("success", "Reject Validate Complete");
			$message = $this->fm->getFlashData("success");
		} else {
			$this->fm->message("danger", "Reject Validate Error");
			$message =  $this->fm->getFlashData("danger");
		}
		return $message;
	}

	public function getAdmin($username)
	{
		$this->db->prepare("SELECT * FROM admin a JOIN user u ON a.user_id = u.id_user WHERE u.username=:username");
		$this->db->bind(":username", $username);
		return $this->db->resultSet();
	}

	public function getAllHistory($additionalData = null): array
	{
		$this->db->prepare("SELECT *, m.nama as nama, k.nama as kelas FROM history_pelanggaran hp 
        LEFT OUTER JOIN mahasiswa m ON hp.NIM = m.NIM
        LEFT OUTER JOIN kelas k ON k.id_kelas = m.kelas_id WHERE tgl_validasi IS NULL");
		return $this->db->resultSet();
	}

	public function getHistoryById($additionalData = null): array
	{
		$this->db->prepare("SELECT *, m.nama as nama, k.nama as kelas FROM history_pelanggaran hp 
        LEFT OUTER JOIN mahasiswa m ON hp.NIM = m.NIM
        LEFT OUTER JOIN kelas k ON k.id_kelas = m.kelas_id 
		LEFT OUTER JOIN pelanggaran p ON hp.pelanggaran_id = p.tingkatan
		LEFT OUTER JOIN jenis_pelanggaran jp ON p.tingkatan = jp.tingkatan
		LEFT OUTER JOIN sanksi_pelanggaran sp ON p.tingkatan = sp.tingkatan 
		WHERE id_HP=:id_HP AND hp.no_jenis = jp.no_jenis AND hp.no_sanksi = sp.no_sanksi");
		$id_hp = $this->db->antiDbInjection($additionalData);
		$this->db->bind(":id_HP", $id_hp);
		return $this->db->single();
	}
}