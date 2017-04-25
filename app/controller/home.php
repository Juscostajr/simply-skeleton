<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;


/**
 * Description of Example
 *
 * @author usuario
 */
use App\Core\View;
class Home extends \App\Core\Controller {
    //put your code here
    
    public function index($request = 'Mundo') {
        $style = '<style>body{background-color:#cccccc;}</style>';
        $string = "Olá $request";
        $this->render(new View('pages/home'),['body' => $string, 'head' => $style]);
    }



}
