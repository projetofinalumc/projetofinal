<?php

include_once 'Produto.classe.php';

class KITS {

    private $nome;
    private $itens;

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setItens(Produto $itens) {
        $this->itens = $itens;
    }

    public function getItens() {
        return $this->itens;
    }

}
