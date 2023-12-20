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

		if ($isUpdateFkSuccess !== true) {
			$this->fm->message("danger", "$isUpdateFkSuccess in update data $tableName");
			return $this->fm->getFlashData("danger");
		}

		$conditionEdit = "nama = '" . $editData['condition'] . "'";
		unset($editData['condition']);
		$isUpdateSuccess = $this->db->updates($tableName, $editData, $conditionEdit);

		if ($isUpdateSuccess !== true) {
			$this->fm->message("danger", "$isUpdateSuccess in update data $tableName");
			return $this->fm->getFlashData("danger");
		}
		$this->fm->message("success", "update data $tableName");
		return $this->fm->getFlashData("success");
	}

	public function editKelas($tableName, $editData)
	{
		$isUpdateSuccess = null;
		$value = [
			'NIP' => $editData['NIP']
		];

		$conditionEdit = "id_kelas = '" . $editData['id_kelas'] . "'";

		$isUpdateSuccess = $this->db->updates("kelas", $value, $conditionEdit);
		$message = null;
		if ($isUpdateSuccess) {
			$this->fm->message("success", "update data kelas");
			$message = $this->fm->getFlashData("success");
		} else {
			$this->fm->message("danger", "error occur in update data kelas");
			$message =  $this->fm->getFlashData("danger");
		}
		return $message;
	}

	public function add($tableName, $addData = [], $fkData = [])
	{
		$isInsertFkSuccess = null;
		$isInsertSuccess = false;
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

	public function getAllDosen(): array
	{
		$this->db->prepare("SELECT d.NIP AS NIP, d.nama AS nama, alamat, no_telp, k.nama AS kelas FROM dosen d LEFT OUTER JOIN kelas k ON d.NIP = k.NIP");
		return $this->db->resultSet();
	}

	public function getAllMahasiswa(): array
	{
		$this->db->prepare("SELECT m.NIM AS NIM, m.nama, kelas_id, k.nama AS kelas, m.no_telp, m.jenis_kelamin, id_kelas FROM mahasiswa m INNER JOIN kelas k on k.id_kelas = m.kelas_id");
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