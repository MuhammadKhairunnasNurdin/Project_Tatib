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
				$isUpdateFkSuccess =  $this->db->updates("[$column]", $value, $conditionEdit);
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
			$this->fm->message("warning", "error occur in update data kelas");
			$message =  $this->fm->getFlashData("warning");
		}
		return $message;
	}

	public function add($tableName, $addData = [], $fkData = [])
	{
		$isInsertFkSuccess = null;
		$isInsertSuccess = null;
		if (isset($fkData)) {
			$userData = $fkData['user'];
			$username = $this->db->antiDbInjection($userData['username']);
			$password = $this->db->antiDbInjection($userData['password']);
			$level = $this->db->antiDbInjection($userData['level']);
			$this->db->prepare("INSERT INTO [user](username, password, level) VALUES ('$username', CONVERT(varbinary(256), '$password'), '$level')");
			$isInsertFkSuccess = $this->db->execute();
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

	public function validation($id_hp)
	{
		$this->db->prepare("UPDATE history_pelanggaran SET tgl_validasi= CURRENT_DATE WHERE id_hp=:id_hp");
		$id_hp = $this->db->antiDbInjection($id_hp);
		$this->db->bind(":id_hp", $id_hp);
		$isVerificationSuccess = $this->db->execute();

		$message = null;
		if ($isVerificationSuccess) {
			$this->fm->message("success", "Validate Complete");
			$message = $this->fm->getFlashData("success");
		} else {
			$this->fm->message("warning", "Validate Error");
			$message =  $this->fm->getFlashData("warning");
		}
		return $message;
	}

	public function reject($id_hp)
	{
		$this->db->prepare("UPDATE history_pelanggaran SET tgl_kompensasi= NULL WHERE id_hp=:id_hp");
		$id_hp = $this->db->antiDbInjection($id_hp);
		$this->db->bind(":id_hp", $id_hp);
		$isVerificationSuccess = $this->db->execute();

		$message = null;
		if ($isVerificationSuccess) {
			$this->fm->message("success", "Reject Validate Complete");
			$message = $this->fm->getFlashData("success");
		} else {
			$this->fm->message("warning", "Reject Validate Error");
			$message =  $this->fm->getFlashData("warning");
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
		$this->db->prepare("SELECT d.NIP, user_id, d.nama AS nama, tgl_lahir, k.NIP as DPA, alamat, no_telp, jenis_kelamin, username FROM dosen d 
    	LEFT OUTER JOIN [user] u ON d.user_id = u.id_user LEFT OUTER JOIN kelas k ON d.NIP = k.NIP WHERE d.NIP=:NIP");
		$NIP = $this->db->antiDbInjection($NIP);
		$this->db->bind(":NIP", $NIP);
		return $this->db->resultSet();
	}

	public function getMahasiswa($NIM)
	{
		$this->db->prepare("SELECT m.NIM, user_id, m.nama AS nama, k.nama AS kelas, tgl_lahir, alamat, no_telp, jenis_kelamin, username, id_kelas, kelas_id FROM mahasiswa m 
	    LEFT OUTER JOIN [user] u ON m.user_id = u.id_user LEFT OUTER JOIN kelas k 
		ON k.id_kelas = m.kelas_id WHERE m.NIM=:NIM");
		$this->db->bind(":NIM", $NIM);
		return $this->db->resultSet();
	}

	public function getAdmin($username)
	{
		$this->db->prepare("SELECT * FROM admin a JOIN [user] u ON a.user_id = u.id_user WHERE u.username=:username");
		$username = $this->db->antiDbInjection($username);
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
		WHERE id_hp=:id_hp AND hp.no_jenis = jp.no_jenis AND hp.no_sanksi = sp.no_sanksi");
		$id_hp = $this->db->antiDbInjection($additionalData);
		$this->db->bind(":id_hp", $id_hp);
		return $this->db->single();
	}
}