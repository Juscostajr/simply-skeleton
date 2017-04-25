<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author usuario
 */

namespace App\Core;


class Controller {
    
    public $head;

    //put your code here
  
    public function render (View $view, array $environment = array()) {
    extract($environment);
    ob_start();
    include $view->getTemplate();
    $contents = ob_get_clean();
    echo $contents;
}

   

}
