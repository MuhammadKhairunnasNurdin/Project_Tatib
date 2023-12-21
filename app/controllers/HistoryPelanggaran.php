<?php

namespace controllers;

use core\Controller;

//require_once("../app/models/IGetterHistory.php");

class HistoryPelanggaran extends Controller
{
	private \models\IGetterHistory $history;

	public function allHistory(): void
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$implementor = $_POST['implementor'];
			$data = $_POST['data'];
			$pageName = $_POST['pageName'];

			$_SESSION['pageName'] = $pageName;
			$_SESSION['data'] = $data;
			$_SESSION['implementator'] = $implementor;

			$this->history =  $this->model($implementor);
			$_SESSION['history'][$implementor]= $this->history->getAllHistory($data);
			header("Location: " . BASEURL . "/$implementor/page" . $implementor . $pageName);
		} else {
			$implementor = $_SESSION['implementator'];
			$data = $_SESSION['data'];
			$pageName = $_SESSION['pageName'];
			$this->history = $this->model($implementor);
			$_SESSION['history'][$implementor] = $this->history->getAllHistory($data);
			header("Location: " . BASEURL . "/$implementor/page" . $implementor . $pageName);
		}
	}

	public function historyById()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$implementor = $_POST['implementor'];
			$data = $_POST['data'];
			$pageName = $_POST['pageName'];
			$this->history =  $this->model($implementor);
			$_SESSION['detailHistory'][$implementor]= $this->history->getHistoryById($data);
			header("Location: " . BASEURL . "/$implementor/page" . $pageName);
		}
	}
}