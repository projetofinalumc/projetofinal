<?php
namespace App\Application\Actions\User;

use Slim\Views\PhpRenderer;
use App\Application\Models\Endereco;
use App\Application\Models\EnderecoDAO;

use App\Application\Models\ProdutoDAO;
use App\Application\Models\PedidoDAO;
use DateTime;
use App\Application\Models\LocatarioDAO;
use App\Application\Models\Pedido;
use App\Application\Models\Produto;
use App\Application\Models\Locatario;
use App\Application\Models\ConnectionFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require_once(__DIR__ . "/../../DAO/LocatarioDAO.php");
require_once (__DIR__."/../../Models/Locatario.classe.php");
require_once(__DIR__ . "/../../DAO/EnderecoDAO.php");
require_once(__DIR__ . "/../../DAO/ProdutoDAO.php");
require_once(__DIR__ . "/../../DAO/PedidoDAO.php");
require_once(__DIR__ . "/../../Models/Endereco.classe.php");
require_once(__DIR__ . "/../../Models/Pedido.classe.php");


class ControllerPedido{
    public function gerarPedido(Request $request, Response $response, $args){

        session_start();
         
        $conn = ConnectionFactory::Connect();

        $produtoDAO = new ProdutoDAO($conn);

        foreach($_SESSION['Carrinho'] as $key=>$produto){

                 $obj  = json_decode($produto,false);
  
              
                  $obj->Quantidade = $_POST["Produto$obj->Produtoid"];
                  
                  $_SESSION['Carrinho'][$key] = json_encode($obj);
              }

        $produtos = $_SESSION['Carrinho'];


        $listProdutoPedido = $produtoDAO->buscarProdutosCarrinho($produtos);

        $valorTotal = 0;
        
        foreach($listProdutoPedido as $Produto){
             $id = $Produto->getId();
            $QuantidadePedido = $_POST["Produto$id"];
            $Produto->setQuantidade($QuantidadePedido);
            $valor = $Produto->getQuantidade() * $Produto->getValDiaria();
            $valorTotal += $valor;
           
        }
        
        
        $locatario = new Locatario();
        $locatario->setId((int)$_SESSION['idLocatario']);
        $locatarioDAO = new LocatarioDAO($conn);
        $locatarioPedido = $locatarioDAO->buscarLocatarioPorID($locatario);

            
        $EnderecoLocatario = new Endereco();
        $EnderecoLocatario->setIdLocatario($_SESSION['idLocatario']);
        $EnderecoDAO = new EnderecoDAO($conn);
        $listaEnderecoLocatario = $EnderecoDAO->buscarEnderecoPorId($EnderecoLocatario);
        
        $locatarioPedido->setListaEndereco($listaEnderecoLocatario);

        $pedido = new Pedido();
        $pedidoDAO = new PedidoDAO($conn);
        //$pedido->setvalortotal($_POST['valortotal']);
        //$pedido->setdataPedido(date('d/m/y'));
        $pedido->setLocatarioPedido($locatarioPedido);
        $pedido->setlistaProduto($listProdutoPedido);
        $pedido->setvalorTotal((float)$valorTotal);
       

        //$args = ['PedidoLocatario' => $pedido];
         $_SESSION['PedidoLocatario'] = serialize($pedido); 
        $renderer = new PhpRenderer(__DIR__.'/../../Views/loja/');

        return $renderer->render($response,"checkout.php",$args);       
    }
    public function Ver_Pedido_Locatario(Request $request, Response $response, $args)
    {
        $conn = ConnectionFactory::Connect();

        session_start();

        $sessaoid = $_SESSION['idLocatario']; 
        $locatario = new Locatario();
        $locatario->setId($sessaoid);
        $Pedido = new Pedido();
        $Pedido->setLocatarioPedido($locatario);
        // $_SESSION['idLocatario']
        $PedidoDAO = new PedidoDAO($conn);
        $listaPedidos = $PedidoDAO->BuscarPedidos_Locatario($Pedido);

        $args = ['ListaPedidos' => $listaPedidos];

        $renderer = new PhpRenderer(__DIR__.'/../../Views/locatarioDashboard/');
        
        return $renderer->render($response, "locatario.php", $args);
    }

    public function Ver_Pedido_Admin(Request $request, Response $response, $args)
    {
        $locatario = new Locatario();
        $locatario->setId($sessaoid);
        $Pedido = new Pedido();
        $Pedido->setLocatarioPedido($locatario);
        // $_SESSION['idLocatario']
        $PedidoDAO = new PedidoDAO($conn);
        $listaPedidos = $PedidoDAO->BuscarPedidos_Locatario($Pedido);

        $args = ['ListaPedidos' => $listaPedidos];

        $renderer = new PhpRenderer(__DIR__.'/../src/Application/Views/loja');
        
        return $renderer->render($response, "pedido.php", $args);
    }
    public function gerandoPedido(Request $request, Response $response, $args)
    {
        if(!isset($_SESSION)){ session_start(); }

        
        $pedido = unserialize($_SESSION['PedidoLocatario']);
        $todosEnderecos = $_POST['inputEndereco'];

        unset($_SESSION['PedidoLocatario']);
        unset($_SESSION['Carrinho']);
        unset($_SESSION['Total_Carrinho']);

        $N = count($todosEnderecos);
        $enderecoSelecionado = 0;
        for($i=0; $i < $N; $i++)
        {
            $enderecoSelecionado = $todosEnderecos[$i];
        }
        $conn = ConnectionFactory::Connect();

        $EnderecoSelecionado = new Endereco();
        $EnderecoSelecionado->setId($enderecoSelecionado);

        $EnderecoDAO = new EnderecoDAO($conn);
        $EnderecoPedido = $EnderecoDAO->buscarPorIdEndereco($EnderecoSelecionado);

        $pedido->setEnderecoPedido($EnderecoPedido);

        $data = getdate();

        $dataPedido = $data['year'].'-'.$data['mon'].'-'.$data['mday'];

        $datetime = new DateTime((string)$dataPedido);
        $datetime->modify('+1 day');
        $dataDevolucao = (string)$datetime->format('Y-m-d');
        
        $dataInicial = (string)$_POST['dataInicial'];
        
        $pedido->setdataPedido($dataPedido);
        $pedido->setdataRetirada($dataInicial);
        $pedido->setdataDevolucao($dataDevolucao);

        $PedidoDAO = new PedidoDAO($conn);

        $PedidoDAO->gerarPedido($pedido);

        $args = ['Pedido' => $pedido];
   
        $renderer = new PhpRenderer(__DIR__.'/../../Views/loja/');
        
        return $renderer->render($response, "final.php", $args);
    }

}
?>