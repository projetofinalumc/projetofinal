<?php
namespace App\Application\Actions\User;

use Slim\Views\PhpRenderer;
use App\Application\Models\Endereco;
use App\Application\DAO\ProdutoDAO;
use App\Application\Models\Pedido;
use App\Application\Models\Produto;
use App\Application\Models\Locatario;
use App\Application\Models\ConnectionFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ControllerPedido{
    public function gerarPedido(Request $request, Response $response, $args){

        session_start();
         
        $conn = ConnectionFactory::Connect();

        $produtoDAO = new ProdutoDAO($conn);

        $produtos = $_SESSION['Carrinho'];

        $listProdutoPedido = $produtoDAO->buscarProdutosCarrinho($produtos);
        
        $locatario = new Locatario();
        $locatario->setId($_SESSION['idLocatario']);
        $locatarioDAO = new LocatarioDAO($conn);
        $locatarioPedido = $locatarioDAO->buscarLocatarioPorID($locatario);

        $pedido = new Pedido();
        $pedidoDAO = new PedidoDAO($conn);
        $pedido->setvalortotal($_POST['valortotal']);
        $pedido->setdataPedido(date('d/m/y'));
        $pedido->setLocatarioPedido($locatarioPedido);
        $pedido->setlistaProduto($listProdutoPedido);

        $args = ['Pedido' => $pedido];

        $renderer = new PhpRenderer(__DIR__.'/../src/Application/Views/loja');

        return $renderer->render($response,"pedido.php",$args);       
    }
    public function Ver_Pedido_Locatario(Request $request, Response $response, $args){

    }
    public function Ver_Pedido_Administrador(Request $request, Response $response, $args){

    }
}
?>