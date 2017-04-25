<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of routes
 *
 * @author usuario
 */

namespace App\Core;

class Routes {

    protected $controller = 'App\Controller\Home';
    protected $method = 'index';
    protected $param = [];

    /**
     * App constructor.
     */
    public function __construct() {
        $url = $this->urlToArray($_GET['url'] ?? 'Home');

        if (file_exists("app/controller/" . $url[0] . '.php') && class_exists('App\Controller\\' . $url[0])) {
            $this->controller = 'App\Controller\\' . $url[0];
            unset($url[0]);
        }

        $this->controller = new $this->controller;

        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        } 

        $this->param = $url ? array_values($url) : [];

        if (!is_subclass_of($this->controller, '\App\Core\Controller')) {
            throw new \Exception("Controller class must extends \App\Core\Controller");
        }
        
        call_user_func_array([$this->controller, $this->method], $this->param);
    }

    private function urlToArray($url) {
        return explode("/", filter_var(rtrim($url), FILTER_SANITIZE_URL));
    }

}
