<?php

namespace App\Application\Models;

class ConnectionFactory {

    public static function Connect(){

         return $mysqli = new \MySQLi('localhost', 'root','','bancoteste123');
        
    }

}
