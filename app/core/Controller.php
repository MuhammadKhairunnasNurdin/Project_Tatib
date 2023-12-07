<?php

namespace core;

class Controller
{
    protected function view($view, $data = [], $data1 = ""): void
    {
        require_once("../app/views/" . $view . ".php");
    }

    protected function model($model)
    {
        require_once("../app/models/" . $model . ".php");
        return new ("models\\" . $model)();
    }

}