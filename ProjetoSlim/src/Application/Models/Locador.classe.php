<?php

class Locador extends Pessoa{

    private $id; // no php n precisa definir o tipo (int, doubl, etc) da variavel, mesma coisa para funcoes
    private $cnpj;
    

    public function setId($id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setCnpj($cnpj) {
        $this->cnpj = $cnpj;
    }

    public function getCnpj() {
        return $this->cnpj;
    }

    public function Locador() {
        
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

    public function setEmail(string $email) {
        parent::setEmail($email);
    }

    public function setEndereco(\Endereco $endereco) {
        parent::setEndereco($endereco);
    }

    public function setNome(string $nome) {
        parent::setNome($nome);
    }

    public function setSenha(string $senha) {
        parent::setSenha($senha);
    }


}
