<?php

namespace App\Application\Models;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Endereco
 *
 * @author fisherman
 */
class Endereco {
    //put your code here
    private int $id;
    private int $idLocatario;
    private String $Logradouro;
    private int $numero;
    private String $cep;
    private String $estado;
    private String $bairro;
    
        
    function getId() {
        return $this->id;
    }
    function getIdLocatario() {
        return $this->idLocatario;
    }
    function getLogradouro() {
        return $this->Logradouro;
    }

    function getNumero() {
        return $this->numero;
    }

    function getCep() {
        return $this->cep;
    }

    function getEstado() {
        return $this->estado;
    }
    
    function getBairro() {
        return $this->bairro;
    }
    
    function setId($id) {
        $this->id = $id;
    }
    function setIdLocatario($idLocatario) {
        $this->idLocatario = $idLocatario;
    }
    function setLogradouro($Logradouro) {
        $this->Logradouro = $Logradouro;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setCep($cep) {
        $this->cep = $cep;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setBairro($bairro) {
        $this->bairro = $bairro;
    }


}
