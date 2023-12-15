<?php

namespace models;

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
}