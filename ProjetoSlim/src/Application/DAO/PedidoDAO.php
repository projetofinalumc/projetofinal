<?php
namespace App\Application\Models;

use App\Application\Models\Produto;
use App\Application\Models\Pedido;
use App\Application\Models\Locatario;
use App\Application\Models\Endereco;
use App\Application\Models\ConnectionFactory;

class PedidoDAO{
    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }
    public function gerarPedido($pedido){

     
        $valorTotal = (float)$pedido->getvalorTotal();
        $dataPedido = (string)$pedido->getdataPedido();
        $dataDevolucao = (string)$pedido->getdataDevolucao();
        $dataRetirada =  (string)$pedido->getdataRetirada();
        
        $EnderecoPedido = $pedido->getEnderecoPedido();
        $idEndereco = (int)$EnderecoPedido->getId();
          
        $LocatarioPedido = $pedido->getLocatarioPedido();
        $idLocatarioPedido = (int)$LocatarioPedido->getId();

        $listaProdutos = $pedido->getlistaProduto();
        $sql = "INSERT INTO Pedido (dataPedido, dataRetirada, dataDevolucao, valorTotal, id_endereco, idLocatario) values ('$dataPedido','$dataRetirada','$dataDevolucao',$valorTotal,$idEndereco,$idLocatarioPedido);";
        #$sql = 'INSERT INTO Pedido (dataPedido, dataRetirada, dataDevolucao, valorTotal, id_endereco, idLocatario) values (?,?,?,?,?,?);';
        $stmt = $this->conn->prepare($sql);
        #$stmt->bindParam(1, $dataPedido);
        #$stmt->bindParam(2, $valorTotal);
        #$stmt->bindParam(3, $LocatarioPedido);
        #$stmt->bindParam(4, $LocatarioPedido);
        #$stmt->bindParam(5, $idLocatarioPedido);

        #$stmt->bind_param('sssdii', $dataPedido,$dataRetirada,$dataDevolucao,$valorTotal,$idEndereco,$idLocatarioPedido);
        $stmt->execute();
        $PedidoId = $stmt->insert_id;
       /*  if($stmt->num_rows > 0){
            while($rows = $stmt->fetch_assoc()){

                $PedidoId = $row['LAST_INSERT_ID()'];
              }
            } */

       foreach($listaProdutos as $produtos ){
        
        $quantidade = $produtos->getQuantidade();
        $valorUnitario = $produtos->getValDiaria();
        $produtoID = $produtos->getId();

        $sql = "INSERT INTO itemPedido (valorUnitario,quantidade,fk_Produto,fk_Pedido) values ($valorUnitario,$quantidade,$produtoID,$PedidoId);"; 
        
        $stmt = $this->conn->query($sql);
        //$stmt->bind_param('diii', $valorUnitario,$quantidade,$produtoID,$PedidoId);

  
        //$stmt->execute();

       }
        
    }
   
    public function BuscarPedidos_Locatario(Pedido $pedido){
        $locatario = $pedido->getLocatarioPedido();//Aqui instanciei um objeto de Locatario(Com todos os dados)
        $id_Locatario = $locatario->getId();//Aqui recebi apenas o id do locatario no Pedido.
        $sql = "SELECT * FROM Pedido WHERE idLocatario = $id_Locatario;";//fiz a query para receber o id do locatario e mostrar quais pedidos tem
        $stmt = $this->conn->query($sql);//Analisando a query usando o pre
        //visto que há uma interrogação na query o bindparam vai pegar o segundo dano interno($id_Locatario) e substituirá no lugar da interrogação
       // $stmt->execute();//Executar a query 
        if($stmt->num_rows > 0){//SE o select for executado($stmt) e retornar un numero de linhas da base de dados MAIOR que 0 então
            while($rows = $stmt->fetch_assoc()){//$ENQUANTO cada linha que for retornada será armazenada em $rows e será quebrada e divida em partes(FETCH_ASSOC)
                $Pedido_cliente = new Pedido();//Instanciei um novo objeto para atribuir os dados que vem do banco nele.

                $Pedido_cliente->setidPedido($rows["idPedido"]);
                $Pedido_cliente->setdataRetirada($rows['dataRetirada']);//Atribuindo os dados no objeto 
                $Pedido_cliente->setvalorTotal($rows['valorTotal']);//Atribuindo os dados no objeto
                $Pedido_cliente->setdataDevolucao($rows['dataDevolucao']);//Atribuindo os dados no objeto
                $Pedido_cliente->setdataPedido($rows['dataPedido']);//Atribuindo os dados no objeto

                $Endereco = new Endereco();
                $Endereco->setId($rows['id_endereco']);

                $EnderecoDAO = new EnderecoDAO($this->conn);
                $listEnderecoLocatario = $EnderecoDAO->buscarPorIdEndereco($Endereco);//retornando a lista de endereço do locatario que vem da EnderecoDAO       
                $Pedido_cliente->setEnderecoPedido($listEnderecoLocatario);
                $listaPedidos[] = $Pedido_cliente;//criei a lista de Pedidos 
            }
        } 
            foreach($listaPedidos as $Pedido){
                $PedidoId = $Pedido->getidPedido();
                $sql = "SELECT * FROM itemPedido WHERE fk_Pedido = $PedidoId;";
                $stmt = $this->conn->query($sql);
                if($stmt->num_rows > 0){
                        while($rows = $stmt->fetch_assoc()){//$ENQUANTO cada linha que for retornada será armazenada em $rows e será quebrada e divida em partes(FETCH_ASSOC)
                            $prodt = new Produto();//Instanciei um novo objeto para atribuir os dados que vem do banco nele.
                            $prodt->setId($rows["fk_Produto"]);
                            $prodt->setValDiaria($rows["valorUnitario"]);
                            $prodt->setQuantidade($rows["quantidade"]);
                            $listProd[] = $prodt;
                        }

                        $Pedido->setlistaProduto($listProd);
                        $listPedidoNovo[] = $Pedido;
                    }
             }
             return $listPedidoNovo;
       
        
        
    }
    public function BuscarPedidos_Administrador(){
        $sql = 'SELECT * FROM Pedido';
        $stmt = $this->conn->query($sql);
        //$stmt->execute();
        if($stmt->num_rows > 0){//SE o select for executado($stmt) e retornar un numero de linhas da base de dados MAIOR que 0 então
            while($rows = $stmt->fetch_assoc()){//$ENQUANTO cada linha que for retornada será armazenada em $rows e será quebrada e divida em partes(FETCH_ASSOC)
                $Pedido_adm = new Pedido();//Instanciei um novo objeto para atribuir os dados que vem do banco nele.
                $Locatario = new Locatario();

                $LocatarioPedido->setId("idLocatario");
                
                $Pedido_adm->setidPedido($rows["idPedido"]);
                $Pedido_adm->setdataRetirada($rows['dataRetirada']);//Atribuindo os dados no objeto 
                $Pedido_adm->setvalorTotal($rows['valorTotal']);//Atribuindo os dados no objeto
                $Pedido_adm->setdataDevolucao($rows['dataDevolucao']);//Atribuindo os dados no objeto
                $Pedido_adm->setdataPedido($rows['dataPedido']);//Atribuindo os dados no objeto

                $Endereco = new Endereco();
                $Endereco->setId($rows['id_endereco']);
                $Pedido_adm->setLocatarioPedido();

                $EnderecoDAO = new EnderecoDAO($this->conn);
                $listEnderecoLocatario = $EnderecoDAO->buscarPorIdEndereco($Endereco);//retornando a lista de endereço do locatario que vem da EnderecoDAO       
                $Pedido_cliente->setEnderecoPedido($listEnderecoLocatario);
                $listaPedidos[] = $Pedido_cliente;//criei a lista de Pedidos 
            }

            return $listaPedidos;
        }


        



    }
}   
?>
