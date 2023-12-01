<?php

namespace core;

class  FlashMessage
{
	public function __construct()
	{
		session_start();
	}

	public function setFlashData(string $key = "", string $value = ""): void
	{
		if (!empty($key) && !empty($value)) {
			setcookie("value", $value, time() + 10, "/");
			setcookie("key", $key, time() + 10, "/");
			$_SESSION['_flashData'][$key] = $value;
			setcookie("session", $_SESSION['_flashData'][$key], time() + 10, "/");
		}
	}

	public function getFlashData(string $key = "")
	{
		if (!empty($key) && isset($_SESSION["_flashData"][$key])) {
			$data = $_SESSION["_flashData"][$key];
//			unset($_SESSION["_flashData"][$key]);
			setcookie("test_setGetData", $_SESSION['_flashData'][$key], time() + 10, "/");
			return $data;
		} else {
			echo "<script> alert('Flash Message \'{$key}\' is not defined')</script>";
		}
	}

	public function
	message(string $key = "", string $message = ""): void
	{
		switch ($key) {
			case "info":
				setcookie("masukInfo", $key, time() + 10, "/");
				$this->setFlashData("info", "<div class='alert alert-primary alert-dismissible fade show' role='alert'>
            <strong>Info!</strong> {$message}
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
				break;
			case "success":
				setcookie("masukSuccess", $key, time() + 10, "/");
				$this->setFlashData("success", "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>Berhasil!</strong> {$message}
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
				break;
			case "danger":
				setcookie("masukDanger", $key, time() + 10, "/");
				$this->setFlashData("danger", "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong>Gagal!</strong> {$message}
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
				break;
			case "warning":
				setcookie("masukWarning", $key, time() + 10, "/");
				$this->setFlashData("warning", "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>Peringatan!</strong> {$message}
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>");
				break;
		}
	}
}