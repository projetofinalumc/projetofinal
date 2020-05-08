<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pessoa
 *
 * @author fisherman
 */

namespace App\Application\Models;

abstract class Pessoa {
    //put your code here
    protected $nome;
    protected $email;
    protected $senha;
    
    function getNome() {
        return $this->nome;
    }

    function getListaEndereco() {
        return $this->endereco;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function setNome(string $nome) {
        $this->nome = $nome;
    }


    function setEmail(string $email) {
        $this->email = $email;
    }

    function setSenha( string $senha) {
        $this->senha = $senha;
    }


    
}
