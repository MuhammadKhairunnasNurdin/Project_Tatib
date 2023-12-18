<?php

namespace controllers;

use core\Controller;

class HistoryPelanggaran extends Controller
{
	private \models\IGetterHistory $history;

	public function history(): void
	{
		if ($_SERVER['REQUEST_METHOD' === 'POST']) {
			$implementor = $_POST['implementor'];

//			$fileName = "../app/models/$implementor.php";
//			require_once("$fileName");
			$this->history =  $this->model($implementor);
			$_SESSION['history'][$implementor]= $this->history->getHistory();
			header("Location: " . BASEURL . "/$implementor/pageHistory");
		}
	}
}