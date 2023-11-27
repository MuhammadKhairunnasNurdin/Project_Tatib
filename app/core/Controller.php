<?php

namespace core;

class Controller
{
    public function view($view, $data = []): void
    {
        require_once("../app/views/" . $view . ".php");
    }

    public function model($model)
    {
        require_once("../app/models/" . $model . ".php");
        return new ("models\\" . $model)();
    }

	public function antiDbInjection(Database $connect, $data): ?string
	{
		/*convert special character to HTML entities This step helps
		prevent potential cross-site scripting (XSS) attacks by ensuring
		that the data is safely displayed in HTML.*/
		$data = htmlspecialchars($data, ENT_QUOTES);

		/*to strip or delete HTML and PHP tags*/
		$data = strip_tags($data);

		/*to delete last back slash from url*/
		$data = stripslashes($data);

		/*to escape string*/
		$escapedData = $connect->escapeString($data);
		if ($escapedData === false)
			/*return null when error occurred during escaping*/
			return null;
		else
			return $escapedData;
	}
}