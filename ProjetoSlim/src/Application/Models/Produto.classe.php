<?php

namespace App\Application\Models;


use App\Application\Models\Categoria;
//require_once (__DIR__."/Categoria.classe.php");

class Produto extends \PDO {

    private $id;
    private $nome;//#
    private $modelo;
    private $valDiaria;//#
    private $dimensao;
    private $quantidade;//#
    private $precoPerda;
    private $categoria;

    function __construct(){

    }

    function getId() {
        return $this->id;
    }

    function getNome() {
        return $this->nome;
    }

    function getModelo() {
        return $this->modelo;
    }

    function getValDiaria() {
        return $this->valDiaria;
    }

    function getDimensao() {
        return $this->dimensao;
    }

    function getQuantidade() {
        return $this->quantidade;
    }

    function getPrecoPerda() {
        return $this->precoPerda;
    }

    function getCategoria() {
        return $this->categoria;
    }

    function setId(int $id) {
        $this->id = $id;
    }

    function setNome(string $nome) {
        $this->nome = $nome;
    }

    function setModelo(string $modelo) {
        $this->modelo = $modelo;
    }

    function setValDiaria($valDiaria) {
        $this->valDiaria = $valDiaria;
    }

    function setDimensao($dimensao) {
        $this->dimensao = $dimensao;
    }

    function setQuantidade(int $quantidade) {
        $this->quantidade = $quantidade;
    }

    function setPrecoPerda(float $precoPerda) {
        $this->precoPerda = $precoPerda;
    }

    function setCategoria(\Categoria $categoria) {
        $this->categoria = $categoria;
    }

 function getCategoriaId() {
        $val =  $this->categoria->getIdCategoria();
        return $val;
    }

}
