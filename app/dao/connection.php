<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Connection
 *
 * @author usuario
 */
class Connection {
    //put your code here
       private static $instance;

    public static function getInstance(){

        if(!isset(self::$instance)){
            try{

                self::$instance = new PDO("mysql:host=" . BD_HOST . ";dbname=" . BD_NOME, BD_USUARIO , BD_SENHA);
                self::$instance->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instance->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                self::$instance->exec('SET NAMES utf8');
            } catch (PDOException $e){
                echo "Falha no banco de dados! " . $e->getMessage();
            }
        }
        return self::$instance;
    }
    public static function prepare($sql){
        return self::getInstance()->prepare($sql);
    }
}
