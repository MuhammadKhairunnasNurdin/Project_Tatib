<?php

namespace core;

use ReflectionClass;

class Controller
{
    protected function view($view, $data = []): void
    {
        require_once("../app/views/" . $view . ".php");
    }

    protected function model($model)
    {
        require_once("../app/models/" . $model . ".php");
        $obj = new ("models\\" . $model)();
	    $interfacesModel = (new ReflectionClass($obj))->getInterfaceNames();
	    if (!empty($interfacesModel)) {
		    foreach ($interfacesModel as $interface) {
			    require_once("../app/models/" . $interface . ".php");
		    }
	    }
		return $obj;
    }

}