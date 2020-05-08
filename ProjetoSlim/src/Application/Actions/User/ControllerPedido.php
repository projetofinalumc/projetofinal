<?php
namespace App\Application\Actions\User;

use Slim\Views\PhpRenderer;
use App\Application\Models\Endereco;
use App\Application\Models\EnderecoDAO;

use App\Application\Models\ProdutoDAO;
use App\Application\Models\PedidoDAO;

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

        $produtos = $_SESSION['Carrinho'];

        $listProdutoPedido = $produtoDAO->buscarProdutosCarrinho($produtos);

        $valorTotal = 0;
        
        foreach($listProdutoPedido as $Produto){
            $valorTotal += $Produto->getValDiaria();
        }
         
        
        $locatario = new Locatario();
        $locatario->setId($_SESSION['idLocatario']);
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
         $_SESSION['PedidoLocatario'] = $pedido; 
        $renderer = new PhpRenderer(__DIR__.'/../../Views/loja/');

        return $renderer->render($response,"checkout.php",$args);       
    }
    public function Ver_Pedido_Locatario(Request $request, Response $response, $args)
    {
        $sessaoid = 1;//teste sem sessão
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
    public function Ver_Pedido_Administrador(Request $request, Response $response, $args)
    {
        
    }
}
?>