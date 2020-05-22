<?php

namespace App\Application\Models;

class ConnectionFactory {

    public static function Connect(){

         return $mysqli = new \mysqli('localhost', 'root','123456AsD@','bancoteste123');
        
    }

}
