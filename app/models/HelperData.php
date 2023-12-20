<?php

namespace models;

use core\Database;

class HelperData
{
	private Database $db;

	public function __destruct()
	{
		unset($this->db);
	}
	public function __construct()
	{
		$this->db = new Database();
	}
	public function getAllDosen(): array
	{
		$this->db->prepare("SELECT d.NIP AS NIP, d.nama AS nama, alamat, no_telp, k.nama AS kelas 
		FROM dosen d LEFT OUTER JOIN kelas k ON d.NIP = k.NIP");
		return $this->db->resultSet();
	}

	public function getAllMahasiswa(): array
	{
		$this->db->prepare("SELECT m.NIM AS NIM, m.nama, kelas_id, k.nama AS kelas, m.no_telp, m.jenis_kelamin, id_kelas 
		FROM mahasiswa m INNER JOIN kelas k on k.id_kelas = m.kelas_id");
		return $this->db->resultSet();
	}

	public function getAllKelas(): array
	{
		$this->db->prepare("SELECT * FROM kelas");
		return $this->db->resultSet();
	}

	public function getDosen($NIP)
	{
		$this->db->prepare("SELECT d.NIP, user_id, d.nama AS nama, k.NIP AS DPA, tgl_lahir, alamat, no_telp, jenis_kelamin, username 
		FROM dosen d 
	        LEFT OUTER JOIN user u ON d.user_id = u.id_user 
		    LEFT OUTER JOIN kelas k ON d.NIP = k.NIP 
		WHERE d.NIP=:NIP");

		$this->db->bind(":NIP", $NIP);
		return $this->db->resultSet();
	}

	public function getMahasiswa($NIM)
	{
		$this->db->prepare("SELECT NIM, user_id, m.nama AS nama, k.nama AS kelas, tgl_lahir, alamat, no_telp, jenis_kelamin, username, id_kelas, kelas_id 
		FROM mahasiswa m 
		    LEFT OUTER JOIN user u ON m.user_id = u.id_user 
		    LEFT OUTER JOIN kelas k ON k.id_kelas = m.kelas_id 
		WHERE NIM=:NIM");

		$this->db->bind(":NIM", $NIM);
		return $this->db->resultSet();
	}
}