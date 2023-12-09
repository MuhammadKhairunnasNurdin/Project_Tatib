<?php

namespace models;

use core\Database;
use core\FlashMessage;

class Admin
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

	public function edit()
	{

	}

	public function add($dosenData = [])
	{
		/*to escape special character*/
		$username = $this->db->antiDbInjection($dosenData["username"]);
		$password = $this->db->antiDbInjection($dosenData["password"]);

		/*replace quoted string("''") to regular string(""), because we're using that value to bind function*/
		$username = str_replace("'", "", $username);
		$password = str_replace("'", "", $password);

		/*insert into user table first to make user_id fk to table dosen*/
		$this->db->prepare("INSERT INTO user(username, password, level) VALUES ('$username', '$password', 'dosen')");

		$this->db->execute();

		/*insert into dosen table*/
		$this->db->prepare("INSERT INTO dosen(NIP, user_id, nama, tgl_lahir, alamat, no_telp, jenis_kelamin) VALUES (:nip, :user_id, :nama, :ttl, :alamat, :no_telp, :jenis_kelamin)");

		/*to escape special character*/
		$nip = $this->db->antiDbInjection($dosenData["nip"]);
		/*check last insert id in user*/
		$user_id = intval($this->db->lastInsertId());
		$user_id = $this->db->antiDbInjection($user_id);
		$nama = $this->db->antiDbInjection($dosenData["nama"]);
		$ttl = $this->db->antiDbInjection($dosenData["ttl"]);
		$alamat = $this->db->antiDbInjection($dosenData["alamat"]);
		$no_telp = $this->db->antiDbInjection($dosenData["no_telp"]);
		$jenis_kelamin = $this->db->antiDbInjection($dosenData["jenis_kelamin"]);

		/*replace quoted string("''") to regular string(""), because we're using that value to bind function*/
		$nip = str_replace("'", "", $nip);
		$user_id = str_replace("'", "", $user_id);
		$nama = str_replace("'", "", $nama);
		$ttl = str_replace("'", "", $ttl);
		$alamat = str_replace("'", "", $alamat);
		$no_telp = str_replace("'", "", $no_telp);
		$jenis_kelamin = str_replace("'", "", $jenis_kelamin);

		/*to bind param, so param not directly used in query and bound in separated way*/
		$this->db->bind(':nip', $nip);
		$this->db->bind(':user_id', $user_id);
		$this->db->bind(':nama', $nama);
		$this->db->bind(':ttl', $ttl);
		$this->db->bind(':alamat', $alamat);
		$this->db->bind(':no_telp', $no_telp);
		$this->db->bind(':jenis_kelamin', $jenis_kelamin);

		$isInsertSuccess = $this->db->execute();

		$message = null;
		if ($isInsertSuccess) {
			$this->fm->message("success", "adding data dosen is success");
			$message = $this->fm->getFlashData("success");
		} else {
			$this->fm->message("warning", "error occur in adding data dosen");
			$message =  $this->fm->getFlashData("warning");
		}
		return $message;
	}

	public function delete()
	{

	}

	public function verification()
	{

	}

	public function getDosen(): array
	{
		$this->db->prepare("SELECT d.NIP AS NIP, d.nama AS nama, alamat, no_telp, k.nama AS kelas FROM dosen d LEFT OUTER JOIN kelas k ON d.NIP = k.NIP");
		return $this->db->resultSet();
	}

	public function getMahasiswa(): array
	{
		$this->db->prepare("SELECT * FROM mahasiswa");
		return $this->db->resultSet();
	}
}