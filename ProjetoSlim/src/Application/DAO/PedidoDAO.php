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
        $sql = 'SELECT * FROM Pedido WHERE idLocatario = ?';//fiz a query para receber o id do locatario e mostrar quais pedidos tem
        $stmt = $conn->prepare($sql);//Analisando a query usando o pre
        $stmt->bindParam('i', $id_Locatario);//visto que há uma interrogação na query o bindparam vai pegar o segundo dano interno($id_Locatario) e substituirá no lugar da interrogação
        $stmt->execute();//Executar a query 
        if($stmt->num_rows > 0){//SE o select for executado($stmt) e retornar un numero de linhas da base de dados MAIOR que 0 então
            while($rows = $stmt->fetch_assoc()){//$ENQUANTO cada linha que for retornada será armazenada em $rows e será quebrada e divida em partes(FETCH_ASSOC)
                $Pedido_cliente = new Pedido();//Instanciei um novo objeto para atribuir os dados que vem do banco nele.

                $Pedido_cliente->setdataRetirada($row['dataRetirada']);//Atribuindo os dados no objeto 
                $Pedido_cliente->setvalorTotal($row['valorTotal']);//Atribuindo os dados no objeto
                $Pedido_cliente->setdataDevolucao($row['dataDevolucao']);//Atribuindo os dados no objeto
                $Pedido_cliente->setdataPedido($row['dataPedido']);//Atribuindo os dados no objeto

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
    public function BuscarPedidos_Administrador(Pedido $pedido){
        $Administrador  = $pedido->getLocatarioPedido();
        $sql = 'SELECT idPedido, idLocatario, id_endereco, dataPedido, valorTotal FROM Pedido';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        if($stmt->num_rows > 0){
            while($rows = $stmt->fetch_assoc()){
                $Pedidos_adm = new Pedido();
                $Pedidos_adm->setidPedido($row['idPedido']);
                $Pedidos_adm->setidLocatario($row['idLocatario']);
                $Pedidos_adm->setid_endereco($row['id_endereco']);
                $Pedidos_adm->setdataPedido($row['dataPedido']);
                $Pedidos_adm->setvalorTotal($row['valorTotal']);
            }
        }


        



    }
}   
?>0