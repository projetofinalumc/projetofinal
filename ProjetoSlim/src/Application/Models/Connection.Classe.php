<?php

namespace App\Application\Models;

class ConnectionFactory {

    public static function Connect(){

         return $mysqli = new \mysqli('db4free.net', 'usercaneta123','123456as','bancoteste123');
        
    }

}
