<?php

//namespace App\Application\Models;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author fisherman
 */
class Admin extends \PDO {
    //put your code here
        private $login;
        private $senha;

    function __construct() {
        
    }    
    
    public function setLogin($login) {
        
        $this->login =  $login;
         
    }
    
    public function getLogin() {
        return $this->login;
    }
    
    public function setSenha($senha) {
        $this->senha = $senha;
    }
    
    public function getSenha() {
        return $this->senha;
    }
    
}