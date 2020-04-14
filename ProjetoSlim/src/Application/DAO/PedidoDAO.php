<?php
namespace App\Application\DAO;

use App\Application\Models\Produto;
use App\Application\Models\Pedido;
use App\Application\Models\Locatario;
use App\Application\Models\Endereco;
use App\Application\Models\ConnectionFactory;

class PedidoDAO{
    private $conn;

    public function __construct(\mysqli $conn){
        $this->conn = $conn;
    }
    public function gerarPedido(Locatario $locatario){
        $pedido = new Pedido();

        $valorTotal = $pedido->getvalorTotal();
        $dataPedido = $pedido->getdataPedido();
        $LocatarioPedido = $pedido->getLocatarioPedido();
        $listaProduto = $pedido->getlistaProduto();
        $sql = 'INSERT INTO Pedido (idPedido, valorTotal, dataPedido, LocatarioPedido, listaProduto) values (?,?,?,?,?)';
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $idPedido);
        $stmt->bindParam(2, $valorTotal);
        $stmt->bindParam(3, $dataPedido);
        $stmt->bindParam(4, $LocatarioPedido);
        $stmt->bindParam(5, $listaProduto);
        $stmt->execute();
        $stmt->close(); 
    }
    public function Ver_Pedido_Locatario(){
        
    }
    public function Ver_Pedido_Administrador(){
        
    }
}
?>