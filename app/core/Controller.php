<?php

namespace core;

class Controller
{
    protected function view($view, $data = []): void
    {
        require_once("../app/views/" . $view . ".php");
    }

    protected function model($model)
    {
        require_once("../app/models/" . $model . ".php");
        return new ("models\\" . $model)();
    }

}