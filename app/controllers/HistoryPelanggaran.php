<?php

namespace controllers;

use core\Controller;

class HistoryPelanggaran extends Controller
{
	private \models\IGetterHistory $object;

	public function history(): void
	{
		if ($_SERVER['REQUEST_METHOD' === 'POST']) {
			$implementor = $_POST['implementor'];

			$this->object =  $this->model($implementor);
			$_SESSION['history'][$implementor]= $this->object->getHistory();
			header("Location: " . BASEURL . "/$implementor/pageHistory");
		}
	}
}