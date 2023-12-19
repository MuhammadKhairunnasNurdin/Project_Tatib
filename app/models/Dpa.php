<?php

namespace models;

require_once("IGetterHistory.php");
require_once("Peraturan.php");

class Dpa extends Dosen
{
	public function getAllHistoryMahasiswa($NIP): array
	{
		$this->db->prepare("SELECT m.nama, hp.pelanggaran_id, hp.bukti_pelanggaran, hp.tgl_pelanggaran
       	FROM history_pelanggaran hp 
    	INNER JOIN mahasiswa m ON hp.NIM = m.NIM
    	INNER JOIN kelas k on m.kelas_id = k.id_kelas
    	INNER JOIN dosen d on k.NIP = d.NIP
    	WHERE d.NIP =:NIP");

		$NIP = $this->db->antiDbInjection($NIP);
		$this->db->bind(":NIP", $NIP);
		return $this->db->resultSet();
	}

	public function getHistoryById($additionalData = null): array
	{
		if (isset($additionalData)) {
			$this->db->prepare("SELECT *, m.nama as nama, k.nama as kelas FROM history_pelanggaran hp 
	        LEFT OUTER JOIN mahasiswa m ON hp.NIM = m.NIM
    		LEFT OUTER JOIN dosen d ON hp.NIP = d.NIP
	        LEFT OUTER JOIN kelas k ON k.id_kelas = m.kelas_id 
			LEFT OUTER JOIN pelanggaran p ON hp.pelanggaran_id = p.tingkatan
			LEFT OUTER JOIN jenis_pelanggaran jp ON p.tingkatan = jp.tingkatan
			LEFT OUTER JOIN sanksi_pelanggaran sp ON p.tingkatan = sp.tingkatan 
			WHERE id_hp=:id_hp AND hp.no_jenis = jp.no_jenis AND hp.no_sanksi = sp.no_sanksi");
			$additionalData = $this->db->antiDbInjection($additionalData);
			$this->db->bind(":id_hp", $additionalData);
			return $this->db->single();
		}
		return [];
	}
}