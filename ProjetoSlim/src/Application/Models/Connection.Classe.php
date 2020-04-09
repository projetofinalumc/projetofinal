<?php

//snamespace App\Application\Models;

class ConnectionFactory {

    public static function Connect(){

         return $mysqli = new \mysqli('localhost', 'root','','bancoteste123');
        
    }

}
