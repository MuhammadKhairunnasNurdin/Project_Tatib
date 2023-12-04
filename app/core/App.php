<?php

namespace core;

class App
{

    /*this three attribute to provide default controller, method, and data
    or params*/
    private mixed $controller = "Authorization";
    private string $method = "index";
    private array $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();

        // controller
        if (isset($url[0])) {
            /*to check whatever controller exist, if exist will retrieve
            that to our $controller attribute. and our controller is saved
            in $url in indexes 0*/
            if (file_exists("../app/controllers/" . $url[0] . ".php")) {
                $this->controller = $url[0];

                /*this to delete our string controller in order to retrieve index or params*/
                unset($url[0]);
            }
        }
        /*this to imported call class file controllers in app folder*/
        require_once("../app/controllers/" . $this->controller . ".php");
        /*instantiated our controller class. note: 'controller\\ to access namespace controllers'*/
        $this->controller = new ("controllers\\" . $this->controller)();

        //method
        if (isset($url[1])) {
            /*to check whatever method exist inside our controller, if exist
            will retrieve that to our $method attribute. and our method is
            saved in $url in indexes 1*/
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        //params
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        //execute controller, method and send params is available
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    /*to create pretty url(simpler url) and to make default controller or
    method and search existing controller also this will provide some
    security to our url and parsing url to an array that specified by
    mainUrl(or development url)/controller/method/data in separating way*/
    private function parseUrl(): ?array
    {
        if (isset($_GET["url"])) {
            /*this to delete slash in reared url to avoid attack our url
            that accessed with slash to open method or adding data*/
            $url = rtrim($_GET["url"], "/");

            /*this code to  filter performs various actions to sanitize the
             URL, such as removing invalid characters, encoding special
             characters as spaces, and ensuring proper URL format.*/
            $url = filter_var($url, FILTER_SANITIZE_URL);

            /*this to divide our url to an array element*/
            return explode("/", $url);
        }
        return null;
    }
}