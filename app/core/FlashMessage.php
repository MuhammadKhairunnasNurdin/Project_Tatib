<?php

namespace core;

class  FlashMessage
{
	public function __construct()
	{
		session_start();
	}

	public function setFlashData(string $key = "", string $value = ""): bool
	{
		if (!empty($key) && !empty($value)) {
			$_SESSION["_flashData"][$key] = $value;
			return true;
		}
		return false;
	}

	public function getFlashData(string $key = "")
	{
		if (!empty($key) && isset($_SESSION["_flashData"][$key])) {
			$data = $_SESSION["_flashData"][$key];
			unset($_SESSION["_flashData"][$key]);
			return $data;
		} else {
			echo "<script> alert('Flash Message \'{$key}\' is not defined')</script>";
		}
	}

	public function message(string $key = "", string $message = ""): void
	{
		if ($key == "info") {
			$this->setFlashData("info", "<div class='alert alert-primary alert-dismissible fade show' role='alert'>
        <strong>Info!</strong> {$message}
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
		} elseif ($key == "success") {
			$this->setFlashData("success", "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Berhasil!</strong> {$message}
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
		} elseif ($key == "danger") {
			$this->setFlashData("danger", "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Gagal!</strong> {$message}
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
		} elseif ($key == "warning") {
			$this->setFlashData("warning", "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Peringatan!</strong> {$message}
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
		}
		if (!empty($key)) {
			unset($_SESSION["_flashData"][$key]);
		}
	}
}