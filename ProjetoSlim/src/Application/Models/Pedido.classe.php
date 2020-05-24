<?php

namespace App\Application\Models;

use Application\Models\Endereco;
use Application\Models\Produto;

class Pedido{
    private int $idPedido;
    private $dataRetirada;
    private $valorTotal;
    private $dataDevolucao;
    private $dataPedido;
    private $status;
    private Endereco $enderecoPedido;
    private array $listaProduto;
    private $locatarioPedido;
    
    public function setidPedido($idPedido){
        $this->idPedido = $idPedido;
    }
    public function getStatus(){
        return $this->status;
    }
    public function setStatus($status){
        $this->status = $status;
    }
    public function getidPedido(){
        return $this->idPedido;
    }
    public function setdataRetirada($dataRetirada){
        $this->dataRetirada = $dataRetirada;
    }
    public function getdataRetirada(){
        return $this->dataRetirada;
    }

    public function setvalorTotal($valorTotal){
        $this->valorTotal = $valorTotal;
    }
    public function getvalorTotal(){
        return $this->valorTotal;
    }

    public function setdataDevolucao($dataDevolucao){
        $this->dataDevolucao = $dataDevolucao;
    }
    public function getdataDevolucao(){
        return $this->dataDevolucao;
    }

    public function setdataPedido($dataPedido){
        $this->dataPedido = $dataPedido;
    }
    public function getdataPedido(){
        return $this->dataPedido;
    }

    public function setfuncEntrega(date $funcEntrega){
        $this->funcEntrega = $funcEntrega;
    }
    public function getfuncEntrega(){
        return $this->funcEntrega;
    }
    public function setEnderecoPedido($enderecoPedido){
        $this->EnderecoPedido = $enderecoPedido;
    }
    public function getEnderecoPedido(){
        return $this->EnderecoPedido;
    }
    public function setlistaProduto($listaProduto){
        $this->listaProduto = $listaProduto;
    }
    public function getlistaProduto(){
        return $this->listaProduto;
    }
    public function setLocatarioPedido($locatarioPedido){
        $this->locatarioPedido = $locatarioPedido;
    }
    public function getLocatarioPedido(){
        return $this->locatarioPedido;
    }
}
?>
