<?php

namespace models;

use core\Database;
use core\FlashMessage;

require_once("IGetterHistory.php");
require_once("Peraturan.php");

class Mahasiswa implements IGetterHistory
{
	private Peraturan $peraturan;
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
		$this->peraturan = new Peraturan();
	}

	public function getAllPeraturan(string $funcName, $param)
	{
		return $this->peraturan->$funcName($param);
	}

	public function getAllHistory($additionalData = null): array
	{
		if (isset($additionalData)) {
			$this->db->prepare("SELECT * FROM history_pelanggaran WHERE NIM =:NIM");
			$additionalData = $this->db->antiDbInjection($additionalData);
			$this->db->bind(":NIM", $additionalData);
			return $this->db->resultSet();
		}
		return [];
	}

	public function getHistoryById($additionalData = null): array
	{
		if (isset($additionalData)) {
			$this->db->prepare("SELECT * FROM history_pelanggaran hp 
    		LEFT OUTER JOIN pelanggaran p ON hp.pelanggaran_id = p.tingkatan
         	LEFT OUTER JOIN jenis_pelanggaran jp ON p.tingkatan = jp.tingkatan 
         	LEFT OUTER JOIN sanksi_pelanggaran sp ON sp.tingkatan = jp.tingkatan 
         	WHERE id_hp =:id_hp AND hp.no_jenis = jp.no_jenis AND hp.no_sanksi = sp.no_sanksi");
			$additionalData = $this->db->antiDbInjection($additionalData);
			$this->db->bind(":id_hp", $additionalData);
			return $this->db->single();
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