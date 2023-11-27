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
}