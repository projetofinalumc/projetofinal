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

class ItemPedido{
    //put your code here

    private $nomeProduto;
    private $idPedido;
    private $idProduto;
    private $valorUnitario;
    private $quantidade;

    function _construct() {
    }
    function getNomeProduto() {
        return $this->nomeProduto;
    }

    
    function getIdPedido() {
        return $this->idPedido;
    }

    function getIdProduto() {
        return $this->idProduto;
    }

    function getValorUnitario() {
        return $this->valorUnitario;
    }

    function getQuantidade() {
        return $this->quantidade;
    }

    function setNomeProduto($nomeProduto) {
        $this->nomeProduto = $nomeProduto;
    }

    function setIdPedido($idPedido) {
        $this->idPedido = $idPedido;
    }

    function setIdProduto($idProduto) {
        $this->idProduto = $idProduto;
    }

    function setValorUnitario($valorUnitario) {
        $this->valorUnitario = $valorUnitario;
    }

    function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }


    
}
