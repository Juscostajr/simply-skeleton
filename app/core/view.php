<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Core;

/**
 * Description of template
 *
 * @author usuario
 */
class View {
    private $root = 'public/templates/';
    private $extension = '.php';
    private $template;

    function __construct($file) {
        $this->template = ROOT . $this->root . $file . $this->extension;
        
    }
    
    public function getTemplate(){
        if(!file_exists($this->template)){
            throw new \Exception('The especificated route didn\'t match any view');
        }
        return $this->template;
    }
}