<?php

namespace App\Application\Models;
require "Pessoa.classe.php";
require "Endereco.classe.php";

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Locatario
 *
 * @author fisherman
 */
use App\Application\Models\Categoria;

class Locatario extends Pessoa {
    //put your code here
    
    private $CPF;
    private $id;
      
    function __construct() {
        
    }


    
    
    function getCPF() {
        return $this->CPF;
    }

    function getId() {
        return $this->id;
    }

    public function getEmail() {
        return parent::getEmail();
    }

    public function getEndereco() {
        return parent::getEndereco();
    }

    public function getNome() {
        return parent::getNome();
    }

    public function getSenha() {
        return parent::getSenha();
    }

    function setCPF($CPF) {
        $this->CPF = $CPF;
    }

    function setId($id) {
        $this->id = $id;
    }

    public function setEmail(string $email) {
        parent::setEmail($email);
    }

    public function setEndereco(Endereco $endereco) {
        parent::setEndereco($endereco);
    }

    public function setNome(string $nome) {
        parent::setNome($nome);
    }

    public function setSenha(string $senha) {
        parent::setSenha($senha);
    }


}
