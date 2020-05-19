<?php

namespace App\Application\Models;


use App\Application\Models\Categoria;
//require_once (__DIR__."/Categoria.classe.php");

class Produto {

    private $id;
    private $nome;//#
    private $modelo;
    private $valDiaria;//#
    private $dimensao;
    private $quantidade;//#
    private $precoPerda;
    private $categoria;

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function getValDiaria() {
        return $this->valDiaria;
    }

    public function getDimensao() {
        return $this->dimensao;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function getPrecoPerda() {
        return $this->precoPerda;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function setId(int $id) {
        $this->id = $id;
    }

    public function setNome(string $nome) {
        $this->nome = $nome;
    }

    public function setModelo(string $modelo) {
        $this->modelo = $modelo;
    }

    public function setValDiaria($valDiaria) {
        $this->valDiaria = $valDiaria;
    }

    public function setDimensao($dimensao) {
        $this->dimensao = $dimensao;
    }

    public  function setQuantidade(int $quantidade) {
        $this->quantidade = $quantidade;
    }

    public function setPrecoPerda(float $precoPerda) {
        $this->precoPerda = $precoPerda;
    }


}
