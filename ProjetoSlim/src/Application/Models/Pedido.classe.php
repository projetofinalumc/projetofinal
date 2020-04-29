<?php

namespace Application\Models;

use Application\Models\Endereco;
use Application\Models\Produto;

class Pedido{
    private int $idPedido;
    private date $dataRetirada;
    private int $valorTotal;
    private date $dataDevolucao;
    private date $dataPedido;
    private Endereco $enderecoPedido;
    private array $listaProduto;
    private $locatarioPedido;
    
    public function setidPedido($idPedido){
        $this->idPedido = $idPedido;
    }
    public function getidPedido(){
        return $this->idPedido;
    }
    public function setdataRetirada( $dataRetirada){
        $this->dataRetirada = $dataRetirada;
    }
    public function getdataRetirada(){
        return $this->dataRetirada;
    }

    public function setvalorTotal(double $valorTotal){
        $this->valorTotal = $valorTotal;
    }
    public function getvalorTotal(){
        return $this->valorTotal;
    }

    public function setdataDevolucao(date $dataDevoulucao){
        $this->dataDevolucao = $dataDevolucao;
    }
    public function getdataDevolucao(){
        return $this->dataDevolucao;
    }

    public function setdataPedido(date $dataPedido){
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
    public function setEnderecoPedido(Endereco $enderecoPedido){
        $this->EnderecoPedido = $enderecoPedido;
    }
    public function getEnderecoPedido(){
        return $this->EnderecoPedido;
    }
    public function setlistaProduto(Produto $listaProduto){
        $this->listaProduto = $listaProduto;
    }
    public function getlistaProduto(){
        return $this->listaProduto;
    }
    public function setLocatarioPedido($locatarioPedido){
        $this->LocatarioPedido = $locatarioPedido;
    }
    public function getLocatarioPedido(){
        return $this->LocatarioPedido;
    }
}
?>