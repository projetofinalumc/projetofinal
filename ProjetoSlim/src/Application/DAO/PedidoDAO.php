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
    public function BuscarPedidos_Locatario(Pedido $pedido){
        $locatario = $pedido->getLocatarioPedido();//Aqui instanciei um objeto de Locatario(Com todos os dados)
        $id_Locatario = $locatario->getId();//Aqui recebi apenas o id do locatario no Pedido.
        $sql = 'SELECT * FROM Pedido WHERE idLocatario = ?';//
        $stmt = $conn->prepare($sql);
        $stmt->bindParam('i', $id_Locatario);
        $stmt->execute(); 
        if($stmt->num_rows > 0){
            while($rows = $stmt->fetch_assoc()){
                $Pedido_cliente = new Pedido();

                $Pedido_cliente->setdataRetirada($row['dataRetirada']);
                $Pedido_cliente->setvalorTotal($row['valorTotal']);
                $Pedido_cliente->setdataDevolucao($row['dataDevolucao']);
                $Pedido_cliente->setdataPedido($row['dataPedido']); 

                $Endereco = new Endereco();
                $Endereco->setId($row['id_endereco']);

                $EnderecoDAO = new EnderecoDAO($conn);
                $listEnderecoLocatario = $EnderecoDAO->buscarEnderecoPorId($Endereco);//retornando a lista de endereço do locatario que vem da EnderecoDAO       
                $Pedido_cliente->setEnderecoPedido($listEnderecoLocatario);
                $listaPedidos[] = $Pedido_cliente;//criei a lista de Pedidos 
            }
            return $listaPedidos;
        }  
    }
    public function ImprimirPedidos(){
        
    }
}   
?>